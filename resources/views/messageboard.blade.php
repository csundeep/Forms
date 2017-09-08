<!doctype html>
<html>
<head>
    <title>Message Board</title>
    <style>
        header {
            background-image: url('{{ asset('../images/logo.gif') }}');
        }

        #messageBoard {
            width: 700px;
            border-collapse: collapse;
            border: 1px solid #002F2F;
            background-color: #E6E2AF;
            caption-side: bottom;
        }

        #td:first-child {
            width: 21%;
        }

        #td {
            text-align: center;
        }

        #th {
            background-color: #046380;
            color: #EFECCA;
            vertical-align: top;
        }

        #tr:nth-child(even) {
            background-color: #EFECCA;
        }

        #th {
            padding-top: 2px;
            padding-bottom: 2px;
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
            $("#query").hide();
            $("#PostQuery").click(function () {
                $("#query").slideToggle();
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
                @if(Session::get('userName')==""&&Cookie::get('userName')=="")
                    <li><span>Welcome Guest</span></li>
                @endif
                @if(Session::get('userName')!=""||Cookie::get('userName')!="")
                    <li><span>Welcome {{Session::get('userName')}}{{Cookie::get('userName')}}</span></li>
                @endif

                @if(Session::get('userName')==""&&Cookie::get('userName')=="")
                    <li><a href="login">login</a></li>
                    <li><a href="register">Register</a></li>
                @endif
                @if(Session::get('userName')!=""||Cookie::get('userName')!="")
                    <li><a href="logout">logout</a></li>
                @endif
            </ul>
        </nav>
    </header>
    <article id="intro">
        <h2>User posts</h2>
        <table id="messageBoard">
            <tr id="tr">
                <th id="th">Post Title</th>
                <th id="th">Posted by</th>
                <th id="th">No of comments</th>
                <th id="th">Posted On</th>
            </tr>
            @foreach($posts as $post)

                <tr id="tr">
                    <td id="td"><a href="post/{{$post->id}}">{{$post->post_title}}</a></td>
                    <td id="td">{{$post->User['email']}}</td>
                    <td id="td">{{\App\Comments::where('post_id',$post->id)->count()}}</td>
                    <td id="td">{{$post->created_at}}</td>
                </tr>
            @endforeach
        </table>
        <br/>
        <br/>
        <br/>


        @if(Session::get('userName')!="")
            <input type="button" id="PostQuery" value="Post Your Query">

            <div id="query">
                <form action="postQuery" method="post">
                    <table>
                        <tr>
                            <td> Title :</td>
                            <td><input type="text" name="title"></td>
                        </tr>
                        <tr>
                            <td> Description :</td>
                            <td><textarea rows="4" cols="50" name="description"></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="post" id="post"/></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>
        @endif

    </article>


</div>


</body>
</html>