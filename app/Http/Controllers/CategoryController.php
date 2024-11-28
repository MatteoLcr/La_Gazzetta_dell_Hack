<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryIndex(Category $category){
        
        return view("category.index", compact('category')) ;
    }
}
