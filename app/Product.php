<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Section;

class Product extends Model {

    protected $table = 'products';

    protected $fillable = ['active', 'active_from', 'active_till', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description', 'parent_id', 'brand_id', 'is_new_product', 'is_sale_leader', 'price'];

    protected $appends = ['url', 'currency', 'price_print', 'brand_link', 'available_sizes'];

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

    public function getBrandLinkAttribute()
    {
        return $this->attributes['brand_link'] = '/brand/'.$this->brand->code;
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
        return $this->attributes['price_print'] = intval($this->attributes['price']) . " р.";
    }

    public function getAvailableSizesAttribute()
    {
        return implode(" / ", $this->sizes()->get()->lists('name'));
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }

    public function scopeNewProducts($query)
    {
        return $query->where('is_new_product', '=', 1);
    }

    public function scopeSaleLeaderProducts($query)
    {
        return $query->where('is_sale_leader', '=', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
}
