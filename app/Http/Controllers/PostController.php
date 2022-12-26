<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostCreated;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;
// use Flasher\Laravel\Facade\Flasher;
class PostController extends Controller
{
    // public function index(){
    //     $posts = Post::all();
    //     // dd($posts);
    //     return view('posts', [
    //         'posts' => $posts
    //     ]);
    // }

    public function create(){
        // Post create form view
        return view('post.create');
    }

    public function store(Request $request, FlasherInterface $flasher){
        // Form Validation with custom message
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ], [
            'title.required' => "Title must be filled up.",
            'content.required' => "Content field must be required.",
        ]);

        // Save Post data into database
        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->content = $request->content;
        $post->save();

        $user = Auth::user();
        $user->notify(new PostCreated($post));

        // Flash Message
        // $request->session()->flash('success', 'Post added successfully!');
        $flasher->addSuccess('Post added successfully!');

        // return 'Post is saved. Id is '.$post->id;
        return redirect()->route('dashboard');
    }

    public function edit($id, FlasherInterface $flasher){
        // $post = Post::findOrFail($id);
        $post = Post::find($id);

        if(empty($post)) {
            $flasher->addError('Post not found');
            return redirect()->route('dashboard');
        }

        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function update($id, Request $request, FlasherInterface $flasher){
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Post updated successfully!');

        return redirect('dashboard');
    }

    public function destroy($id, FlasherInterface $flasher){
        $post = Post::findOrFail($id);
        $post->delete();

        $flasher->addSuccess('Post deleted successfully');

        return redirect()->route('dashboard');
    }
}
