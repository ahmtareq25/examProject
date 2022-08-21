<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'title', 'description'
    ];


    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function productVariants(){
        return $this->hasMany(ProductVariant::class);
    }

    public function getVariants(){
        return self::query()->with(['productVariants' => function($q){
            $q->groupBy('variant');
        }])->get();
    }

}
