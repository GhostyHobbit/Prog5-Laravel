<?php

namespace App\Http\Controllers;

use App\Models\God;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('god_create', compact('tags'));
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

        $succes = $god->save();
        if ($succes) {
            foreach ($request->input('tags') as $tag_id) {
                $god->tags()->attach($tag_id);
            }
        }

        return redirect(route('gods.index'));
    }
    //display details
    public function show(God $god) {
        return view('gods-detail', compact('god'));
    }

    //show form to edit
    public function edit(God $god)
    {
        return view('god-edit', compact('god'));
    }

    //update into database
    public function update(Request $request, God $god)
    {
        $validated = $request->validate([
            'name' => 'required',
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

        $god->name = $request->input('name');
        $god->description = $request->input('description');
        $god->domain = $request->input('domain');
        $god->pantheon = $request->input('pantheon');
        $god->user_id = \Auth::user()->id;

        return redirect(route('gods.index'));
    }

    public function delete(God $god) {
        return view('gods-delete', compact('god'));
    }

    //delete out of database
    public function destroy(God $god)
    {
        $god->delete();

        return redirect(route('gods.index'));
    }
}
