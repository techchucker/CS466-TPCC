<?php
  include("config.php");
  include("classes.php");
  session_start();
  echo 'Session ID: ';
  echo session_id(),'<br>';
?>
<html>
  <?php

    $item1 = new Item('6', '300');
    $item2 = new Item('3', '4');
    $item3 = new Item('7', '20');
    $item4 = new Item('25', '16');
    $item5 = new Item('100', '1');
    $item6 = new Item('100', '1');
    $item7 = new Item('100', '1');
    $item8 = new Item('100', '1');
    $item9 = new Item('100', '1');
    $item10 = new Item('100', '1');
    $item11 = new Item('100', '1');
    $item12 = new Item('100', '1');
    $item13 = new Item('100', '1');
    $item14 = new Item('100', '1');
    $item15 = new Item('100', '1');

    $order1 = new Order();

    $order1->addItem($item1);
    $order1->addItem($item2);
    $order1->addItem($item3);
    $order1->addItem($item4);
    $order1->addItem($item5);
    $order1->addItem($item6);
    $order1->addItem($item7);
    $order1->addItem($item8);
    $order1->addItem($item9);
    $order1->addItem($item10);
    $order1->addItem($item11);
    $order1->addItem($item12);
    $order1->addItem($item13);
    $order1->addItem($item14);
    $order1->addItem($item15);


    $order1->diplayItems();
    $order1->lineItemCount();
    $order1->placeOrder();

  ?>
</html>
