<?php
  session_start();

  include __DIR__ . '/model.php';
  include __DIR__ . '/functions.php';
  
  if (isset($_GET['action'])) 
  {
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'employeeId');
    if ($action == "update") 
    {
      $row = getEmployee($id);
      $fname = $row['fName'];
      $lname = $row['lName'];
      $phone = $row['phone'];
      $email = $row['email'];
      $dep = $row['dep'];
      $pos = $row['pos'];
    } 
    else if ($action == "delete") 
    {
      $row = getEmployee($id);
      $fname = $row['fName'];
      $lname = $row['lName'];
      $phone = $row['phone'];
      $email = $row['email'];
      $dep = $row['dep'];
      $pos = $row['pos'];
    } 
    else 
    {
      $fname = '';
      $lname = '';
      $phone = '';
      $email = '';
      $dep = '';
      $pos = '';
    }
  }

  if (isset($_POST['action'])) 
  {
    $action = filter_input(INPUT_POST, 'action');
    $id = filter_input(INPUT_POST, 'employeeId');
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $pos = filter_input(INPUT_POST, 'pos');
    $dep = filter_input(INPUT_POST, 'dep');

    if ($action == "add") 
    {
      $result = addEmployee($fname, $lname, $phone, $email, $dep, $pos);
      header('Location: search.php');
    } 
    else if ($action == "update") 
    {
      $result = updateEmployee($id, $fname, $lname, $phone, $email, $dep, $pos);
      header('Location: search.php');
    }
    else if ($action == "delete") 
    {
      $result = deleteEmployee($id);
      header('Location: search.php');
    }
    
  }

  include_once __DIR__ . "/header.php";
?>

<form class="form-horizontal" action="edit.php" method="post"> 

  <div class="panel panel-primary">

    <h4 class="panel-heading"><?= ucfirst($action) ?> Employee</h4>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" value='<?= $fname ?>'>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" value='<?= $lname ?>'>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Phone Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" placeholder="Enter phone number (xxx-xxx-xxxx)" name="phone" value='<?= $phone ?>'>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="team name">Email Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter email address (xxx@roadrunner.com)" name="email" value='<?= $email ?>'>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleDataList" class="form-label col-sm-2">Department</label>
      <div class="col-sm-10">
        <input class="form-control" list="departments" id="dep" name= "dep" placeholder="Enter department" value='<?= $dep ?>'>
        <datalist id="departments">
          <option value="MIS">
          <option value="Life">
          <option value="Homeowners">
          <option value="Transportation">
          <option value="Investments">
        </datalist>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleDataList" class="form-label col-sm-2">Position</label>
      <div class="col-sm-10">
        <input class="form-control" list="position" id="pos" name= "pos" placeholder="Enter position" value='<?= $pos ?>'>
        <datalist id="position">
          <option value="Sales">
          <option value="Tech Support">
        </datalist>
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-warning"><b><?php echo ucfirst($action)?> Employee</b></button>
      </div>
    </div>
      
    <div class="col-sm-offset-2 col-sm-10"><a href="./search.php"><b>Return</b></a></div>
    <div class="panel panel-warning">   
        <input hidden type="text" name="action" value="<?= $action ?>">
        <input hidden type="text" name="employeeId" value="<?= $id ?>">
    </div>

  </div>

</form>

<?php
  include_once __DIR__ . "/footer.php";
?>
