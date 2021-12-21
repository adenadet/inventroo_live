<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Product extends Structure
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array('name', 'code', 'price', 'cost', 'category_id', 'quantity', 'description', 'brand', 'status', 'created_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at');

    public function admin(){
        return $this->belongsTo('App\Models\User', 'admin_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Inventory\ProductCategory', 'category_id', 'id');
    }
    
    public function colours(){
    	return $this->hasMany('App\Models\Inventory\ProductColour', 'product_id', 'id');
    }

    public function creator(){
    	return $this->belongsTo('App\Models\User', 'created_by', 'id');
	}

    public function deleter(){
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }

    public function details(){
        return $this->hasOne('App\Models\Inventory\ProductDetail', 'id', 'product_id');
    }

    public function sizes(){
        return $this->hasMany('App\Models\Inventory\ProductSize', 'product_id', 'id');
    }
}

