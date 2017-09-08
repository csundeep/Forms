<!doctype html>
<html>
<head>
    <title>Message Board</title>
    <style>
        header {
            background-image: url('{{ asset('../images/logo.gif') }}');
        }

        #commentedBy {
            font-size: 75%;
            color: #577A99;
            font-family: "Comic Sans MS", cursive, sans-serif;
            padding-left: 50px;
        }

    </style>
    <link href="{{ asset('../css/messageboard.css') }}" rel="stylesheet">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
    <script>var __adobewebfontsappname__ = "dreamweaver"</script>
    <script src="http://use.edgefonts.net/source-sans-pro:n6:default;kaushan-script:n4:default.js"
            type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            @if(Session::get('userName')==""&&\Illuminate\Support\Facades\Cookie::get('userName')=="")
            $("#newComment").val('please login to comment');
            $("#newComment").prop('disabled', true);
            @endif
        $("#comment").click(function () {
                var comment = $("#newComment").val();
                window.alert(comment);
                $.ajax({
                    url: "http://localhost/MessageBoard/public/postComment/" + comment,
                    success: function (result) {
                        $("table").empty();
                        $('#newComment').val('');
                        $("#response").html(result);

                    }
                });
            });
        });
    </script>
</head>
<body>

<div id="wrapper">
    <header id="header">
        <h1><span>Message</span> Board</h1>
        <nav id="mainnav">
            <ul>
                @if(Session::get('userName')==""&&\Illuminate\Support\Facades\Cookie::get('userName')=="")
                    <li><span>Welcome Guest</span></li>
                @endif
                @if(Session::get('userName')!=""||Illuminate\Support\Facades\Cookie::get('userName')!="")
                    <li>
                        <span>Welcome {{Session::get('userName')}}{{\Illuminate\Support\Facades\Cookie::get('userName')}}</span>
                    </li>
                @endif
                @if(Session::get('userName')==""&&\Illuminate\Support\Facades\Cookie::get('userName')=="")
                    <li><a href="login">login</a></li>
                    <li><a href="register">Register</a></li>
                @endif
                @if(Session::get('userName')!=""||Illuminate\Support\Facades\Cookie::get('userName')!="")
                    <li><a href="logout">logout</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <article id="intro">
        <h2>{{$post->post_title}}</h2>
        <p>{{$post->description}}</p>
    </article>

    <article id="intro">
        <h3>comments</h3>
        <table>
            <div id="response">
                @foreach($comments as $comment)
                    <tr>
                        <td><p>{{$comment->comment}}</p>
                            <span id="commentedBy"> by {{App\User::find($comment->user_id)->email}}
                                at {{$comment->created_at}}</span>

                        </td>
                    </tr>
                @endforeach
            </div>
        </table>

        <textarea rows="4" cols="50" name="newComment" id="newComment"></textarea>
        <input type="button" value="comment" id="comment">
    </article>
</div>
</body>
</html>