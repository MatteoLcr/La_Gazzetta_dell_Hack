<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        "name"
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
