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
        <article id="form">
            <form action="register" method="POST">
                <table>
                    <tr>
                    <tr>
                        <td> First Name :<span style="color: red">*</span></td>
                        <td><input type="text" name="firstName"><span
                                    style="color: red">{{$errors ->first('firstName')}}</span></td>
                    </tr>
                    <tr>
                        <td>Last Name :<span style="color: red">*</span></td>
                        <td><input type="text" name="lastName"><span
                                    style="color: red">{{$errors ->first('lastName')}}</span></td>
                    </tr>
                    <tr>
                        <td>Email :<span style="color: red">*</span></td>
                        <td><input type="text" name="email"><span style="color: red">{{$errors ->first('email')}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password : <span style="color: red">*</span></td>
                        <td><input type="password" name="password"/><span
                                    style="color: red">{{$errors ->first('password')}}</span></td>
                    </tr>
                    <tr>
                        <td>Confirm password :</td>
                        <td><input type="password" name="conpassword"/>
                            <span style="color: red">{{$message}}</span></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="signUp" class="signUp" value="SignUp"><br/></td>
                        <td></td>
                    </tr>
                </table>
            </form>

        </article>
    </header>
</div>

</body>
</html>