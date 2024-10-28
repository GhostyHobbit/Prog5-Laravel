<?php

namespace App\Http\Controllers;

use App\Models\God;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AdminController extends Controller
{
    public function index() {
        $gods = God::all();
        $tags = Tag::all();
        return view('admin_dash', compact('gods'), compact('tags'));
    }

    public function toggle(God $god) {
        $god->active = !$god->active;
        $god->save();

        return redirect(route('admin.index'));
    }
}
