<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Intake Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body 
        {
            background-color: #161b22; 
            color: white;
            margin-right: 2%; 
            margin-left: 2%;
            margin-bottom:50px;
        }

        .wrapper 
        {
            display: grid;
            grid-template-columns: 180px 400px;
        }

        .label 
        {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        footer 
        {
            position: fixed;
            height: 120px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin-right: 2%; 
            margin-left: 2%;
        }

        .error 
        {
            color: red;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#"><b>PHP & MySQL</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="../Main/MainPage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="../Main/Assignment.php">Assignments</a>
            <a class="nav-item nav-link active" href="../Main/Resources.php">Resources</a>
            <a class="nav-item nav-link active" href="https://github.com/AxelSpencer/SE266_AxelF">GitHub</a>
            </div>
        </div>
    </nav>

    <h1>Patient Intake Form</h1>

    <?php
        $first_name = "";
        $last_name = "";
        $married = "";
        $birth_date = "";
        $ft = "";
        $inches = "";
        $weight = "";

        $patient = False;
        if (isset($_POST['storePatient']))
        {
            
            $error = "";
            $value = filter_input(INPUT_POST, 'first_name');
            if ($value == "")
            {
                $error .= "<li>*First name field cannot be empty*</li>";
            }
            else
            {
                $first_name = $value;
            }
            
            $value = filter_input(INPUT_POST, 'last_name');
            if ($value == "")
            {
                $error .= "<li>*Last name field cannot be empty*</li>";
            }
            else
            {
                $last_name = $value;
            }

            $value = filter_input(INPUT_POST, 'married');
            if (isset($_POST['married']))
            {
                $married = $value;
            }
            else
            {
                $error .= "<li>*Married bubble must be filled*</li>";
            }

            $value = filter_input(INPUT_POST, 'birth_date');
            if ($value == "")
            {
                $error .= "<li>*Birth Date field cannot be empty*</li>";
            }
            else
            {
                $birth_date = $value;
            }

            $value = filter_input(INPUT_POST, 'ft', FILTER_VALIDATE_FLOAT);
            if ($value == "")
            {
                $error .= "<li>*Feet field cannot be empty*</li>";
            }
            if ($value < 0 && $value > 9)
            {
                $error .= "<li>*Feet field must be reasonable*</li>";
            }
            else
            {
                $ft = $value;
            }

            $value = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_FLOAT);
            if ($value == "")
            {
                $error .= "<li>*Inches field cannot be empty*</li>";
            }
            if ($value < 0 && $value > 11)  
            {
                $error .= "<li>*Inches field must be reasonable*</li>";
            }
            else
            {
                $inches = $value;
            }

            $value = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
            if ($value == "")
            {
                $error .= "<li>*Weight field cannot be empty*</li>";
            }
            if ($value < 0 && $value > 999)  
            {
                $error .= "<li>*Weight field must be reasonable*</li>";
            }
            else
            {
                $weight = $value;
            }

            if ($error == "")
            {
                $patient = True;
            }
            else 
            {
                echo "<ul class='error'>$error</ul>";
            }
        }
    ?>

    <form name="patient" method="post" action="PatientIntakeForm.php">
        <div class="wrapper" 
            <?php
                echo "style='";
                if ($patient == FALSE){echo "display: show'";}
                else{echo "display: none'";}
            ?>
        >
            <div class="label"><label>First Name</label></div>
            <div><input type="text" name="first_name" <?="value='".$first_name."'"?>></div>

            <div class="label"><label>Last Name</label></div>
            <div><input type="text" name="last_name" <?="value='".$last_name."'"?>></div>

            <div class="label"><label>Married</label></div>
            <div>
                <input type="radio" name="married" value="yes" <?php if($married == "yes"){echo "checked";}?>>Yes   
                <input type="radio" name="married" value="no" <?php if($married == "no"){echo "checked";}?>>No 
            </div>

            <div class="label"><label>Birth Date</label></div>
            <div><input type="date" name="birth_date" <?="value='".$birth_date."'"?>></div>

            <div class="label"><label>Height</label></div>
            <div>
                Feet <input type="text" name="ft" <?="value='".$ft."'"?> style="width:40px;">
                Inches <input type="text" name="inches" <?="value='".$inches."'"?> style="width:40px;"> 
            </div>

            <div class="label"><label>Weight(lbs)</label></div>
            <div><input type="text" name="weight" <?="value='".$weight."'"?> style="width:40px;"></div>
            
            <div>&nbsp;</div>
            <div><input type="submit" name="storePatient" value="submit"></div>
        </div>
    </form>
    
    <?php
        echo "<ul class='";
        if ($patient == True)
        {
            echo "display: show'>";
        }
        else
        {
            echo "display: none'>";
        }

        if ($patient == True)
        {
            function age ($bdate) 
            {
                $date = new DateTime($bdate);
                $now = new DateTime();
                $interval = $now->diff($date);
                return $interval->y;
            }
             
            function bmi ($ft, $inch, $weight) 
            {
                return ($weight/2.20462) / ((($ft * 12 + $inch) * 0.0254) * (($ft * 12 + $inch) * 0.0254));
            }
             
            function bmiDescription ($bmi) 
            {
                if ($bmi < 18.5)
                {
                    return "Underweight";
                }

                else if ($bmi >= 18.5 && $bmi < 24.9)
                {
                    return "Normal";
                }

                else if ($bmi >= 24.9 && $bmi < 29.9)
                {
                    return "Overweight";
                }

                else if ($bmi >= 30)
                {
                    return "Obese";
                }
            }

            echo "<li><b>Name:</b> $first_name $last_name</li>";
            echo "<li><b>Marital Status:</b> "; 
            if ($married =="yes") 
            {
                echo "Married</li>";
            }
            else
            {
                echo "Single</li>";
            }
            echo "<li><b>Birth Date:</b> $birth_date</li>";
            echo "<li><b>Age:</b> " . age($birth_date) . "</li>";
            echo "<li><b>Height:</b> $ft''$inches'</li>";
            echo "<li><b>Weight:</b> $weight</li>";
            echo "<hr/>";
            echo "<b>BMI:</b> " . number_format(bmi($ft, $inches, $weight), 1, '.', ',') . " | " . bmiDescription(bmi($ft, $inches, $weight));
        }
    ?>
    </ul>

    <footer class="bg-danger text-center text-white">
            &nbsp;
            <p>&copy; 2022 | Axel Fernandes-Spencer</p>
        <?php       
            date_default_timezone_set("America/New_York");
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            $test = new DateTime($mod_date, new DateTimeZone('America/New_York'));
            echo "File last updated " . date_format($test, "F d Y h:i:s A");
        ?>
    </footer>
</body>
</html>