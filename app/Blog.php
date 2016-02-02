<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'blog';

    protected $fillable = ['active', 'active_from', 'active_till', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $appends = ['url', 'delete_preview', 'delete_detail'];

    protected $dates = ['active_from', 'active_till'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function getUrlAttribute()
    {
        return $this->attributes['url'] = url('blog/'.$this->attributes['code']);
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
