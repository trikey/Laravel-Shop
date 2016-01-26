<?php namespace App\Http\Middleware;

use Closure;
use Menu;

class MenuMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        Menu::make('menu', function($menu) {
            $menu->add('Акции', 'aktsii');
            $menu->add('Блог', 'blog');
            $menu->add('Бренды', 'brand');
        });
		return $next($request);
	}

}
