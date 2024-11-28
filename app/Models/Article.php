<?php

namespace App\Models;

use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        "image",
        "title",
        "subtitle",
        "body",
        "user_id",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }  

    public function categories() //nome modello relazionato al plurale
    {
        return $this->belongsToMany(Category::class);
    }

    public function countries() //nome modello relazionato al plurale
    {
        return $this->belongsToMany(Country::class);
    }
}
