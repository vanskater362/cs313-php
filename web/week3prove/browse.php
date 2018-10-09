<html>
    <head>
        <title>Browse</title>  
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
 //Add
 if ( isset($_GET["add"]) )
   {
   $i = $_GET["add"];
   $qty = $_SESSION["qty"][$i] + 1;
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
   $_SESSION["cart"][$i] = $i;
   $_SESSION["qty"][$i] = $qty;
 }
 ?>
<h2>List of All Products</h2>
<table>
   <tr>
      <th>Product</th>
      <th width="10px">&nbsp;</th>
      <th>Amount</th>
      <th width="10px">&nbsp;</th>
      <th>Action</th>
   </tr>
   <?php
 for ($i=0; $i< count($products); $i++) {
   ?>
   <tr>
      <td>
         <?php echo($products[$i]); ?>
      </td>
      <td width="10px">&nbsp;</td>
      <td>
         <?php echo($amounts[$i]); ?>
      </td>
      <td width="10px">&nbsp;</td>
      <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
   </tr>
   <?php
 }
 ?>
 <tr>
      <td colspan="5"></td>
   </tr>
   <tr>
      <form><td colspan="5"><button formaction="cart.php">View Cart</button></td></form>
   </tr>
</table>
</body>
</html>