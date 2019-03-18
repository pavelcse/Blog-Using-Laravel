<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class HomeController extends Controller
{

    public function index()
    {
        return view('admin.dashboard')
                ->with('posts_count', Post::all()->count())
                ->with('trashed_count', Post::onlyTrashed()->get()->count())
                ->with('categories_count', Category::all()->count())
                ->with('users_count', User::all()->count())
                ->with('tags_count', Tag::all()->count());
    }
}
