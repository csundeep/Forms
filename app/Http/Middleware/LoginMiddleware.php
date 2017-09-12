<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;


class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userName = $request->username;
        $password = $request->password;
        $rememberMe = $request->remember;
        $user = new User();
        $users = $user->get();
        $post = new Post();
        $posts = $post->get();
        foreach ($users as $u) {
            if ($userName == $u->email && $password == $u->password) {
                if ($rememberMe == 'remember') {
                    Cookie::queue('userName', $userName, 45000);
                    $value = Cookie::get('userName');
                    echo $value;
                    return view("messageboard", compact('posts'))->withCookie(Cookie::make('userName', $userName, 45000));
                } else {
                    $request->session()->put('userName', $userName);
                    return view("messageboard", compact('posts'));
                }


            }
        }

        return $next($request);
    }
}
