<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable = ['total_price', 'delivery_price', 'xml_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function order_user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function delivery_system()
    {
        return $this->hasOne('App\DeliverySystem', 'delivery_id');
    }

    public function pay_system()
    {
        return $this->hasOne('App\PaySystem', 'pay_system_id');
    }
}
