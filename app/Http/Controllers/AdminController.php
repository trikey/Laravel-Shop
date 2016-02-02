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

    public function storeNews(BlogRequest $request)
    {
        $article = new Blog($request->all());
        $user = Auth::user();

        $article->user()->associate($user);

        $article->save();

        if ($request->file('preview_picture')) {
            $imageName = $article->id . '_prev_article.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $article->preview_picture = $imageName;
            $article->save();
        }
        if ($request->file('detail_picture')) {
            $imageName = $article->id . '_detail_article.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $article->detail_picture = $imageName;
            $article->save();
        }

        return redirect('admin/news');


    }

    public function editNews($id)
    {
        $article = Blog::find($id);
        return view('admin/news/edit', compact('article'));
    }

    public function updateNews($id, BlogRequest $request)
    {
        $article = Blog::findOrFail($id);

        $article->update($request->all());
        $user = Auth::user();
        $article->user()->associate($user);
        $article->update();

        if ($request->get('delete_preview')) {
            @unlink(base_path() . '/public/uploads/'.$article->preview_picture);
            $article->preview_picture = NULL;
            $article->update();
        }
        if ($request->get('delete_detail')) {
            @unlink(base_path() . '/public/uploads/'.$article->detail_picture);
            $article->detail_picture = NULL;
            $article->update();
        }

        if ($request->file('preview_picture')) {
            @unlink(base_path() . '/public/uploads/'.$article->preview_picture);
            $imageName = $article->id . '_prev_article.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $article->preview_picture = $imageName;
            $article->update();
        }
        if ($request->file('detail_picture')) {
            @unlink(base_path() . '/public/uploads/'.$article->detail_picture);
            $imageName = $article->id . '_detail_article.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $article->detail_picture = $imageName;
            $article->update();
        }
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

    public function storeOffers(OffersRequest $request)
    {
        $offer = new Offer($request->all());
        $user = Auth::user();

        $offer->user()->associate($user);

        $offer->save();

        if ($request->file('preview_picture')) {
            $imageName = $offer->id . '_prev_offer.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $offer->preview_picture = $imageName;
            $offer->save();
        }
        if ($request->file('detail_picture')) {
            $imageName = $offer->id . '_detail_offer.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $offer->detail_picture = $imageName;
            $offer->save();
        }

        return redirect('admin/offers');
    }

    public function editOffers($id)
    {
        $offer = Offer::find($id);
        return view('admin/offers/edit', compact('offer'));
    }

    public function updateOffers($id, OffersRequest $request)
    {
        $offer = Offer::findOrFail($id);

        $offer->update($request->all());
        $user = Auth::user();
        $offer->user()->associate($user);
        $offer->update();

        if ($request->get('delete_preview')) {
            @unlink(base_path() . '/public/uploads/'.$offer->preview_picture);
            $offer->preview_picture = NULL;
            $offer->update();
        }
        if ($request->get('delete_detail')) {
            @unlink(base_path() . '/public/uploads/'.$offer->detail_picture);
            $offer->detail_picture = NULL;
            $offer->update();
        }

        if ($request->file('preview_picture')) {
            @unlink(base_path() . '/public/uploads/'.$offer->preview_picture);
            $imageName = $offer->id . '_prev_offer.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $offer->preview_picture = $imageName;
            $offer->update();
        }
        if ($request->file('detail_picture')) {
            @unlink(base_path() . '/public/uploads/'.$offer->detail_picture);
            $imageName = $offer->id . '_detail_offer.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $offer->detail_picture = $imageName;
            $offer->update();
        }
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

    public function storeBrands(BrandsRequest $request)
    {
        $brand = new Brand($request->all());
        $user = Auth::user();

        $brand->user()->associate($user);

        $brand->save();

        if ($request->file('preview_picture')) {
            $imageName = $brand->id . '_prev_offer.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $brand->preview_picture = $imageName;
            $brand->save();
        }
        if ($request->file('detail_picture')) {
            $imageName = $brand->id . '_detail_offer.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $brand->detail_picture = $imageName;
            $brand->save();
        }

        return redirect('admin/brands');
    }

    public function editBrands($id)
    {
        $brand = Brand::find($id);
        return view('admin/brands/edit', compact('brand'));
    }

    public function updateBrands($id, BrandsRequest $request)
    {
        $brand = Brand::findOrFail($id);

        $brand->update($request->all());
        $user = Auth::user();
        $brand->user()->associate($user);
        $brand->update();

        if ($request->get('delete_preview')) {
            @unlink(base_path() . '/public/uploads/'.$brand->preview_picture);
            $brand->preview_picture = NULL;
            $brand->update();
        }
        if ($request->get('delete_detail')) {
            @unlink(base_path() . '/public/uploads/'.$brand->detail_picture);
            $brand->detail_picture = NULL;
            $brand->update();
        }

        if ($request->file('preview_picture')) {
            @unlink(base_path() . '/public/uploads/'.$brand->preview_picture);
            $imageName = $brand->id . '_prev_offer.' . $request->file('preview_picture')->getClientOriginalExtension();
            $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
            $brand->preview_picture = $imageName;
            $brand->update();
        }
        if ($request->file('detail_picture')) {
            @unlink(base_path() . '/public/uploads/'.$brand->detail_picture);
            $imageName = $brand->id . '_detail_offer.' . $request->file('detail_picture')->getClientOriginalExtension();
            $request->file('detail_picture')->move(base_path() . '/public/uploads/', $imageName);
            $brand->detail_picture = $imageName;
            $brand->update();
        }
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
