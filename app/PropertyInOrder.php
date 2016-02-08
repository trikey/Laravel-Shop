<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyInOrder extends Model {

    protected $table = 'properties_in_order';

    protected $fillable = ['value'];

    public function property()
    {
        return $this->belongsTo('App\OrderProperty', 'property_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

}
