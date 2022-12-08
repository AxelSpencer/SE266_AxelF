<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL | Resources Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body 
        {
            background-color: #161b22; 
            color: white;
            margin-right: 2%; 
            margin-left: 2%;
            margin-bottom:50px;
        } 

        a 
        {
            color: #dc3545
        }

        a:hover
        {
            color: red
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#"><b>PHP & MySQL</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="MainPage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="Assignment.php">Assignments</a>
            <a class="nav-item nav-link active" href="Resources.php">Resources</a>
            <a class="nav-item nav-link active" href="https://github.com/AxelSpencer/SE266_AxelF">GitHub</a>
            </div>
        </div>
    </nav>

    <div style="margin-right: 2%; margin-left: 2%">
        <h1><b>Resources</b></h1>

        <h2>Heroku</h2>
        <ul>
            <li><a href="https://devcenter.heroku.com/articles/getting-started-with-php">Getting started on Heroku with PHP</a></li>
            <li><a href="https://devcenter.heroku.com/articles/getting-started-with-php#deploy-the-app">Deploying the app</a></li>
            <li><a href="https://devcenter.heroku.com/articles/getting-started-with-php#set-up">Set Up PHP</a></li>
        </ul>

        <h2>PHP</h2>
        <ul>
            <li><a href="https://phpdelusions.net/pdo">PDO Tutorial</a></li>
            <li><a href="https://phptherightway.com/">PHP the right way</a></li>
            <li><a href="https://www.w3schools.com/php/">PHP Tutorial</a></li>
        </ul>

        <h2>GitHub</h2>
        <ul>
            <li><a href="https://www.youtube.com/githubguides">GitHub training guides</a></li>
            <li><a href="https://git-scm.com/book/en/v2">Pro Git Book</a></li>
            <li><a href="https://blog.hubspot.com/website/what-is-github-used-for">What is GitHub?</a></li>
        </ul>

        <footer class="bg-danger text-center text-white">
            &nbsp;
            <p>&copy; 2022 | Axel Fernandes-Spencer</p>
        <?php       
            date_default_timezone_set("America/New_York");
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            $test = new DateTime($mod_date, new DateTimeZone('America/New_York'));
            echo "File last updated " . date_format($test, "F d Y h:i:s A");
        ?>
        </footer>
    </div>
    
</body>
</html>