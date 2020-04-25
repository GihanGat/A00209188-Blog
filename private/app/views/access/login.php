<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>User Login</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script type="text/javascript" src="view.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id="main_body" >
    <img id="top" src="top.png" alt="">
    <div id="form_container">
    
        <h1><a>Login</a></h1>
        <form id="frmbloglogin" class="appnitro"  action="/bloggerlog/login" method="post">
        <input type="hidden" name="csrftoken" value="<?php echo($csrfToken) ?>">
        <ul>
        <li>
            <label for="loginname">Email</label>
            <input id="loginname" name="loginname" required autocomplete="email">
        </li>
        <li>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="email">  
        </li>     
        <input id="submitForm" class="button_text" type="submit" name="submit" value="Submit" />
        </ul>
        </form> 
        <div id="footer">
        </div>
    </div>
    <img id="bottom" src="bottom.png" alt="">
    <a href="/BloggerLog/logout/">Login</a>
    <a href="/BloggerLog/logout/">Login</a>
    </body>
</html>