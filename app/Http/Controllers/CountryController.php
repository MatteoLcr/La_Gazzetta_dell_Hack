<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function countryIndex(Country $country){
        $articles = Article::all();
        $categories = Category::all();
        return view("country.index", compact('country', 'categories', 'articles')) ;
    }
}
