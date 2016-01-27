<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

    protected $table = 'sections';

    protected $fillable = ['active', 'active_from', 'active_till', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description', 'parent_id'];

    protected $appends = ['url'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'parent_id');
    }

    public function getUrlAttribute()
    {
        return $this->attributes['url'] = url('catalog/'.$this->attributes['code']);
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
