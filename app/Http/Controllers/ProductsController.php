<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Section;
use App\Product;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::paginate(1);
        return view('catalog/index', compact('products'));
	}

	public function section($sectionCode)
	{
		$section = Section::findByCode($sectionCode)->first();
		if ($section->parent_id == null) {
			$products = Product::whereIn('parent_id', Section::where('parent_id', '=', $section->id)->get()->lists('id'))->paginate(1);
		}
		else {
			$products = $section->products()->paginate(1);
		}
		return view('catalog/index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $productId)
	{
		$product = Product::findByCode($productId)->first();
//        dd($product->sizes);
		return view('catalog/detail', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
