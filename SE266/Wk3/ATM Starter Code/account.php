<?php
    abstract class Account 
    {
        protected $accountId;
        protected $balance;
        protected $startDate;
        
        public function __construct ($id, $bal, $startDt) 
        {
           $this->accountId = $id;
           $this->balance = $bal;
           $this->startDate = $startDt;
        }
        
        public function deposit ($amount) 
        {
            if ($amount == "")
            {
                return $this->balance;
            }
            else
            {
                return $this->balance += $amount;
            }
        }

        abstract public function withdrawal($amount);
        
        public function getStartDate() 
        {
            return $this->startDate;
        }

        public function getBalance() 
        {
            return $this->balance;
        }

        public function getAccountId() 
        {
            return $this->accountId;
        }

        protected function getAccountDetails()
        {
            $str = "<ul>";
            $str .= "<li>Acount ID: ".$this->getAccountId()."</li>";
            $str .= "<li>Balance: ".$this->getBalance()."</li>";
            $str .= "<li>Account Opened: ".$this->getStartDate()."</li>";
            $str .= "</ul>";
            return $str;
        }
        
    }

?>
