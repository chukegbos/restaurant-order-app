<?php

namespace App;

use App\User;
use App\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /*public function user(){
    	return $this->belongsTo('App\User');
    }
    */
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'stock_name', 'stock_id', 'cost_price', 'selling_price', 'quantity', 'supplier', 'bar', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'remember_token', 'deleted_at'
    ];

    public function getBarAttribute()
    {
        $product = $this->attributes['stock_id']; 
        $quantity = $this->attributes['quantity'];        
        $find = Package::where('deleted_at', NULL)->where('product', $product)->sum('available');
        return $quantity - $find;   
    }
} 