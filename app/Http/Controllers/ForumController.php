<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Requests\ForumRequest;
use Auth;
class ForumController extends Controller
{
    public function __construct(){
        // return $this->middleware('auth');
    }

    public function index(){
        $forums = Forum::orderBy('created_at', 'desc')->paginate(10);
        return view('forums.index', compact('forums'));
    }

    public function create(){
        return view('forums.create');
    }
    public function show($id){
        $forum = Forum::find($id);

        return view('forums.show', compact('forum'));
    }


    public function store(ForumRequest $request){
        
        $forum = new Forum();

        $forum->titre = $request->titre;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();

        $forum->save();

        return redirect('forums')->with('added', 'Votre nouveau sujet a été créer avec succé');
    }

    
    public function update(ForumRequest $request, $id){
        $forum = Forum::find($id);

        $forum->titre = $request->titre;
        $forum->description = $request->description;
        $forum->user_id = Auth::id();

        $forum->save();

        return redirect('forums')->with('added', 'Votre nouveau sujet a été créer avec succé');
    }

    public function destroy($id)
    {
        Forum::find($id)->delete();
        return redirect('forums')->with('deleted', 'Le sujet a été supprimé avec succé');
        
    }


}
