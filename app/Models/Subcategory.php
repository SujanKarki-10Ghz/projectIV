<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table ='subcategories';
    protected $fillable=[
        'category_id',
        'url',
        'name',
        'description',
        'image',
        'priority',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Products::class,'sub_category_id','id')
            ->where('status','0');
    }
}
