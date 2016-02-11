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
use \App\OrderProperty;
use \App\DeliverySystem;
use \App\PaySystem;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('properties_in_order')->delete();
        DB::table('order_cart')->delete();
        DB::table('orders')->delete();
        DB::table('order_properties')->delete();
        DB::table('delivery_systems')->delete();
        DB::table('pay_systems')->delete();
        DB::table('sizes')->delete();
        DB::table('products')->delete();
        DB::table('sections')->delete();
        DB::table('brands')->delete();
        DB::table('blog')->delete();
        DB::table('offers')->delete();
        DB::table('users')->delete();

        $user = new User([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        $user->save();

        $article = new Blog([
            'name' => 'Тестовая статья',
            'code' => 'test_article',
            'preview_text' => '<p>Короткое описание статьи</p>',
            'detail_text' => '<p>Полное описание статьи</p>',
            'preview_picture' => 'demo/2_prev.jpg',
            'detail_picture' => 'demo/2_detail.jpg',
            'active' => 1,
        ]);
        $article->user()->associate($user);
        $article->save();

        $article = new Blog([
            'name' => 'Тестовая статья 2',
            'code' => 'test_article2',
            'preview_text' => '<p>Короткое описание статьи</p>',
            'detail_text' => '<p>Полное описание статьи</p>',
            'preview_picture' => 'demo/3_prev.jpg',
            'detail_picture' => 'demo/3_detail.jpg',
            'active' => 1,
        ]);
        $article->user()->associate($user);
        $article->save();


        $offer = new Offer([
            'name' => 'Тестовая акция',
            'code' => 'test_action',
            'preview_text' => '<p>Короткое описание акции</p>',
            'detail_text' => '<p>Полное описание акции</p>',
            'preview_picture' => 'demo/4_prev.jpg',
            'detail_picture' => 'demo/4_detail.jpg',
            'active' => 1,
        ]);
        $offer->user()->associate($user);
        $offer->save();

        $brand = new Brand([
            'name' => 'Тестовый Бренд',
            'code' => 'test_brand',
            'active' => 1,
            'preview_picture' => 'demo/brand_prev.png',
            'detail_picture' => 'demo/brand_prev.png'
        ]);
        $brand->user()->associate($user);
        $brand->save();

        $section = new Section([
            'name' => 'Мужская одежда',
            'code' => 'muzhskoe',
            'active' => 1,
        ]);
        $section->user()->associate($user);
        $section->save();


        $secondLevelSection = new Section([
            'name' => 'Джинсы',
            'code' => 'dzhinsy',
            'active' => 1,
            'parent_id' => $section->id
        ]);
        $secondLevelSection->user()->associate($user);
        $secondLevelSection->save();

        $section = new Section([
            'name' => 'Женская одежда',
            'code' => 'zhenskoe',
            'active' => 1,
        ]);
        $section->user()->associate($user);
        $section->save();


        $secondLevelSection = new Section([
            'name' => 'Футболки',
            'code' => 'futbolki',
            'active' => 1,
            'parent_id' => $section->id
        ]);
        $secondLevelSection->user()->associate($user);
        $secondLevelSection->save();


        $product = new Product([
            'name' => 'Футболка Sorry I\'m not "Window"',
            'code' => 'futbolka_sorry_i_m_not_window',
            'active' => 1,
            'preview_picture' => 'demo/1_prev.jpg',
            'detail_picture' => 'demo/1_detail.jpg',
            'detail_text' => '<p>Короткое описание товара</p>',
            'price' => 5999,
            'is_new_product' => 1,
            'is_sale_leader' => 1
        ]);
        $product->user()->associate($user);
        $product->section()->associate($secondLevelSection);
        $product->brand()->associate($brand);
        $product->save();

        $size = new Size([
            'name' => 'S',
            'active' => 1
        ]);
        $size->user()->associate($user);
        $size->product()->associate($product);
        $size->save();

        $size = new Size([
            'name' => 'M',
            'active' => 1
        ]);
        $size->user()->associate($user);
        $size->product()->associate($product);
        $size->save();

        $size = new Size([
            'name' => 'L',
            'active' => 1
        ]);
        $size->user()->associate($user);
        $size->product()->associate($product);
        $size->save();

        $orderProperty = new OrderProperty([
            'name' => 'ФИО',
            'code' => '	ФИО',
            'active' => 1,
            'sort' => 1
        ]);
        $orderProperty->user()->associate($user);
        $orderProperty->save();


        $orderProperty = new OrderProperty([
            'name' => 'E-Mail',
            'code' => 'E-Mail',
            'active' => 1,
            'sort' => 2
        ]);
        $orderProperty->user()->associate($user);
        $orderProperty->save();


        $orderProperty = new OrderProperty([
            'name' => 'Телефон',
            'code' => 'phone',
            'active' => 1,
            'sort' => 3
        ]);
        $orderProperty->user()->associate($user);
        $orderProperty->save();


        $orderProperty = new OrderProperty([
            'name' => 'Местоположение',
            'code' => 'location',
            'active' => 1,
            'sort' => 4
        ]);
        $orderProperty->user()->associate($user);
        $orderProperty->save();


        $orderProperty = new OrderProperty([
            'name' => 'Адрес доставки',
            'code' => 'address',
            'active' => 1,
            'sort' => 5
        ]);
        $orderProperty->user()->associate($user);
        $orderProperty->save();

        $paySystem = new PaySystem([
            'name' => 'PayAnyWay',
            'code' => 'payanyway',
            'active' => 1,
            'sort' => 1
        ]);
        $paySystem->user()->associate($user);
        $paySystem->save();

        $deliverySystem = new DeliverySystem([
            'name' => 'СДЭК',
            'code' => 'cdek',
            'active' => 1,
            'sort' => 1
        ]);
        $deliverySystem->user()->associate($user);
        $deliverySystem->save();

	}

}
