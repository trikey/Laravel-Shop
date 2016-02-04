<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller {

    public function addToCart(Request $request)
    {
        dd($request->all());

        /*
        if session.products
            if session.products[product_id]
                session.products[product_id] += quantity
            else
                session.products[product_id] = quantity
        else
            session.products = []
            session.products[product_id] = quantity
        */
    }

    public function updateCart(Request $request)
    {
        /*
         * if session.products
				if session.products[basket_id]
					session.products[basket_id] = quantity
				else
					session.products[basket_id] = quantity
			else
				session.products = []
				session.products[basket_id] = quantity
         */
    }

    public function deleteFromCart(Request $request)
    {
        // delete session.products[basket_id]
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
