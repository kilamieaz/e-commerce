<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function selectValue()
    {
        return $this->id;
    }

    public function selectText()
    {
        return $this->name;
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
