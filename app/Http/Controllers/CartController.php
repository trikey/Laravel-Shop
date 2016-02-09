<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Product;
use App\OrderProperty;
use App\Order;
use App\User;
use App\PropertyInOrder;
use App\OrderCart;

use App\DeliverySystem;
use App\PaySystem;

class CartController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'order',
            'orderList',
            'orderDetail'
        ]]);
    }
    /**
     * Отображение корзины пользователя
     */
    public function index()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        return view('cart/big', compact('cartItems', 'allSumFormatted'));
    }

    /**
     * Отображение корзины и формы оформления заказа
     *
     * @return \Illuminate\View\View
     */
    public function order()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        $orderProperties = OrderProperty::active()->orderBy('sort', 'asc')->get();
        $delivery_systems = DeliverySystem::active()->orderBy('sort', 'asc')->get();
        $pay_systems = PaySystem::active()->orderBy('sort', 'asc')->get();
        return view('cart/order', compact('cartItems', 'allSumFormatted', 'orderProperties', 'delivery_systems', 'pay_systems'));
    }

    /**
     * Детальный просмотр заказа
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function orderDetail($id)
    {
        $order = Order::find($id);
        return view('order/order_detail', compact('order'));
    }

    /**
     * Список заказов пользователя
     *
     * @return \Illuminate\View\View
     */
    public function orderList()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('order/order_list', compact('orders'));
    }

    /**
     * Обработка оформления заказа
     */
    public function orderSubmit(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'fio' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:3',
            'location' => 'required',
            'address' => 'required',
            'delivery_system' => 'required|integer',
            'pay_system' => 'required|integer'
        ]);
        $cartData = $this->prepareCartData();
        $products = $cartData['cartItems'];
        $allSum = $cartData['allSum'];
        $order = new Order([
            'total_price' => $allSum,
            'delivery_price' => 0
        ]);

        $deliverySystem = DeliverySystem::find($data['delivery_system']);
        $paySystem = PaySystem::find($data['pay_system']);
        $order->user()->associate(Auth::user());
        $order->order_user()->associate(Auth::user());
        $order->delivery_system()->associate($deliverySystem);
        $order->pay_system()->associate($paySystem);
        $order->save();

        foreach($products as $product) {

            $orderCart = new OrderCart([
                'name' => $product->name,
                'url' => $product->url,
                'preview_picture' => $product->preview_picture,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'sum' => $product->sum
            ]);
            $orderCart->order()->associate($order);
            $orderCart->save();
        }

        $propertyInOrder = new PropertyInOrder([
            'value' => $data['fio']
        ]);
        $prop = OrderProperty::FindByCode('fio')->first();
        $propertyInOrder->property()->associate($prop);
        $propertyInOrder->order()->associate($order);
        $propertyInOrder->save();

        $propertyInOrder = new PropertyInOrder([
            'value' => $data['email']
        ]);
        $prop = OrderProperty::FindByCode('email')->first();
        $propertyInOrder->property()->associate($prop);
        $propertyInOrder->order()->associate($order);
        $propertyInOrder->save();

        $propertyInOrder = new PropertyInOrder([
            'value' => $data['phone']
        ]);
        $prop = OrderProperty::FindByCode('phone')->first();
        $propertyInOrder->property()->associate($prop);
        $propertyInOrder->order()->associate($order);
        $propertyInOrder->save();

        $propertyInOrder = new PropertyInOrder([
            'value' => $data['location']
        ]);
        $prop = OrderProperty::FindByCode('location')->first();
        $propertyInOrder->property()->associate($prop);
        $propertyInOrder->order()->associate($order);
        $propertyInOrder->save();

        $propertyInOrder = new PropertyInOrder([
            'value' => $data['address']
        ]);
        $prop = OrderProperty::FindByCode('address')->first();
        $propertyInOrder->property()->associate($prop);
        $propertyInOrder->order()->associate($order);
        $propertyInOrder->save();

        Session::forget('products');

        return redirect('personal/order/'.$order->id);
    }

    /**
     * Добавление товара в корзину.
     * Добавление возможно как с цветом, так и без него
     * Товары хранятся в сессии под ключем следующего вида: $product_id . '_' . $size
     * При этом $size может быть пустым
     *
     * @param Request $request
     */
    public function addToCart(Request $request)
    {
        $id = $request->get('product_id');
        $quantity = $request->get('quantity');
        $props = $request->get('props');
        $size = '_';
        if (is_array($props) && isset($props['size']))
        {
            $size .= $props['size'];
        }
        if (!$quantity)
        {
            $quantity = 1;
        }
        $product = Product::find($id);
        if ($product) {
            if (Session::has('products'))
            {
                $products = Session::get('products');
                if(array_key_exists($id.$size, $products))
                {
                    $products[$id.$size] += $quantity;
                }
                else
                {
                    $products[$id.$size] = $quantity;
                }
            }
            else
            {
                $products = [];
                $products[$id.$size] = $quantity;
            }
            Session::put('products', $products);
            Session::save();
        }
        $this->getSmallCart();
    }

    /**
     * Обновление записи корзины. Например - увеличение кол-ва товара
     * Поиск и обновление просходит по составному ключу в сессии: $product_id . '_' . $size
     * При этом $size может быть пустым
     *
     * @param Request $request
     */
    public function updateCart(Request $request)
    {
        $cart_id = $request->get('basket_id');
        $quantity = $request->get('quantity');
        $idArray = explode('_', $cart_id);
        $id = $idArray[0];
        $size = '_';
        if (is_array($idArray) && strlen($idArray[1]) > 0)
        {
            $size .= $idArray[1];
        }
        if (!$quantity)
        {
            $quantity = 1;
        }
        $product = Product::find($id);
        if ($product) {
            if (Session::has('products'))
            {
                $products = Session::get('products');
                if(array_key_exists($id.$size, $products))
                {
                    $products[$id.$size] = $quantity;
                }
                else
                {
                    $products[$id.$size] = $quantity;
                }
            }
            else
            {
                $products = [];
                $products[$id.$size] = $quantity;
            }
            Session::put('products', $products);
            Session::save();
        }
        $this->getBigCart();
    }

    /***
     * Удаление товара из корзины
     * Поиск и обновление просходит по составному ключу в сессии: $product_id . '_' . $size
     * При этом $size может быть пустым
     *
     * @param Request $request
     */
    public function deleteFromCart(Request $request)
    {
        $id = $request->get('basket_id');
        $idArray = explode('_', $id);
        $product = Product::find($idArray[0]);
        if ($product) {
            if (Session::has('products'))
            {
                $products = Session::get('products');
                if(array_key_exists($id, $products))
                {
                    unset($products[$id]);
                }
                else
                {
                    unset($products[$id]);
                }
                Session::put('products', $products);
                Session::save();
            }
        }
        if ($request->get('act') == 'main_delete') {
            $this->getBigCart();
        }
        else {
            $this->getSmallCart();
        }
    }

    /**
     * Формирование данных для отображения корзины.
     * Используется для вывода маленькой корзины, большой корзины, и ajax запросов к ним
     *
     * @return array
     */
    private function prepareCartData()
    {
        $data = ['cartItems' => [], 'allSumFormatted' => 0];
        if (Session::has('products'))
        {
            $products = Session::get('products');
            $data['cartItems'] = [];
            $allSum = 0;
            foreach($products as $key => $value)
            {
                $idAndSize = explode('_', $key);
                $product = Product::find($idAndSize[0]);
                $product->quantity = $value;
                $product->sum = $product->price * $product->quantity;
                $product->cart_id = $key;
                $product->size = $idAndSize[1];
                $data['cartItems'][] = $product;
                $allSum += $product->sum;
            }
            $data['allSumFormatted'] = $allSum . ' руб.';
            $data['allSum'] = $allSum;
        }
        return $data;
    }

    /**
     * AJAX запрос для вывода малой корзины
     */
    public function getSmallCart()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        echo view('cart/_top', compact('cartItems', 'allSumFormatted'));
    }

    /**
     * AJAX запрос для вывода большой корзины
     */
    public function getBigCart()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        echo view('cart/_big_cart', compact('cartItems', 'allSumFormatted'));
    }

    /**
     * Используется для вывода малой корзины на каждой странице.
     * \App\Providers\AppServiceProvider@boot
     * Генерирует данные для layouta
     *
     * @param $view
     */
    public function getSmallCartView($view)
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        $view->with(compact('cartItems', 'allSumFormatted'));
    }

    /**
     * AJAX запрос для получения формы оформления заказа
     *
     * @param Request $request
     */
    public function getOrder(Request $request)
    {

    }

}
