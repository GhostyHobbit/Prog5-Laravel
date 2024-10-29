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
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    //normal index view
    public function index(Request $request)
    {
        $tags = Tag::all();
        $gods = God::all();

        if ($request->input('tag') != null && $request->input('tag') != 'null') {
            $tagId = $request->input('tag');
            $gods = God::whereHas('tags', function($query) use ($tagId){
                $query->where('tag_id', $tagId);
            })->get();
        }

        if ($request->input('search') != null && $request->input('search') != 'null') {
            $gods = God::where('description', 'like', '%' . $request->input('search') . '%')->orWhere('domain', 'like', '%' . $request->input('search') . '%')->get();
        }

        return view('gods', compact('gods'), compact('tags'));
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
        if ($god->user_id === \Auth::user()->id || \Auth::user()->admin) {
            $tags = Tag::all();
            return view('god-edit', compact('god'), compact('tags'));
        } else {
            return redirect(url(route('gods.show', compact('god'))));
        }

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

        $succes = $god->save();
        if ($succes) {
            $god->tags()->sync($request->input('tags'));
        }

        return redirect(route('gods.index'));
    }

    public function delete(God $god) {
        $count = God::where('user_id', \Auth::id())->count();
        if ($count > 3) {
            return view('gods-delete', compact('god'));
        } else {
            return view('count_error');
        }
    }

    //delete out of database
    public function destroy(God $god)
    {
        $god->tags()->detach();
        $god->delete();

        return redirect(route('gods.index'));
    }
}
