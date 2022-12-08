<?php
  include __DIR__ . '/model.php';
  include __DIR__ . '/functions.php';
  
  if (isset($_GET['action'])) 
  {
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'patientId');
    if ($action == "update") 
    {
      $row = getPatient($id);
      $fname = $row['patientFirstName'];
      $lname = $row['patientLastName'];
      $married = $row['patientMarried'];
      $bdate = $row['patientBirthDate'];
    } 
    else if ($action == "delete") 
    {
      $row = getPatient($id);
      $fname = $row['patientFirstName'];
      $lname = $row['patientLastName'];
      $married = $row['patientMarried'];
      $bdate = $row['patientBirthDate'];
    } 
    else 
    {
      $fname = "";
      $lname = "";
      $married = "";
      $bdate = "";
    }
  }

  if (isset($_POST['action'])) 
  {
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'patientId');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $married = filter_input(INPUT_POST, 'married');
    if($married == "on")
    {
      $married = "1";
    }
    else
    {
      $married = "0";
    }
    $bdate = filter_input(INPUT_POST, 'bdate');

    if ($action == "add") 
    {
      $result = addPatient($fname, $lname, $married, $bdate);
      header('Location: view.php');
    } 
    else if ($action == "update") 
    {
      $result = updatePatient ($id, $fname, $lname, $married, $bdate);
      header('Location: view.php');
    }
    else if ($action == "delete") 
    {
      $result = deletePatient($id);
      header('Location: view.php');
    }
    
  }

  

?>

<html lang="en">
<head>
  <title>Patients | <?= ucfirst($action) ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
 <p></p>
 <form class="form-horizontal" action="updatePatient.php" method="post">
   
 <div class="panel panel-primary">
<div class="panel-heading"><h4><?= ucfirst($action); ?> Patient</h4></div>
<p></p>
    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value='<?= $fname ?>'>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" value='<?= $lname ?>'>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Date of Birth:</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="bdate" name="bdate" value='<?= $bdate ?>'></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Married:</label>
      <div class="col-sm-10">          
        <input type="checkbox" class="form-control" style="width: 5%" id="married" name="married" <?php if($married == 1) { echo " checked "; } ?>>
      </div>
    </div>

   <div class="form-group">        
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-warning"><b><?php echo ucfirst($action); ?> Patient</b></button>
     </div>
   </div>
    
   <div class="col-sm-offset-2 col-sm-10"><a href="./view.php"><b>Return</b></a></div>
   <div class="panel panel-warning">   
      <input hidden type="text" name="action" value="<?= $action; ?>">
      <input hidden type="text" name="patientId" value="<?= $id; ?>">
    </div>
</div>

 </form>
 
 
</div>
</div>
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
</body>
</html>
