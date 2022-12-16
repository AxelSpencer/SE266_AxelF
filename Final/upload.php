<?php
    session_start();

    include_once __DIR__ . "/functions.php";
    include_once __DIR__ . "/model.php";

    if(getuser($_SESSION['username'], $_SESSION['password']) != "Login Successful")
    {
        header('Location: login.php');
    }
    
    if (isset ($_FILES['fileToUpload'])) 
    {
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    }

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeneriCo. | File</title>
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
            width: 25%;
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
            color: #19a1db
        }
        a:hover
        {
            color: yellow
        }
    </style>
</head>
<body>
    <div class="container">
        </br>
        <h2><b>Upload File</b></h2>
        <p>Upload may take a while to proccess.</p>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload">
            <input type="submit" value="Upload">
        </form>

        </br>
        <div><a href="./search.php"><b>Return</b></a></div>
        </br>
    </div>
</body>
</html>

<?php
    if (isset ($_FILES['fileToUpload'])) 
    {
        $file = fopen ($tmp_name, 'rb');
        while (!feof($file)) 
        {
            $employee = fgetcsv($file);
            addEmployee($employee[0], $employee[1], $employee[2], $employee[3], $employee[4], $employee[5]);
            header('Location: search.php');
        }
    }
?>