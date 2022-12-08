<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL | Assignments Page</title>
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
        <h1>Assignments</h1>

        <ul>
            <li><a href="../Wk1/MTG.php">Wk1 - FizzBuzz</a></li>
            <li><a href="../Wk2/PatientIntakeForm.php">Wk2 - Patient</a></li>
            <li><a href="../Wk3/ATM%20Starter%20Code/atm_starter.php">Wk3 - ATM</a></li>
            <li><a href="../Wk4/view.php">Wk4 - Patients</a></li>
            <li><a href="">Wk5 - Patient CRUD</a></li>
            <li><a href="../Wk6/index.php">Wk6 - Patient Metrics</a></li>
            <li><a href="">Wk6 - Schools</a></li>
            <li><a href="">Wk8 - Disney Votes</a></li>
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