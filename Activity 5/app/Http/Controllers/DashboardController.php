<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function admin()
    {
        $users = User::all();
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        return view('admin.dashboard', compact('users', 'posts'));
    }

    public function user()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = $response->json();

        return view('user.dashboard', compact('posts'));
    }
}
