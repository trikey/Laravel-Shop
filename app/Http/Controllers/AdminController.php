<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Blog;
use App\Offer;
use App\Brand;
use App\Section;
use App\Product;
use App\Size;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\OffersRequest;
use App\Http\Requests\BrandsRequest;
use App\Http\Requests\SectionsRequest;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\SizesRequest;

class AdminController extends Controller {


    /**
     * Доступ только для авторизованных пользователей
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Отобразить рабочий стол
     *
     * @return \Illuminate\View\View
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
     * Разделы каталога
     */

    public function indexSections()
    {
        $sections = Section::paginate(10);
        return view('admin/sections/index', compact('sections'));
    }

    public function destroySections($id)
    {
        Section::find($id)->delete();
        return redirect('admin/sections');
    }

    public function createSections()
    {
        $sections = [''=>''] + Section::get()->lists('name', 'id');
        return view('admin/sections/create', compact('sections'));

    }

    public function editSections($id)
    {
        $section = Section::find($id);
        $sections = [''=>''] + Section::where('id', '!=', $id)->get()->lists('name', 'id');

        return view('admin/sections/edit', compact('section', 'sections'));
    }

    public function storeSections(SectionsRequest $request)
    {
        $section = new Section($request->all());
        $section->user()->associate(Auth::user())->save();
        $this->storeImages($section, $request);

        return redirect('admin/sections');
    }

    public function updateSections($id, SectionsRequest $request)
    {
        $section = Section::findOrFail($id);
        $this->updateImages($section, $request);
        $section->update($request->all());
        $section->user()->associate(Auth::user())->update();
        $this->storeImages($section, $request);

        return redirect('admin/sections');
    }






    /**
     * Товары каталога
     */

    public function indexProducts()
    {
        $products = Product::paginate(10);
        return view('admin/products/index', compact('products'));
    }

    public function destroyProducts($id)
    {
        Product::find($id)->delete();
        return redirect('admin/products');
    }

    public function createProducts()
    {
        $sections = [''=>''] + Section::get()->lists('name', 'id');
        $brands = [''=>''] + Brand::get()->lists('name', 'id');
        return view('admin/products/create', compact('sections', 'brands'));

    }

    public function editProducts($id)
    {
        $product = Product::find($id);
        $sections = [''=>''] + Section::get()->lists('name', 'id');
        $brands = [''=>''] + Brand::get()->lists('name', 'id');

        return view('admin/products/edit', compact('product', 'sections', 'brands'));
    }

    public function storeProducts(ProductsRequest $request)
    {
        $product = new Product($request->all());
        $product->user()->associate(Auth::user())->save();
        $this->storeImages($product, $request);

        return redirect('admin/products');
    }

    public function updateProducts($id, ProductsRequest $request)
    {
        $product = Product::findOrFail($id);
        $this->updateImages($product, $request);
        $product->update($request->all());
        $product->user()->associate(Auth::user())->update();
        $this->storeImages($product, $request);

        return redirect('admin/products');
    }

}
