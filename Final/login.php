<?php
    session_start();

    include __DIR__ . '/model.php';
    include __DIR__ . '/functions.php';
    
    $error = false;

    if(isPostRequest())
    {
        $_SESSION['username'] = filter_input(INPUT_POST, 'username');
        $_SESSION['password'] = filter_input(INPUT_POST, 'password');
        if (getuser($_SESSION['username'], $_SESSION['password']) == "Login Successful")
        {
            header('Location: search.php');
        }
        else
        {
            $error = true;
        }
    }
    else if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
    {
        $_SESSION['username'] = "";
        $_SESSION['password'] = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeneriCo. | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style type="text/css">
        body 
        {
            background-color: #0D1117; 
            color: white;
            margin-bottom:50px;
        }
        footer 
        {
            position: fixed;
            height: 120px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin-right: 2%; 
            margin-left: 2%;
        }
        .container
        {
            width: 40%;
            background-color: #161b22;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
        }
        .material-symbols-outlined 
        {
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 48
        }
        a 
        {
            color: #dc3545
        }
        a:hover
        {
            color: red
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-horizontal" action="login.php" method="post">
            <div class="panel panel-primary">

                </br>
                <h1 style="text-align: center"><img style="margin-bottom: 10px" src="./images/genericLogo.png" alt="GeneriCo logo" width="50"><b>GeneriCo.</b></h1>
                <h3 style="text-align: center">Login</h3>

                <p style="text-align: center; color:red"><?php 
                if($error == true)
                {
                    echo '*Login Failed*';
                }
                ?></p>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="team name">Username</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="team name">Password</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                </div>

                <div class="form-group">        
                    <div class="col-sm-offset-1 col-sm-10">
                        <button type="submit" class="btn btn-warning"><b>Confirm</b></button>
                    </div>
                </div>

            </div>
        </form> 
    </div>
</body>
</html>