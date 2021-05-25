<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Auth;
class CommentaireController extends Controller
{
    public function store(Request $request){

        $comment = new Commentaire();

        $comment->contenue = $request->message;
        $comment->forum_id = $request->forum_id;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        $commentaires = Commentaire::where('forum_id', $request->forum_id)->get();

        return redirect('forums/'.$request->forum_id.'/show');
    }

}
