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
                    $products[$id] += $quantity;
                }
                else
                {
                    $products[$id] = $quantity;
                }
            }
            else
            {
                $products = [];
                $products[$id] = $quantity;
            }
            Session::put('products', $products);
            Session::save();
        }

    }

    public function updateCart(Request $request)
    {
        $id = $request->get('product_id');
        $quantity = $request->get('quantity');
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
                    $products[$id] = $quantity;
                }
                else
                {
                    $products[$id] = $quantity;
                }
            }
            else
            {
                $products = [];
                $products[$id] = $quantity;
            }
            Session::put('products', $products);
            Session::save();
        }

    }

    public function deleteFromCart(Request $request)
    {
        $id = $request->get('product_id');
        $product = Product::find($id);
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

    public function getSmallCart(Request $request)
    {

    }
    public function getBigCart(Request $request)
    {

    }
    public function getOrder(Request $request)
    {

    }

}
