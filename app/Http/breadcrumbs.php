<?php

use \App\Blog;
use \App\Offer;
use \App\Brand;
use \App\Section;
use \App\Product;

/**
 * Home
 */
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', route('home'));
});

/**
 * 404 Page
 */
Breadcrumbs::register('', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('404', '#');
});

/**
 * Cart Page
 */
Breadcrumbs::register('cart', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Корзина', route('cart'));
});


/**
 * Order making page
 */
Breadcrumbs::register('order_make', function($breadcrumbs)
{
    $breadcrumbs->parent('cart');
    $breadcrumbs->push('Оформление заказа', route('order_make'));
});

/**
 * Order making page
 */
Breadcrumbs::register('order_detail', function($breadcrumbs)
{
    $breadcrumbs->parent('cart');
    $breadcrumbs->push('Просмотр заказа', route('order_detail'));
});

/**
 * Home > Blog
 */
Breadcrumbs::register('blog.blog.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Блог', route('blog.blog.index'));
});
/**
 * Home > Blog > Blog page
 */
Breadcrumbs::register('blog.blog.show', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('blog.blog.index');
    $article = Blog::FindByCode($page)->first()->toArray();
    $breadcrumbs->push($article['name'], route('blog.blog.show'));
});

/**
 * Home > Offers
 */
Breadcrumbs::register('offers.aktsii.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Акции', route('offers.aktsii.index'));
});
/**
 * Home > Offers > Offers page
 */
Breadcrumbs::register('offers.aktsii.show', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('offers.aktsii.index');
    $offer = Offer::FindByCode($page)->first()->toArray();
    $breadcrumbs->push($offer['name'], route('offers.aktsii.show'));
});
/**
 * Home > Brands
 */
Breadcrumbs::register('brand.brand.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Бренды', route('brand.brand.index'));
});
/**
 * Home > Offers > Offers page
 */
Breadcrumbs::register('brand.brand.show', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('brand.brand.index');
    $brand = Brand::FindByCode($page)->first()->toArray();
    $breadcrumbs->push($brand['name'], route('brand.brand.show'));
});



/**
 * Home > Catalog
 */
Breadcrumbs::register('catalog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Каталог', route('catalog'));
});
/**
 * Home > Catalog > Section
 */
Breadcrumbs::register('catalog_section', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('catalog');
    $section = Section::FindByCode($page)->first();
    $breadcrumbs->push($section['name'], $section->url);
});
/**
 * Home > Catalog > Section > Product
 */
Breadcrumbs::register('catalog_product', function($breadcrumbs, $section, $product)
{
    $breadcrumbs->parent('catalog_section', $section);
    $product = Product::FindByCode($product)->first()->toArray();
    $breadcrumbs->push($product['name'], route('catalog_product'));
});