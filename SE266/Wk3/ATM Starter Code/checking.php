<?php
 
 	include_once ("account.php");
 
    class CheckingAccount extends Account 
    {
        const OVERDRAW_LIMIT = -200;

        public function withdrawal($amount) 
        {
            if ($amount == "" || ($this->balance - $amount) < -200)
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
            $accountDetails = "<h2>Checking Account</h2>";
            $accountDetails .= parent::getAccountDetails();
            
            return $accountDetails;
        }
    }   
?>
