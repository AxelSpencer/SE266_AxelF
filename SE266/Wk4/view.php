<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients | Main </title>
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
</style>
</head>
<body>
    <?php 
        include __DIR__ . '/model.php';
        include __DIR__ . '/functions.php';
        $patients = getPatients();
    ?>

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

    <h1><b>Patients</b></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Married</th>
                <th>Date of Birth</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($patients as $row): ?>
            <tr>
                <form action="view.php" method="post">
                    
                    <input type="hidden" name="PatientId" value='<?= $row['id'] ?>' />
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['patientFirstName'] ?></td>
                    <td><?= $row['patientLastName'] ?></td>
                    <td><?php 
                        if($row['patientMarried']== 0)
                        {
                            echo "No";
                        }
                        else
                        {
                            echo "Yes";
                        }
                    ?></td>
                    <td><?= $row['patientBirthDate'] ?></td>
                    <td><a href='updatePatient.php?action=update&patientId=<?= $row['id'] ?>'><span class="material-symbols-outlined">edit</span></a></td>
                    <td><a href='updatePatient.php?action=delete&patientId=<?= $row['id'] ?>'><span class="material-symbols-outlined">delete</span></a></td>
                </form>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </br>
            <button class="btn btn-danger"><a style="color:white" href="updatePatient.php?action=add"><b>Add Patient [+]</b></a></button>
    </table>

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