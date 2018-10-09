<html>
    <head>
        <title>Cart</title>  
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

 //---------------------------
 //Reset
 if ( isset($_GET['reset']) )
 {
 if ($_GET["reset"] == 'true')
   {
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   }
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
      $_SESSION["qty"][$i] = 0;
      $_SESSION["amounts"][$i] = 0;
   }
 }

  //---------------------------
  //Delete
  if ( isset($_GET["delete"]) )
   {
   $i = $_GET["delete"];
   $qty = $_SESSION["qty"][$i];
   $qty--;
   $_SESSION["qty"][$i] = $qty;
   //remove item if quantity is zero
   if ($qty == 0) {
    $_SESSION["amounts"][$i] = 0;
    unset($_SESSION["cart"][$i]);
  }
 else
  {
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
  }
 }
 ?>
<?php
 if ( isset($_SESSION["cart"]) ) {
 ?>

<h2>Cart</h2>
<table>
   <tr>
      <th>Product</th>
      <th width="10px">&nbsp;</th>
      <th>Qty</th>
      <th width="10px">&nbsp;</th>
      <th>Amount</th>
      <th width="10px">&nbsp;</th>
      <th>Action</th>
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
      <td width="10px">&nbsp;</td>
      <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
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
   <tr>
      <td colspan="5"></td>
   </tr>
   <tr>
     <form>
    <td colspan="15"><a href="?reset=true">Reset Cart</a><br>
    <button formaction="browse.php">Continue Shopping</button>
    <button formaction="checkout.php">Checkout</button>
</form>
    
   </tr>
</table>
<?php
 }
 else { //if nothing is in the cart
   $total = 0;
   ?>
  <h2>Cart</h2>
<table>
   <tr>
      <th>Product</th>
      <th width="10px">&nbsp;</th>
      <th>Qty</th>
      <th width="10px">&nbsp;</th>
      <th>Amount</th>
      <th width="10px">&nbsp;</th>
      <th>Action</th>
    </tr>
    <tr><td>Noting in cart</td></tr>
  <?php
  $_SESSION["total"] = $total;
  ?>
    <tr>
       <td colspan="7">Total :
          <?php echo($total); ?>
       </td>
    </tr>
    <tr>
       <td colspan="5"></td>
    </tr>
    <tr>
     <form><td colspan="10"><button formaction="browse.php">Continue Shopping</button></form>
     </td>
    </tr>
 </table>
 <?php
 }
 ?>
 </body>
 </html>