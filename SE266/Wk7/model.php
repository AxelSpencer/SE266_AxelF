<?php
    include (__DIR__ . '/db.php');

    function getSchools() 
    {
        global $db;

        $results = [];

        $stmt = $db->prepare("SELECT * FROM schools");

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addSchool($name, $city, $state)
    {
        global $db;

        $stmt = $db->prepare("INSERT INTO schools SET schoolName = :schoolName, schoolCity = :schoolCity, schoolState = :schoolState");

        $binds = array(
            ":schoolName" => $name,
            ":schoolCity" => $city,
            ":schoolState" => $state
        );

        if($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = 'Data Added';
        }
        return($results);
    }

    function updateSchool($id, $name, $city, $state) 
    {
        global $db;

        $results = "";

        $stmt = $db->prepare("UPDATE schools SET schoolName = :schoolName, schoolCity = :schoolCity, schoolState = :schoolState WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':schoolName', $name);
        $stmt->bindValue(':schoolCity', $city);
        $stmt->bindValue(':schoolState', $state);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
 
    function deleteSchools() 
    {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM schools");
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getSchool($id) 
    {
        global $db;

        $results = [];
        $stmt = $db->prepare("SELECT * FROM schools WHERE id = :id");
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
        $stmt = $db->prepare("SELECT * FROM users WHERE userName = :user AND userPassword = :pass");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', sha1("school-salt" . $pass));

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = 'Login Successful';
        }
        else{
            $results = 'Login Failed';
        }

        return($results);
    }

    function searchSchools($schoolName, $schoolCity, $schoolState) 
    {
        global $db;

        $results = [];
        $where = "";

        if(strlen($schoolName) > 0)
        {  
            $where .= " AND schoolName LIKE :schoolName";
        }
        if(strlen($schoolCity) > 0)
        {
            $where .= " AND schoolCity LIKE :schoolCity";
        }
        if(strlen($schoolState) > 0)
        {
            $where .= " AND schoolState LIKE :schoolState";
        }

        $stmt = $db->prepare("SELECT * FROM schools WHERE 0=0 " . $where);

        if(strlen($schoolName) > 0)
        {  
            $stmt->bindValue(':schoolName', "%" . $schoolName . "%");
        }
        if(strlen($schoolCity) > 0)
        {
            $stmt->bindValue(':schoolCity', "%" . $schoolCity . "%");
        }
        if(strlen($schoolState) > 0)
        {
            $stmt->bindValue(':schoolState', "%" . $schoolState . "%");
        }
        
        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }
?>