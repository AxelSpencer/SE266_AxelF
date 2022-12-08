<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task E</title>
</head>
<body>

<?php

//Associative list of tasks
$task = [
    "Title" => "Php homework",
    "Due" => "10/10/2022",
    "Assigned_to" => "Axel",
    "Completed" => false,
    "Late" => true
];

?>

<ul>
    <li>
        <!--Displays Title from tasks-->
        <b>Title: </b> <?= $task['Title']; ?>
    </li>

    <li>
        <!--Displays Due date from tasks-->
        <b>Due: </b> <?= $task['Due']; ?>
    </li>

    <li>
        <!--Displays person assigned to from tasks-->
        <b>Assigned to: </b> <?= $task['Assigned_to']; ?>
    </li>

    <li>
        <!--Displays completion from tasks-->
        <b>Completed: </b> 
        <?php
        //runs if true
        if ($task['Completed'])
        {
            //diplays checkmark
            echo '&#9989;';
        }
        //runs if false
        else
        {
            //displays cross
            echo '&#10062;';
        }

        ?>
    </li>

    <li>
        <!--Displays lateness from tasks-->
        <b>Late: </b> 
        <?php
        //runs if true
        if ($task['Late'])
        {
            //diplays checkmark
            echo '&#9989;';
        }
        //runs if false
        else
        {
            //diplays cross
            echo '&#10062;';
        }

        ?>
    </li>
</ul> 

</body>
</html>