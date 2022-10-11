<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task C</title>
</head>
<body>
    <ul>

        <?php

            //List of animals
            $animals = ['Cat', 'Dog', 'Lion', 'Tiger', 'Zebra'];

            //loop through list of animals 
            foreach ($animals as $animal)
            {
                //print individual name of animals 
                echo "<li>$animal</li>";
            }

        ?>
        
    </ul>

</body>
</html>