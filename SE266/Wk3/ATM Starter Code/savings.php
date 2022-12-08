<?php

    include_once("account.php");
 
    class SavingsAccount extends Account 
    {
        public function withdrawal($amount) 
        {
            if ($amount == "" || $amount > $this->balance)
            {
                return $this->balance;
            }
            else
            {
                return $this->balance -= $amount;
            }          
        }

        public function getAccountDetails() 
        {
            $accountDetails = "<h2>Savings Account</h2>";
            $accountDetails .= parent::getAccountDetails();
            
            return $accountDetails;
        }    
    }   
?>
