<?php
  include("config.php");
  #include("classes.php");

  foreach (glob("models/*.php") as $filename)
  {
    include_once($filename);
  }

  session_start();
  echo 'Session ID: ';
  echo session_id(),'<br>';

?>
<html>
  <head>
    <title>Page Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS Reference-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!--Website Style Sheet Reference-->
    <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
    <!--  Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

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

      # Setting warehouse, district, and customer id for order
      $order1->warehouseID = 12;
      $order1->districtID = 24;
      $order1->customerID = 7;

      $order1->diplayItems();
      $order1->lineItemCount();
      #$order1->placeOrder($pdo);

      $id = $item2->getItemID();
      $qty = $item2->getQuantity();
      echo '<br>Test of getItemID() function: ', $id;
      echo '<br>Test of getQuantity() function: ', $qty;

      #$date = date("Y");
      #echo $date;

      $startTime = new DateTime();
      #sleep(5);
      $endTime = new DateTime();
      echo '<br>', $startTime->getTimestamp();
      echo '<br>', $endTime->getTimestamp();

      /*
      $startMicro = microtime(true);
      sleep(5);
      $endMicro = microtime(true);

      echo '<br>', $startMicro;
      echo '<br>', $endMicro;
      echo '<br>', $endMicro - $startMicro;
      */

      /*
      $time1 = new Timer();

      $time1->startTimer();
      sleep(5);
      $time1->stopTimer();
      $duration = $time1->calculateDuration();
      echo '<br>', $duration;

      $first = 'Test4,1,395|Test2,1,34|test3,3,44|Test13,56,next';
      $second = 'temp';
      */
      /*
      try {
        $sql = $pdo->prepare('CALL tpcc.sp_split(?,?)');

        $sql->bindParam(1, $first , PDO::PARAM_STR, 1000);
        $sql->bindParam(2, $second, PDO::PARAM_STR, 255);

        $sql->execute();
        $sql->closeCursor();

      } catch (PDOException $e) {
          die("Error occurred:" . $e->getMessage());
      }
      */
    ?>
  </body>
</html>
