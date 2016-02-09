<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProperty extends Model {

    protected $table = 'order_properties';

    protected $fillable = ['active', 'sort', 'name', 'xml_id', 'code'];

    public function user()
    {
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function scopeFindByCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }

}
