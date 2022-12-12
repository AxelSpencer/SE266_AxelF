<?php
    include_once __DIR__ . "/functions.php";
    include_once __DIR__ . "/model.php";

    $schools = getSchools();

    session_start();

    if(getuser($_SESSION['username'], $_SESSION['password']) != "Login Successful")
    {
        header('Location: login.php');
    }
    
    if(isPostRequest())
    {
        $name = filter_input(INPUT_POST, 'name');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $schools = searchSchools($name, $city, $state);
    }

    include_once __DIR__ . "/header.php";
?>
    <button class="btn btn-warning"><a style="color:black" href="logoff.php"><b>Logout</b></a></button>

    <h2><b>Search Schools</b></h2>
    <form action="schoolSearch.php" method="post" style="text-align: center;">
        Name: <input type="text" name="name" placeholder="Enter name">
        City: <input type="text" name="city" placeholder="Enter city">
        State: <input type="text" name="state" placeholder="Enter state">

        <button type="submit" class="btn btn-warning"><b>Search</b></button>

    </form>
    
    <button class="btn btn-danger"><a style="color:white" href="schoolUpload.php"><b>Upload File [+]</b></a></button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>School Name</th>
                <th>School City</th>
                <th>School State</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($schools as $row): ?>
            <tr>
                <form action="schoolSearch.php" method="post">
                    
                    <input type="hidden" name="PatientId" value='<?= $row['id'] ?>' />
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['schoolName'] ?></td>
                    <td><?= $row['schoolCity'] ?></td>
                    <td><?= $row['schoolState'] ?></td>
                    
                </form>
            </tr>
            <?php endforeach; ?>

            </tbody>
    </table>


    <?php
        include_once __DIR__ . "/footer.php";
    ?>