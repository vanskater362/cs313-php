<html>
<title>confirm</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, intitial-scale=1.0">
    </head>
   <body>
   <?php session_start();
 //---------------------------
 //initialize sessions

//Define the products and cost
$products = array("product A", "product B", "product C");
$amounts = array("19.99", "10.99", "2.99");

//Load up session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
    $_SESSION["qty"][$i] = 0;
   $_SESSION["amounts"][$i] = 0;
  }
 }
 ?>
<?php
 if ( isset($_SESSION["cart"]) ) {
 ?>

<h2>Items</h2>
<table>
   <tr>
      <th>Product</th>
      <th width="10px">&nbsp;</th>
      <th>Qty</th>
      <th width="10px">&nbsp;</th>
      <th>Amount</th>
   </tr>
   <?php
 $total = 0;
 foreach ( $_SESSION["cart"] as $i ) {
 ?>
   <tr>
      <td>
         <?php echo( $products[$_SESSION["cart"][$i]] ); ?>
      </td>
      <td width="10px">&nbsp;</td>
      <td>
         <?php echo( $_SESSION["qty"][$i] ); ?>
      </td>
      <td width="10px">&nbsp;</td>
      <td>
         <?php echo( $_SESSION["amounts"][$i] ); ?>
      </td>
   </tr>
   <?php
 $total = $total + $_SESSION["amounts"][$i];
 }
 $_SESSION["total"] = $total;
 ?>
   <tr>
      <td colspan="7">Total :
         <?php echo($total); ?>
      </td>
   </tr>
</table>
<?php
 } ?>
         <h2>Shipping to</h2>
         <?php echo $_POST["name"]; ?><br>
         <?php echo $_POST["email"]; ?><br>
         <?php echo $_POST["address"]; ?><br>
         <?php echo $_POST["city"]; ?>,
         <?php echo $_POST["state"]  ?> 
         <?php echo $_POST["zip"]?><br>
    </body>
</html>