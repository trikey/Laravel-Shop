<?php namespace App\Http\Middleware;

use Closure;
use Menu;
use \App\Section;
use \App\Brand;

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

			// Акции
            $menu->add('Акции', ['url' => 'aktsii', 'class' => 'active red-color'])->active('aktsii/*');

			// Каталог
			$sectionFirstLevel = Section::where('parent_id', '=', null)->get()->lists('name', 'code');
			foreach($sectionFirstLevel as $code => $name)
			{
				$sect = $menu->add($name, 'catalog/'.$code);
				$sectionsSecondLevel = Section::where('parent_id', '=', Section::findByCode($code)->get()->first()->id)->get()->lists('name', 'code');
				$this->addChildMenuItem($sect, $sectionsSecondLevel, 'catalog');
			}

			// Бренды
			$brand = $menu->add('Бренды', 'brand')->active('brand/*');
			$brands = Brand::all()->lists('name', 'code');
			$this->addChildMenuItem($brand, $brands, 'brand');

			// О магазине
			$menu->add('О магазине', 'about')->active('about/*');

			// Блог
			$menu->add('Блог', 'blog')->active('blog/*');

        });
		return $next($request);
	}

	/**
	 * Set children of the menu item
	 *
	 * @param MenuItem $item
	 * @param array $childrenArray
	 * @param string $section
	 */
	private function addChildMenuItem(&$item, $childrenArray, $section)
	{
		foreach($childrenArray as $code => $name)
		{
			$item->add($name, $section.'/'.$code)->active($section.'/'.$code.'/*');
		}
	}

}
