<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }


    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'You must have some categories & tags before creating a post.');
            return redirect()->back();

        }

        return view('admin.posts.create')->with('categories',  $categories)
                                         ->with('tags', $tags);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'featured'      => 'required|image',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title'         => $request->title,
            'category_id'   => $request->category_id,
            'content'       => $request->content,
            'featured'      => 'uploads/posts/'.$featured_new_name,
            'slug'          => str_slug($request->title),
            'user_id'       => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Created Successfully.');
        //return redirect()->route('');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $posts = Post::find($id);
        return view('admin.posts.edit')->with('posts', $posts)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
 

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post has been successfully Updated');
        return redirect()->route('posts');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Your Post has been Trashed');
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        Session::flash('success', 'Post has been Restored.');
        return redirect()->route('posts');
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $delete = $posts->featured;
        unlink($delete);
        $posts->forceDelete();
        
        Session::flash('success', 'Post has been Delete Permanently.');
        return redirect()->back();
    }
}
