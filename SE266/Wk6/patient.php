<?php

class Patient
{
    private $id;
    private $fname;
    private $lname;
    private $married;
    private $bdate;

    public function setPatientId($theId)
    {
        $this->id = $theId;
    }

    public function setPatientFName($theFName)
    {
        $this->fname = $theFName;
    }

    public function setPatientLName($theLName)
    {
        $this->lname = $theLName;
    }

    public function setPatientMarried($theMarried)
    {
        $this->married = $theMarried;
    }

    public function setPatientBDate($theBDate)
    {
        $this->bdate = $theBDate;
    }


    public function getPatientId()
    {
        return $this->id;
    }

    public function getPatientFName()
    {
        return $this->fname;
    }

    public function getPatientLName()
    {
        return $this->lname;
    }

    public function getPatientMarried()
    {
        return $this->married;
    }

    public function getPatientBDate()
    {
        return $this->bdate;
    }

}

?>