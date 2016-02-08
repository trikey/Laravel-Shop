<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model {

    protected $table = 'order_cart';

    protected $fillable = ['name', 'xml_id', 'code', 'url', 'preview_picture', 'price', 'quantity', 'sum'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
