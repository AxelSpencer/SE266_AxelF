
<?php

    include_once ("checking.php");
    include_once ("savings.php");
    
    if (isset($_POST['withdrawChecking'])) 
    {
        $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
        $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
        $checking->withdrawal($_POST['checkingWithdrawAmount']);
    }
    else if (isset($_POST['depositChecking'])) 
    {
        $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
        $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
        $checking->deposit($_POST['checkingDepositAmount']);
    }
    else if (isset($_POST['withdrawSavings'])) 
    {
        $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
        $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
        $savings->withdrawal($_POST['savingsWithdrawAmount']);
    } 
    else if (isset($_POST['depositSavings'])) 
    {
        $savings = new SavingsAccount($_POST['savingsAccountId'], $_POST['savingsBalance'], $_POST['savingsDate']);
        $checking = new CheckingAccount($_POST['checkingAccountId'], $_POST['checkingBalance'], $_POST['checkingDate']);
        $savings->deposit($_POST['savingsDepositAmount']);
    }
    else 
    {
        $savings = new SavingsAccount('S123', 5000, '03-20-2020');
        $checking = new CheckingAccount ('C123', 1000, '12-20-2019');
    }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        body 
        {
            background-color: #161b22; 
            color: white;
            margin-right: 2%; 
            margin-left: 2%;
            margin-bottom:50px;
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

       .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 80px;}
        .error {color: red;}
        .accountInner {
            margin-left:10px;margin-top:10px;
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
            <a class="nav-item nav-link active" href="../../Main/MainPage.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="../../Main/Assignment.php">Assignments</a>
            <a class="nav-item nav-link active" href="../../Main/Resources.php">Resources</a>
            <a class="nav-item nav-link active" href="https://github.com/AxelSpencer/SE266_AxelF">GitHub</a>
            </div>
        </div>
    </nav>

    <form method="post">
       
        <input type="hidden" name="checkingAccountId" value='<?= $checking->getAccountId()?>' />
        <input type="hidden" name="checkingDate" value='<?= $checking->getStartDate()?>' />
        <input type="hidden" name="checkingBalance" value='<?= $checking->getBalance()?>' />
        <input type="hidden" name="savingsAccountId" value='<?= $savings->getAccountId()?>' />
        <input type="hidden" name="savingsDate" value='<?= $savings->getStartDate()?>' />
        <input type="hidden" name="savingsBalance" value='<?= $savings->getBalance()?>' />
        
    <h1>ATM</h1>
        <div class="wrapper">
            <div class="account">
                <?php 
                    echo $checking->getAccountDetails();
                ?>
                <div class="accountInner">
                    <input type="text" name="checkingWithdrawAmount" value="" />
                    <input type="submit" name="withdrawChecking" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="checkingDepositAmount" value="" />
                    <input type="submit" name="depositChecking" value="Deposit" /><br />
                </div>
            </div>

            <div class="account">
                <?php
                    echo $savings->getAccountDetails();
                ?>
                <div class="accountInner">
                    <input type="text" name="savingsWithdrawAmount" value="" />
                    <input type="submit" name="withdrawSavings" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="savingsDepositAmount" value="" />
                    <input type="submit" name="depositSavings" value="Deposit" /><br />
                </div>
            </div>
        </div>
    </form>

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
