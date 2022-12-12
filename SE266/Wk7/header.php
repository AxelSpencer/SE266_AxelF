<!DOCTYPE html>
<html lang="en">
<head>
    <title>School Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style type="text/css">
        body 
        {
            background-color: #161b22; 
            color: white;
            margin-right: 2%; 
            margin-left: 2%;
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
        *::-webkit-scrollbar 
        {
            width: 16px;
        }
        *::-webkit-scrollbar-track 
        {
            border-radius: 8px;
        }
        *::-webkit-scrollbar-thumb {
            height: 56px;
            border-radius: 8px;
            border: 4px solid transparent;
            background-clip: content-box;
            background-color: #888;
        }
        *::-webkit-scrollbar-thumb:hover {
            background-color: #555;
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
      <a class="nav-item nav-link active" href="../Main/MainPage.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="../Main/Assignment.php">Assignments</a>
      <a class="nav-item nav-link active" href="../Main/Resources.php">Resources</a>
      <a class="nav-item nav-link active" href="https://github.com/AxelSpencer/SE266_AxelF">GitHub</a>
      </div>
    </div>
  </nav>
  <div class="container">