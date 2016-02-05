<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use Session;

class CartController extends Controller {

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
                if(array_key_exists($id, $products))
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
        $cart_id = $request->get('cart_id');
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
                if(array_key_exists($id, $products))
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

    }

    public function deleteFromCart(Request $request)
    {
        $id = $request->get('cart_id');
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

    }

    private function prepareCartData()
    {
        $data = ['cartItems' => [], 'allSumFormatted' => 0];
        if (Session::has('products'))
        {
            $products = Session::get('products');
            $productIds = [];
            foreach($products as $key => $value)
            {
                $idAndSize = explode('_', $key);
                $productIds[] = $idAndSize[0];
            }
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
    public function getBigCart(Request $request)
    {

    }
    public function getOrder(Request $request)
    {

    }

}
