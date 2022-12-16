<?php 
    session_start();

    include __DIR__ . '/model.php';
    include __DIR__ . '/functions.php';

    if(getuser($_SESSION['username'], $_SESSION['password']) != "Login Successful")
    {
        header('Location: login.php');
    }

    $employees = getEmployees();
    
    if(isPostRequest())
    {
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $dep = filter_input(INPUT_POST, 'dep');
        $employees = searchEmployees($fname, $lname, $dep);
    }
    
    include_once __DIR__ . "/header.php";
?>

<h1><b>Patients</b></h1>
</br>

<form action="search.php" method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
        <label for="inputEmail4">First Name</label>
        <input type="text" name="fname" placeholder="Enter first name" class="form-control">
        </div>
        <div class="form-group col-md-3">
        <label for="inputPassword4">Last Name</label>
        <input type="text" name="lname" placeholder="Enter last name" class="form-control">
        </div>
        <div class="form-group col-md-3">
        <label for="inputPassword4">Department</label>
        <input type="text" name="dep" placeholder="Enter department" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label style="color: #0D1117"for="inputPassword4">-</label>
            <button type="submit" class="btn btn-warning form-control"><b>Search</b></button>
        </div>
    </div>
</form>

</br>
<button class="btn btn-primary"><a style="color:white" href="edit.php?action=add"><b>Add Employee [+]</b></a></button>
<button class="btn btn-primary"><a style="color:white" href="upload.php"><b>Add Employees [++]</b></a></button>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Department</th>
            <th>Position</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($employees as $row): ?>
        <tr>
            <form action="view.php" method="post">
                
                <input type="hidden" name="PatientId" value='<?= $row['id'] ?>' />
                <td><?= $row['id'] ?></td>
                <td><?= $row['fName'] ?></td>
                <td><?= $row['lName'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['dep'] ?></td>
                <td><?= $row['pos'] ?></td>
                <td><a href='edit.php?action=update&employeeId=<?= $row['id'] ?>'><span class="material-symbols-outlined">edit</span></a></td>
                <td><a href='edit.php?action=delete&employeeId=<?= $row['id'] ?>'><span class="material-symbols-outlined">delete</span></a></td>
            </form>
        </tr>
        <?php endforeach; ?>

    </tbody>
<?php
    include_once __DIR__ . "/footer.php";
?>