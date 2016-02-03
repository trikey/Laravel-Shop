<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Section;

class Product extends Model {

    protected $table = 'products';

    protected $fillable = ['active', 'active_from', 'active_till', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description', 'parent_id', 'brand_id', 'is_new_product', 'is_sale_leader', 'price'];

    protected $appends = ['url', 'delete_preview', 'delete_detail', 'currency', 'price_print'];

    protected $dates = ['active_from', 'active_till'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function section()
    {
        return $this->belongsTo('App\Section', 'parent_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function sizes()
    {
        return $this->hasMany('App\Size');
    }

    public function getUrlAttribute()
    {
        $section = Section::find($this->attributes['parent_id']);
        return $this->attributes['url'] = url('catalog/'.$section->code.'/'.$this->attributes['code']);
    }

    public function getCurrencyAttribute()
    {
        return $this->attributes['currency'] = 'RUB';
    }

    public function getPricePrintAttribute()
    {
        return $this->attributes['price_print'] = $this->attributes['price'] . " р.";
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
