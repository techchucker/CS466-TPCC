<?php
  /* Class Timer object stores benchmark timer information and provides function to calculate duration */
  class Timer
  {
    private $startTime;
    private $endTime;
    private $duration;

    # Constructor function initiates all timer variables to null
    public function __construct()
    {
      $this->startTime = Null;
      $this->endTime = Null;
      $this->duration = Null;
    }

    # Function sets startTime variable to start timing
    public function startTimer()
    {
      $this->startTime = microtime(true);
    }

    # Function sets endTime variable to stop timing
    public function stopTimer()
    {
      $this->endTime = microtime(true);
    }

    # Function calculates difference of endTime to startTime and returns difference in microseconds
    public function calculateDuration()
    {
      $this->duration = $this->endTime - $this->startTime;

      return $this->duration;
    }

    # Function returns startTime value of Timer Object
    public function getStartTime()
    {
      return $this->startTime;
    }

    # Function returns endTime value of Timer Object
    public function getEndTime()
    {
      return $this->endTime;
    }

    # Function returns duration value of Timer Ojbect
    public function getDuration()
    {
      return $this->duration;
    }
  }
?>
