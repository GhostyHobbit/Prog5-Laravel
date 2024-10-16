<?php

namespace App\Http\Controllers;

use App\Models\God;
use Illuminate\Http\Request;

class GodsController extends Controller
{
    //normal index view
    public function index()
    {
        $gods = God::all();
        return view('gods', compact('gods'));
    }

    //form for create
    public function create()
    {
        return view('god_create');
    }

    //store to database
    public function store(Request $request)
    {
        $god = new God();
        $god->name = $request->input('name');
        $god->description = $request->input('description');
        $god->domain = $request->input('domain');
        $god->pantheon = $request->input('pantheon');
        $god->save();

        return redirect(route('gods.index'));
    }
    //display details
    public function show(God $god) {
        return view('gods-detail', compact('god'));
    }

    //show form to edit
    public function edit(God $god)
    {
        //
    }

    //update into database
    public function update(Request $request, God $god)
    {
        //
    }

    //delete out of database
    public function destroy(God $god)
    {
        //
    }
}
