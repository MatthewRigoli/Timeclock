<?php
class Timeclock {  
     
     public function __construct(){     
         $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
     }
      
  
     private $clockInTime = 0;
     private $clockOutTime = 0;
     private $clockedIn = false;
     private $clockedOut = true;
     private $outHour = 0;
     private $inHour = 0;
     private $outMinute = 0;
     private $inMinute = 0;
     private $outDay = 0;
     private $inDay = 0;
     private $hoursWorked = 0;
     private $minutesWorked = 0;
      
 
     public function clockIn() {
         if($this->clockedIn == true ){
            print "<script type='text/javascript'>alert(\"You are already clocked in\");</script>";
         }
         else {
             $this->clockedIn = true;
             $this->clockedOut = false;
             $this->clockInTime = date("h:i a m-d-Y");

             print "<script type='text/javascript'>alert(\"You clocked in at: $this->clockInTime\");</script>";
         }
     }

     public function clockOut() {
        if($this->clockedOut == true ){
           print "<script type='text/javascript'>alert(\"You are already clocked out\");</script>";
        }
        else {
            $this->clockedIn = false;
            $this->clockedOut = true;
            $this->clockOutTime = date("h:i m-d-Y");

            print "<script type='text/javascript'>alert(\"You clocked out at: $this->clockOutTime\");</script>";
        }
    }
    public function calculateWorkTime(){
        if ($this->clockedIn == true && $this->clockedOut == false){
            $this->inDay = date("d");
            $this->inHour = date("H");
            $this->inMinute = date("i");
        }
        else if($this->clockedIn == false  && $this->clockedOut == true){
            $this->outDay = date("d");
            $this->outHour = date("H");
            $this->outMinute = date("i");

            if($this->inDay == $this->outDay){
                $this->hoursWorked = $this->outHour - $this->inHour;
                $this->minutesWorked = $this->outMinute - $this->inMinute;
            }
            else{
                $numberOfDays = $this->outDay - $this->inDay;
                print $numberOfDays;
                $this->hoursWorked = ((24*$numberOfDays)-$this->inHour) + $this->outHour;
                $this->minutesWorked = $this->outMinute - $this->inMinute;
            }
            print "<script type='text/javascript'>alert(\"You worked: $this->hoursWorked hours and $this->minutesWorked minutes\");</script>";
        }

    }
 }