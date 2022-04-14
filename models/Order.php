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
/*
  public function __construct()
  {
    $items = array();
  }
  */

  public function __construct($wid, $did, $cid)
  {
    $items = array();
    $this->warehouseID = $wid;
    $this->districtID = $did;
    $this->customerID = $cid;
  }

  # Function compiles order items into a comma and pipe delimited
  #   string which is returned for use to send to SQL server
  public function compileItems()
  {
    $compiledItems = '';
    $result = '';

      foreach($this->items as $i)
      {
        #echo $i->displayItem();
        if($compiledItems == '')
        {
          $compiledItems .= $i->itemID.','.$i->quantity;
        }
        else
        {
          $compiledItems .= '|'.$i->itemID.','.$i->quantity;
        }
      }

      $result = "'" . $compiledItems . "'";
      #$result = $compiledItems;
      return $result;
  }

  # Function adds Item Class objects to the Items Array
  public function addItem($item)
  {
    $this->items[] = $item;
  }

  # Function will place order adding each item to the database
  public function placeOrder($pdo)
  {
    #$time = new Timer(); # Create timer object to begin timing transaction submission

    #$time->startTimer(); # Start timer

    #$this->orderID = 12;

    #$this->itemArg = "";

    # Iterates through each item in the Order array list and creates String to send
    # via the SQL prepared statement
    /*
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
    */

    # Place SQL order by calling stored procedure
    try {

      echo 'Starting SQL Execution <br>';

      $itemArg = $this->compileItems();

      echo $itemArg;

      $sql = $pdo->prepare('CALL tpcc.placeNewOrder(?,?,?,?)');

      $sql->bindParam(1, $this->warehouseID, PDO::PARAM_INT);
      $sql->bindParam(2, $this->districtID, PDO::PARAM_INT);
      $sql->bindParam(3, $this->customerID, PDO::PARAM_INT);
      $sql->bindParam(4, $this->itemArg, PDO::PARAM_STR);

      $sql->execute();

      #echo $return_value;

      echo '<br>Completing SQL Execution <br>';

      /*
      $sql = $pdo->prepare('CALL tpcc.sp_split(?)');

      $sql->bindParam(1, $this->itemArg, PDO::PARAM_STR, 500);

      $sql->execute();
      */

    } catch (PDOException $e) {
        die("Error occurred:" . $e->getMessage());
    }

    #echo $this->itemArg;

    #$time->stopTimer(); # Stop timer
    #$duration = $time->calculateDuration(); # Calculate duration of transaction
    #echo '<br>Total Transaction Duration: ', $duration; # Display duration to screen

    #return $time;
  }

  # Function displays basic order information (warehouse, district, & customer IDs)
  public function displayInfo()
  {
    echo $this->warehouseID, '<br>';
    echo $this->districtID, '<br>';
    echo $this->customerID, '<br>';
  }

  # Function iterates through list of order items array and prints to screen
  public function displayItems()
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
?>
