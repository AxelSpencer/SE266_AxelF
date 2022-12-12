<?php
   include_once __DIR__ . "/functions.php";
   include_once __DIR__ . "/model.php";

   session_start();

    if(getuser($_SESSION['username'], $_SESSION['password']) != "Login Successful")
    {
        header('Location: login.php');
    }
      
    if (isset ($_FILES['fileToUpload'])) 
    {
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    }

    include_once __DIR__ . "/header.php"; 

?>  
    <h2><b>Upload File</ b></h2>
    <p>
        Please specify a file to upload and then be patient as the upload may take a while to process.
    </p>

    <form action="schoolUpload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload">
    </form>

    </br>
    <div><a href="./schoolSearch.php"><b>Return</b></a></div>

<?php
    include_once __DIR__ . "/footer.php";

    if (isset ($_FILES['fileToUpload'])) 
    {
        deleteSchools();
        $file = fopen ($tmp_name, 'rb');
        while (!feof($file)) 
        {
            $school = fgetcsv($file);
            addSchool($school[0], $school[1], $school[2]);
            header('Location: schoolSearch.php');
        }
    }
?>