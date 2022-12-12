<?php
    include (__DIR__ . '/db.php');

    function getPatients() 
    {
        global $db;

        $results = [];

        $stmt = $db->prepare("SELECT * FROM patients");

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addPatient($fname, $lname, $married, $bdate)
    {
        global $db;

        $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :patientFirstName, patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate = :patientBirthDate");

        $binds = array(
            ":patientFirstName" => $fname,
            ":patientLastName" => $lname,
            ":patientMarried" => $married,
            ":patientBirthDate" => $bdate
        );

        if($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = 'Data Added';
        }
        return($results);
    }
    function updatePatient ($id, $fname, $lname, $married, $bdate) 
    {
        global $db;

        $results = "";

        $stmt = $db->prepare("UPDATE patients SET patientFirstName = :patientFirstName, patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate = :patientBirthDate WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':patientFirstName', $fname);
        $stmt->bindValue(':patientLastName', $lname);
        $stmt->bindValue(':patientMarried', $married);
        $stmt->bindValue(':patientBirthDate', $bdate);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
 
    function deletePatient($id) 
    {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getPatient($id) 
    {
        global $db;

        $results = [];
        $stmt = $db->prepare("SELECT * FROM patients WHERE id = :id");
        $stmt->bindValue(':id', $id);

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return($results);
    }

    function getuser($user, $pass) 
    {
        global $db;

        $results = [];
        $stmt = $db->prepare("SELECT * FROM users WHERE userName = :user AND userPassword = sha1(:pass)");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass);

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = 'Login Successful';
        }

        return($results);
    }

    function searchPatients($fname, $lname, $married) 
    {
        global $db;

        $results = [];
        $where = "";

        if(strlen($fname) > 0)
        {  
            $where .= " AND patientFirstName LIKE :fname";
        }
        if(strlen($lname) > 0)
        {
            $where .= " AND patientLastName LIKE :lname";
        }
        if(strlen($married) > 0)
        {
            $where .= " AND patientMarried LIKE :married";
        }

        $stmt = $db->prepare("SELECT * FROM patients WHERE 0=0 " . $where);

        if(strlen($fname) > 0)
        {  
            $stmt->bindValue(':fname', "%" . $fname . "%");
        }
        if(strlen($lname) > 0)
        {
            $stmt->bindValue(':lname', "%" . $lname . "%");
        }
        if(strlen($married) > 0)
        {
            $stmt->bindValue(':married', $married);
        }
        
        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }
?>