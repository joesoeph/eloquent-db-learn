<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Phone;
use App\Post;
use App\Comment;
use App\Role;
use App\Supplier;
use App\Country;
use App\Video;
use App\Tag;

class WelcomeController extends Controller
{

    public function index()
    {
        $users = User::all();
        $phones = Phone::all();
        $posts = Post::all();
        $comments = Comment::all();
        $roles = Role::all();
        $suppliers = Supplier::all();
        $countries = Country::all();
        $videos = Video::all();
        $tags = Tag::all();

        return view('welcome', [
            'users' => $users,
            'phones' => $phones,
            'posts' => $posts,
            'comments' => $comments,
            'userRoles' => $users,
            'roles' => $roles,
            'suppliers' => $suppliers,
            'countries' => $countries,
            'videos' => $videos,
            'tags' => $tags,
        ]);
    }

    public function eager()
    {

        $users = User::with(['phone', 'roles', 'image'])->get();
        $phones = Phone::with('user')->get();
        $posts = Post::with(['comment', 'image', 'otherComments', 'user', 'tags'])->get();
        $comments = Comment::with('post')->get();
        $roles = Role::with('users')->get();
        $suppliers = Supplier::with('user','userHistory')->get();
        $countries = Country::with('posts', 'users')->get();
        $videos = Video::with(['otherComments', 'tags'])->get();
        $tags = Tag::with(['videos', 'posts'])->get();

        return view('eagerloading', [
            'users' => $users,
            'phones' => $phones,
            'posts' => $posts,
            'comments' => $comments,
            'roles' => $roles,
            'suppliers' => $suppliers,
            'countries' => $countries,
            'videos' => $videos,
            'tags' => $tags,
        ]);
    }
}
