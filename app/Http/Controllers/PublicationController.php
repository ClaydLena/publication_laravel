<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;


class PublicationController extends Controller
{
    public function store(Request $request){

        $user = User::find($request -> user_id);
        $user -> name = $user -> name;
        $user -> update();

        $publication = new Publication();
        $publication -> title = $request -> title;
        $publication -> content = $request -> content;
        $publication -> likes = $request -> likes;
        $publication -> user_id = $request -> user_id;
        $publication -> save();

        return response() -> json($publication, 201);
    }
}
