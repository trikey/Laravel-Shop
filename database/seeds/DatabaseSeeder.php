<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\Blog;
use \App\Offer;
use \App\Brand;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
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
		// $this->call('UserTableSeeder');
	}

}
