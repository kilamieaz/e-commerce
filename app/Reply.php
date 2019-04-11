<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    protected $guarded = [];
    protected $with = ['user', 'product', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
