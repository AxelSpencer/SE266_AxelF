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
        <?php foreach ($task as $key => $val) :?>
            <li><b><?= $key; ?>:</b> <?= $val; ?></li>
        <?php endforeach; ?>
    </ul>

</body>
</html>