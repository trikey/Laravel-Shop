<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use Session;

class CartController extends Controller {

    public function index()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        echo view('cart/big', compact('cartItems', 'allSumFormatted'));
    }

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
        }
        return $data;
    }

    public function getSmallCart()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        echo view('cart/top', compact('cartItems', 'allSumFormatted'));
    }
    public function getSmallCartView($view)
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        $view->with(compact('cartItems', 'allSumFormatted'));
    }
    public function getBigCart()
    {
        $data = $this->prepareCartData();
        $cartItems = $data['cartItems'];
        $allSumFormatted = $data['allSumFormatted'];
        echo view('cart/big_cart', compact('cartItems', 'allSumFormatted'));
    }
    public function getOrder(Request $request)
    {

    }

}
