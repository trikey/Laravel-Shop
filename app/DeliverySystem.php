<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySystem extends Model {

    protected $table = 'delivery_systems';

    protected $fillable = ['active', 'sort', 'name', 'preview_picture', 'preview_text', 'detail_picture', 'detail_text', 'xml_id', 'code', 'meta_title', 'meta_keywords', 'meta_description'];


    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
