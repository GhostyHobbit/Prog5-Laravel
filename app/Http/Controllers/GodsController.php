<?php

namespace App\Http\Controllers;

use App\Models\God;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GodsController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index']),
        ];
    }

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
        $validated = $request->validate([
            'name' => 'required|unique:gods',
            'description' => 'required',
            'domain' => 'required',
            'pantheon' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'name.unique' => 'This god already exists on the website',
            'description.required' => 'Description is required',
            'domain.required' => 'Domain is required',
            'pantheon.required' => 'Pantheon is required',
        ]);

        $god = new God();
        $god->name = $request->input('name');
        $god->description = $request->input('description');
        $god->domain = $request->input('domain');
        $god->pantheon = $request->input('pantheon');
        $god->user_id = \Auth::user()->id;
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
