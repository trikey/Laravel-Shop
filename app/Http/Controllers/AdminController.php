<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin/index');
	}

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
        $article = new Blog(array(
            'name' => $request->get('name'),
            'preview_picture'  => $request->get('preview_picture'),
            'code' => $request->get('code')
        ));
        $user = Auth::user();

        $article->user()->associate($user);

        $article->save();

        $imageName = $article->id . '.' . $request->file('preview_picture')->getClientOriginalExtension();
        $request->file('preview_picture')->move(base_path() . '/public/uploads/', $imageName);
        $article->preview_picture = $imageName;

        $article->save();

        return redirect('admin/news');
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
