<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Task G</title>
</head>
<body>

    <?php

    //fizzBuzz function takes in a number
    function fizzBuzz($num)
    {
        //checks if the number is a multiple of 2 and 3
        if ($num % 2 == 0 && $num % 3 == 0)
        {
            //returns "fizz buzz"
            return "fizz buzz";
        }

        //checks if the number is a multiple of 2
        else if ($num % 2 === 0)
        {
            //returns "fizz"
            return "fizz";
        }

        //checks if the number is a multiple of 3
        else if ($num % 3 == 0)
        {
            //returns "buzz"
            return "buzz";
        }

        //runs else if condition arent met
        else 
        {
            //returns the number
            return $num;
        }
    }

    //for loop that generates numbers and ends at 100
    for ($i = 1; $i <= 100; $i++) 
    {
        //prints the returned value of fizzBuzz onto the page based on the number generated
        echo "" . fizzBuzz($i) . "<br>";
    }

    ?>

</body>
</html>