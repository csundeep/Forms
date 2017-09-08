<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CommentsRepositoryInterface;
use App\Http\Repositories\PostsRepositoryInterface;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class MessageBoardController extends Controller
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


    public function showMessageBoard()
    {
        $posts = $this->posts->findAll();
        return view("messageboard", compact('posts'));
    }

    public function postQuery(Request $request)
    {
        $userName = $request->session()->get('userName');
        $user = $this->users->findByEmail($userName);

        $input = array_merge(['post_title' => $request->title],
            ['description' => $request->description],
            ['user_id' => $user->id]);

        $this->posts->store(null, $input);
        $posts = $this->posts->findAll();
        return view("messageboard", compact('posts'));
    }

    public function showPost($id, Request $request)
    {
        $post = $this->posts->find($id);
        $comments = $this->posts->find($id)->comments;
        $request->session()->put('postId', $id);
        return view("post", compact('post', 'comments'));
    }

    public function postComment($comment, Request $request)
    {

        $postId = $request->session()->get('postId');
        $userName = $request->session()->get('userName');
        $responseString = "<table>";
        if ($comment != null || $comment != "") {
            $input = array_merge(['comment' => $comment],
                ['post_id' => $postId],
                ['user_id' => $this->users->findByEmail($userName)]);
            $this->comments->store(null, $input);
        }

        $comments = $this->posts->find($postId)->comments;
        foreach ($comments as $comment) {
            $responseString = $responseString . "<tr>
                <td><p>" . $comment->comment . "</p> <span id=\"commentedBy\"> by " . $this->users->find($comment->user_id)->email . "
                                at " . $comment->created_at . "</span>
                            </td></tr>";
        }
        $responseString = $responseString . "</table>";

        return $responseString;
    }
}
