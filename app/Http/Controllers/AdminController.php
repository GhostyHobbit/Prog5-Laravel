<?php

namespace App\Http\Controllers;

use App\Models\God;
use App\Models\Tag;

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
