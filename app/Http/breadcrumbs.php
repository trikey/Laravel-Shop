<?php

use \App\Blog;
use \App\Offer;

/**
 * Home
 */
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('На главную', route('home'));
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