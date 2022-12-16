<?php
    include (__DIR__ . '/db.php');

    function getEmployees() 
    {
        global $db;

        $results = [];

        $stmt = $db->prepare("SELECT * FROM employees");

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return($results);
    }

    function addEmployee($fname, $lname, $phone, $email, $dep, $pos)
    {
        global $db;

        $stmt = $db->prepare("INSERT INTO employees SET fName = :fname, lName = :lname, phone = :phone, email = :email, dep = :dep, pos = :pos");

        $binds = array(
            ":fname" => $fname,
            ":lname" => $lname,
            ":phone" => $phone,
            ":email" => $email,
            ":dep" => $dep,
            ":pos" => $pos
        );

        if($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = 'Data Added';
        }
        return($results);
    }

    function updateEmployee($id, $fname, $lname, $phone, $email, $dep, $pos) 
    {
        global $db;

        $results = "";

        $stmt = $db->prepare("UPDATE employees SET fName = :fname, lName = :lname, phone = :phone, email = :email, dep = :dep, pos = :pos WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':phone', $phone);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':dep', $dep);
        $stmt->bindValue(':pos', $pos);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
 
    function deleteEmployee($id) 
    {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM employees WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

    function getEmployee($id) 
    {
        global $db;

        $results = [];
        $stmt = $db->prepare("SELECT * FROM employees WHERE id = :id");
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
        $stmt = $db->prepare("SELECT * FROM finalUsers WHERE username = :user AND password = :pass");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', sha1("final" . $pass));

        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = 'Login Successful';
        }

        return($results);
    }

    function searchEmployees($fname, $lname, $dep) 
    {
        global $db;

        $results = [];
        $where = "";

        if(strlen($fname) > 0)
        {  
            $where .= " AND fName LIKE :fname";
        }
        if(strlen($lname) > 0)
        {
            $where .= " AND lName LIKE :lname";
        }
        if(strlen($dep) > 0)
        {
            $where .= " AND dep LIKE :dep";
        }

        $stmt = $db->prepare("SELECT * FROM employees WHERE 0=0 " . $where);

        if(strlen($fname) > 0)
        {  
            $stmt->bindValue(':fname', "%" . $fname . "%");
        }
        if(strlen($lname) > 0)
        {
            $stmt->bindValue(':lname', "%" . $lname . "%");
        }
        if(strlen($dep) > 0)
        {
            $stmt->bindValue(':dep', "%" . $dep . "%");
        }
        
        if($stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return($results);
    }
?>