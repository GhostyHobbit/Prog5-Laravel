<?php

namespace App\Http\Controllers;

use App\Models\God;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminController extends Controller
{
//    public static function middleware(): array
//    {
//        return [
//            new Middleware('auth', except: ['index', 'show']),
//        ];
//    }
    public function index() {
        $gods = God::all();
        $tags = Tag::all();
        return view('admin_dash', compact('gods'), compact('tags'));
    }
}
