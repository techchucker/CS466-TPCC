<?php
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
?>
