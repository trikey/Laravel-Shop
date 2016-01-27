<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Section;

class Size extends Model {

    protected $table = 'sizes';

    protected $fillable = ['active', 'active_from', 'active_till', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description', 'product_id', 'quantity', 'chest', 'waist', 'thigh', 'sleeve_length', 'sleeve_width', 'length'];

    protected $appends = ['url'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
