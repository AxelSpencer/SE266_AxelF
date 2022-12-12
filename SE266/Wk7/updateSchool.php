<?php
  include __DIR__ . '/model.php';
  include __DIR__ . '/functions.php';
  
  if (isset($_GET['action'])) 
  {
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'schoolId');
    if ($action == "update") 
    {
      $row = getSchool($id);
      $name = $row['schoolName'];
      $city = $row['schoolCity'];
      $state = $row['schoolState'];
    } 
    else if ($action == "delete") 
    {
      $row = getSchool($id);
      $name = $row['schoolName'];
      $city = $row['schoolCity'];
      $state = $row['schoolState'];
    } 
    else 
    {
      $name = "";
      $city = "";
      $state = "";
    }
  }

  if (isset($_POST['action'])) 
  {
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'schoolId');
    $name = filter_input(INPUT_POST, 'name');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');

    if ($action == "add") 
    {
      $result = addSchool($name, $city, $state);
      header('Location: schoolSearch.php');
    } 
    else if ($action == "update") 
    {
      $result = updateSchool($id, $name, $city, $state);
      header('Location: schoolSearch.php');
    }
    else if ($action == "delete") 
    {
      $result = deleteSchool($id);;
      header('Location: schoolSearch.php');
    }
    
  }

  include_once __DIR__ . "/header.php";
?>

<p></p>
<form class="form-horizontal" action="updateSchool.php" method="post">
  <div class="panel panel-primary">
    <div class="panel-heading"><h4><?= ucfirst($action) ?> Patient</h4></div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="team name">School Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="Enter school name" name="name" value='<?= $name ?>'>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="team name">School City:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="city" placeholder="Enter school city" name="city" value='<?= $city ?>'>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="team name">School State:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="state" placeholder="Enter school state" name="state" value='<?= $state ?>'></div>
        </div>
      </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-warning"><b><?= ucfirst($action) ?> School</b></button>
      </div>
    </div>
      
    <div class="col-sm-offset-2 col-sm-10"><a href="./schoolSearch.php"><b>Return</b></a></div>
    <div class="panel panel-warning">   
      <input hidden type="text" name="action" value="<?= $action ?>">
      <input hidden type="text" name="schoolId" value="<?= $id ?>">
    </div>
  </div>
</form>

<?php
  include_once __DIR__ . "/footer.php";
?>
