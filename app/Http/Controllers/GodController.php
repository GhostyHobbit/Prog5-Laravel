<?php

namespace App\Http\Controllers;

use App\Models\God;
use Illuminate\Http\Request;

class GodController extends Controller
{
    public function index() {
        $gods = God::all();
        return view('gods', compact('gods'));
    }

    public function show($id) {
        $god = God::find($id);
        return view('gods-detail', compact('god'));
    }
}
