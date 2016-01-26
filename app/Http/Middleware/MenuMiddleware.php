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
        Menu::make('example', function($menu) {
            $menu->add('Акции', 'aktsii');
            $menu->add('Блог', 'blog');
        });
		return $next($request);
	}

}
