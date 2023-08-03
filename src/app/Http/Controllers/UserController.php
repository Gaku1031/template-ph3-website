<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::getUsers(); // Userモデルからデータを取得
        return view('user', ['users' => $users]); // データをViewに渡す
    }
}
