<?php

namespace App\Http\Controllers;

use App\Http\Repositories\PostsRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    protected $users;
    protected $posts;

    public function __construct(UserRepositoryInterface $users, PostsRepositoryInterface $posts)
    {
        $this->users = $users;
        $this->posts = $posts;
    }

    public function showRegistration()
    {
        $message = "";
        return view("register", compact('message'));
    }

    public function doRegistration(Request $request)
    {

        $input = array_merge(['first_name' => $request->firstName],
            ['last_name' => $request->lastName],
            ['email' => $request->email],
            ['password' => $request->password]);
        $posts = $this->posts->findAll();

        if ($request->conpassword != $request->password) {
            $message = "passwords not matched";
            return view("register", compact('message'));
        } else {
            $this->users->store(null, $input);
            $userName = $request->email;
            $request->session()->put('userName', $userName);
            return view("messageboard", compact('userName', 'posts'));
        }
    }
}
