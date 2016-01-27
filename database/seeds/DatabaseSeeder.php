<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\Blog;
use \App\Offer;
use \App\Brand;
use \App\Section;
use \App\Product;
use \App\Size;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('sizes')->delete();
        DB::table('products')->delete();
        DB::table('sections')->delete();
        DB::table('brands')->delete();
        DB::table('blog')->delete();
        DB::table('offers')->delete();
        DB::table('users')->delete();

        $user = new User([
            'name' => 'Ivan Belitskii',
            'email' => 'belitskii@gmail.com',
            'password' => bcrypt('swordfish1992')
        ]);
        $user->save();

        $article = new Blog([
            'name' => 'Тестовая статья',
            'code' => 'test_article'
        ]);
        $article->user()->associate($user);
        $article->save();

        $article = new Blog([
            'name' => 'Тестовая статья 2',
            'code' => 'test_article2'
        ]);
        $article->user()->associate($user);
        $article->save();


        $offer = new Offer([
            'name' => 'Тестовая акция',
            'code' => 'test_action'
        ]);
        $offer->user()->associate($user);
        $offer->save();

        $brand = new Brand([
            'name' => 'Тестовый Бренд',
            'code' => 'test_brand'
        ]);
        $brand->user()->associate($user);
        $brand->save();

        $section = new Section([
            'name' => 'Мужская одежда',
            'code' => 'muzhskoe',
        ]);
        $section->user()->associate($user);
        $section->save();

        $product = new Product([
            'name' => 'Джинсы',
            'code' => 'jeans',
        ]);
        $product->user()->associate($user);
        $product->section()->associate($section);
        $product->brand()->associate($brand);
        $product->save();

        $size = new Size([
            'name' => 'L'
        ]);
        $size->user()->associate($user);
        $size->product()->associate($product);
        $size->save();

        $size = new Size([
            'name' => 'XL'
        ]);
        $size->user()->associate($user);
        $size->product()->associate($product);
        $size->save();

		// $this->call('UserTableSeeder');
	}

}
