<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Requests\ForumRequest;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::all();

        return view('admin.forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumRequest $request)
    {
        $forum = new Forum();

        $forum->titre = $request->titre;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();

        $forum->save();

        return redirect('admin/forums')->with('added', 'Votre nouveau sujet a été créé avec succé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forum = Forum::find($id);
        return view('admin.forums.edit', compact('forum'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumRequest $request, $id){

        $forum = Forum::find($id);

        $forum->titre = $request->titre;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();

        $forum->save();

        return redirect('admin/forums')->with('updated', 'Votre nouveau sujet a été modifié avec succé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forum::find($id)->delete();

        return redirect('admin/forums')->with('deleted', 'Le forum a été supprimé avec succés');

    }
}