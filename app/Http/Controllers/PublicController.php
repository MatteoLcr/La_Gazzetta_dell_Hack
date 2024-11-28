<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public $ad = 
    [
        ['/storage/ad/amazon.png'],
        ['/storage/ad/aereo.jpg'],
        ['/storage/ad/ikea.jpg'],
        ['/storage/ad/iphone.jpg']
    ];
    

    public function home() {
        $countries = Country::all(); 
        $categories = Category::all();
        $articles = Article::orderBy('id','desc')->take(4)->get();
        return view('welcome',['ad'=>$this->ad, 'articles'=>$articles, 'categories'=>$categories, 'countries'=>$countries]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    
}
