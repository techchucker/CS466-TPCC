<?php
  /*  Class ORDER maintains an array of item objects within a single order */
  class Order extends ArrayObject
  {

    public $warehouseID;
    public $districtID;
    public $customerID;
    public $items;
    public $orderID;
    private $itemArg = "";
    private $table = 'temp';

    # Function creates empty items array which will hold Item class objects
    public function __construct()
    {
      $items = array();
    }

    # Function adds Item Class objects to the Items Array
    public function addItem($item)
    {
      $this->items[] = $item;
    }

    # Function will place order adding each item to the database
    public function placeOrder($pdo)
    {
      $time = new Timer(); # Create timer object to begin timing transaction submission

      $time->startTimer(); # Start timer

      $this->orderID = 12;

      $this->itemArg = "";

      # Iterates through each item in the Order array list and creates String to send
      # via the SQL prepared statement
      foreach($this->items as $key => $i)
      {
        if($this->itemArg == "")
        {
          $this->itemArg .= $i->itemID . "," .$i->quantity;
        }
        else
        {
          $this->itemArg .= "|" .$i->itemID . "," .$i->quantity;
        }
      }

      # Place SQL order by calling stored procedure
      try {

        $sql = $pdo->prepare('CALL tpcc.placNewOrder(?,?,?,?)');

        $sql->bindParam(1, $this->warehouseID, PDO::PARAM_INT);
        $sql->bindParam(2, $this->districtID, PDO::PARAM_INT);
        $sql->bindParam(3, $this->customerID, PDO::PARAM_INT);
        $sql->bindParam(4, $this->itemArg, PDO::PARAM_STR, 500);

        $sql->execute();
        /*
        $sql = $pdo->prepare('CALL tpcc.sp_split(?)');

        $sql->bindParam(1, $this->itemArg, PDO::PARAM_STR, 500);

        $sql->execute();
        */

      } catch (PDOException $e) {
          die("Error occurred:" . $e->getMessage());
      }

      echo $this->itemArg;

      $time->stopTimer(); # Stop timer
      $duration = $time->calculateDuration(); # Calculate duration of transaction
      echo '<br>Total Transaction Duration: ', $duration; # Display duration to screen
    }

    # Function iterates through list of order items array and prints to screen
    public function diplayItems()
    {
      foreach($this->items as $i)
      {
        echo $i->displayItem();
      }
    }

    # Function writes the current count of order Item Class objects in the Order array
    public function lineItemCount()
    {
      echo 'Total items in order: ';
      echo count($this->items),'<br>';
    }
  }

  /*  Class ITEM is an individual line item of an order */
  class Item
  {
    public $itemID;
    public $quantity;

    public function __construct($id, $qty)
    {
      $this->itemID = $id;
      $this->quantity = $qty;
    }

    # Function sets the Item Class object Item ID value
    public function setItemID($id)
    {
        $this->itemID = $id;
    }

    # Function sets the Item Class object quantity value
    public function setQuantity($qty)
    {
      $this->quantity = $qty;
    }

    # Function returns Item Class Object ItemID value
    public function getItemID()
    {
        return $this->itemID;
    }

    # Function returns Item Class Object Quantity array_count_value
    public function getQuantity()
    {
      return $this->quantity;
    }

    # Function prints Item Class object info to the screen
    public function displayItem()
    {
      echo '<br>Item ID: ', $this->itemID,'<br>';
      echo 'Item Quantity: ', $this->quantity,'<br>';
    }
  }

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
