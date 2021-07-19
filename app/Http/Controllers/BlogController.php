<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    private $perpage = 5;

    public function home()
    {
        return view('blog.home',[
            'posts' => Post::publish()->latest()->paginate($this->perpage)
        ]);
    }

    public function showCategories()
    {
        return view('blog.categories',[
            'categories' => Category::OnlyParent()->paginate($this->perpage)
        ]);
    }

    public function showTags()
    {
        return view('blog.tags',[
            'tags' => Tag::paginate($this->perpage)
        ]);
    }
}