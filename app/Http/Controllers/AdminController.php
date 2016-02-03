<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Blog;
use App\Offer;
use App\Brand;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\OffersRequest;
use App\Http\Requests\BrandsRequest;

class AdminController extends Controller {



    public function __construct(){
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin/index');
	}

    /**
     *
     * Save preview and detail image
     *
     * @param $model
     * @param $request
     */
    private function storeImages(&$model, $request)
    {
        if ($request->file('preview_picture')) {
            $imageName = $model->id . '_prev_' . time() . '.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $model->preview_picture = $imageName;
            $model->save();
        }
        if ($request->file('detail_picture')) {
            $imageName = $model->id . '_detail_' . time() . '.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $model->detail_picture = $imageName;
            $model->save();
        }
    }

    /**
     *
     * Remove preview and detail images if it is necessary
     *
     * @param $model
     * @param $request
     */
    private function updateImages(&$model, $request)
    {
        if ($request->get('delete_preview') || $request->file('preview_picture')) {
            @unlink(base_path() . '/public/uploads/'.$model->preview_picture);
            $model->preview_picture = NULL;
            $model->update();
        }
        if ($request->get('delete_detail') || $request->file('detail_picture')) {
            @unlink(base_path() . '/public/uploads/'.$model->detail_picture);
            $model->detail_picture = NULL;
            $model->update();
        }
    }

    /**
     * Новости
     */


    public function indexNews()
    {
        $articles = Blog::paginate(10);
        return view('admin/news/index', compact('articles'));
    }

    public function destroyNews($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('admin/news');
    }

    public function createNews()
    {
        return view('admin/news/create');
    }

    public function editNews($id)
    {
        $article = Blog::find($id);
        return view('admin/news/edit', compact('article'));
    }

    public function storeNews(BlogRequest $request)
    {
        $article = new Blog($request->all());
        $article->user()->associate(Auth::user())->save();
        $this->storeImages($article, $request);

        return redirect('admin/news');
    }

    public function updateNews($id, BlogRequest $request)
    {
        $article = Blog::findOrFail($id);
        $this->updateImages($article, $request);
        $article->update($request->all());
        $article->user()->associate(Auth::user())->update();
        $this->storeImages($article, $request);

        return redirect('admin/news');
    }



    /**
     * Акции
     */

    public function indexOffers()
    {
        $offers = Offer::paginate(10);
        return view('admin/offers/index', compact('offers'));
    }

    public function destroyOffers($id)
    {
        Offer::find($id)->delete();
        return redirect('admin/offers');
    }

    public function createOffers()
    {
        return view('admin/offers/create');

    }

    public function editOffers($id)
    {
        $offer = Offer::find($id);
        return view('admin/offers/edit', compact('offer'));
    }

    public function storeOffers(OffersRequest $request)
    {
        $offer = new Offer($request->all());
        $offer->user()->associate(Auth::user())->save();
        $this->storeImages($offer, $request);

        return redirect('admin/offers');
    }

    public function updateOffers($id, OffersRequest $request)
    {
        $offer = Offer::findOrFail($id);
        $this->updateImages($offer, $request);
        $offer->update($request->all());
        $offer->user()->associate(Auth::user())->update();
        $this->storeImages($offer, $request);

        return redirect('admin/offers');
    }





    /**
     * Бренды
     */

    public function indexBrands()
    {
        $brands = Brand::paginate(10);
        return view('admin/brands/index', compact('brands'));
    }

    public function destroyBrands($id)
    {
        Brand::find($id)->delete();
        return redirect('admin/brands');
    }

    public function createBrands()
    {
        return view('admin/brands/create');

    }

    public function editBrands($id)
    {
        $brand = Brand::find($id);
        return view('admin/brands/edit', compact('brand'));
    }

    public function storeBrands(BrandsRequest $request)
    {
        $brand = new Brand($request->all());
        $brand->user()->associate(Auth::user())->save();
        $this->storeImages($brand, $request);

        return redirect('admin/brands');
    }

    public function updateBrands($id, BrandsRequest $request)
    {
        $brand = Brand::findOrFail($id);
        $this->updateImages($brand, $request);
        $brand->update($request->all());
        $brand->user()->associate(Auth::user())->update();
        $this->storeImages($brand, $request);

        return redirect('admin/brands');
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
	public function show($id)
	{
		//
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
