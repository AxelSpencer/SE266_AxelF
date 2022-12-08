<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task F</title>
</head>
<body>

    <?php

    //list of animals
    $animals = ['Cat', 'Dog', 'Lion', 'Tiger', 'Zebra'];

    //function that takes an array and var dumps data
    function dd($data)
    {
        //pre tag for readability
        echo '<pre>';

        //var dumps array
        die(var_dump($data));

        echo '</pre>';
    }

    //call the dd function, and send the animals array
    dd($animals); 
    ?>

</body>
</html>