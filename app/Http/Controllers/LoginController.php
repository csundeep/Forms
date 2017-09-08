<?php

namespace App\Http\Controllers;


use App\Http\Repositories\CommentsRepositoryInterface;
use App\Http\Repositories\PostsRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{


    protected $users;
    protected $posts;
    protected $comments;

    public function __construct(UserRepositoryInterface $users, PostsRepositoryInterface $posts, CommentsRepositoryInterface $comments)
    {
        $this->users = $users;
        $this->posts = $posts;
        $this->comments = $comments;
    }

    public function showLogin()
    {
        $message = "";
        return view("login", ['message' => $message]);
    }

    public function doLogout(Request $request)
    {
        $request->session()->flush();
        return Redirect::to('login'); // redirect the user to the login screen
    }

    public function doLogin(Request $request)
    {
        return view("login", ['message' => "login Failed : username and password does not match"]);
    }

    public function postLogin(Request $request)
    {
        $postId = $request->session()->get('postId');
        $userName = $request->username;
        $password = $request->password;
        $users = $this->users->findAll();
        $post = $this->posts->find($postId);
        $comments = $post->comments;
        foreach ($users as $u) {
            if ($userName == $u->email && $password == $u->password) {
                $request->session()->put('userName', $userName);
                return view("post", compact('post', 'comments'));
            }
        }
        return view("login", ['message' => "login Failed"]);
    }
}
