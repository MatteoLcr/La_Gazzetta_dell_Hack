<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function articles() //nome modello relazionato al plurale
    {
        return $this->belongsToMany(Article::class);
    }

    public function countries() {
        return $this->belongsToMany(Country::class);
    }
}
