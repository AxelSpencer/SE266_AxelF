<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task D</title>
</head>
<body>

    <?php

    $task = [
        "Title" => "Php homework",
        "Due" => "10/10/2022",
        "Assigned to" => "Axel",
        "Completed" => "No"
    ];

    ?>
    
    <ul>
        <!--Runs through a foreach loop-->
        <?php foreach ($task as $key => $val) :?>
            <!--Prints both the key and value on to the html page with appropriate format-->
            <li><b><?= $key; ?>:</b> <?= $val; ?></li>
            <!--Ends foreach loop-->
        <?php endforeach; ?>
    </ul>

</body>
</html>