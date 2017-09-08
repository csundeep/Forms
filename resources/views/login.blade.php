<!doctype html>
<html>
<head>
    <title>Message Board</title>
    <style>
        header {
            background-image: url('{{ asset('../images/logo.gif') }}');
        }
    </style>
    <link href="{{ asset('../css/messageboard.css') }}" rel="stylesheet">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
    <script>var __adobewebfontsappname__ = "dreamweaver"</script>
    <script src="http://use.edgefonts.net/source-sans-pro:n6:default;kaushan-script:n4:default.js"
            type="text/javascript"></script>

</head>
<body>

<div id="wrapper">
    <header id="header">
        <h1><span>Message</span> Board</h1>
    </header>
    <article id="form">
        <form action="login" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <td>UserName :</td>
                    <td><input type="text" name="username"><span
                                style="color: red">{{$errors ->first('username')}}</span></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="password"/><span
                                style="color: red">{{$errors ->first('password')}}</span></td>
                </tr>

                <tr>
                    <td><input type="submit" class="login" value="Login"><br/>
                    <td><input type="checkbox" value="remember" name="remember"> Remember password</td>
                </tr>
            </table>
            <span style="color: red"> {{$message}}</span></td>
        </form>
    </article>
    </header>
</div>

</body>
</html>