<?php
    include __DIR__ . '/model.php';
    include __DIR__ . '/functions.php';
    session_start();
    
    $error = false;

    if(isPostRequest())
    {
        $_SESSION['username'] = filter_input(INPUT_POST, 'username');
        $_SESSION['password'] = filter_input(INPUT_POST, 'password');
        if (getuser($_SESSION['username'], $_SESSION['password']) == "Login Successful")
        {
            header('Location: schoolSearch.php');
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

    include_once __DIR__ . "/header.php";
?>
    <form class="form-horizontal" action="login.php" method="post">
        <div class="panel panel-primary">

            <div class="form-group">
                <label class="control-label col-sm-2" for="team name">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="team name">Password:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
            </div>

            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-warning"><b>Login</b></button>
                </div>
            </div>

            <?php
                if($error == true)
                {
                    echo "<p style='color:red'>*Login Failed*</p>";
                }
            ?>

        </div>
    </form>

    <?php
        include_once __DIR__ . "/footer.php";
    ?>
