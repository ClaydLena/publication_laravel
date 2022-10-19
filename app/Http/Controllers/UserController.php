<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    $user = User::firstOrFail();
    return response() -> json($user->load('publications'), 200); 
}
