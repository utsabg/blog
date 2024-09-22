<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {
        $users = User::all();
        // dd($users);
        return response()->json([
            'data' => $users,
            'message' => 'success',

      ],200);

}
}
