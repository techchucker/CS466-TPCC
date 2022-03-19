<?php
  /*  Class ORDER maintains an array of item objects within a single order */
  class Order extends ArrayObject
  {

    public $items;

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
    public function placeOrder()
    {
      # Iterates through each item in the Order array list
      foreach($this->items as $key => $i)
      {
        ######### ADD SQL CODE HERE ########
        echo 'Placing order of item #: ', $key + 1,'<br>';
      }
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
    private $itemID;
    private $quantity;

    public function __construct($id, $qty)
    {
      $this->itemID = $id;
      $this->quantity = $qty;
    }

    public function displayItem()
    {
      echo '<br>Item ID: ', $this->itemID,'<br>';
      echo 'Item Quantity: ', $this->quantity,'<br>';
    }
  }
?>
