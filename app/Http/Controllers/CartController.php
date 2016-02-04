<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller {

    public function addToCart(Request $request)
    {
        dd($request->all());
    }

    public function updateCart(Request $request)
    {

    }

    public function deleteFromCart(Request $request)
    {

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
