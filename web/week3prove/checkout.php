<html>
    <head>
        <title>Checkout</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, intitial-scale=1.0">
    </head>
    <body>
    <form method="post" action="confirm.php">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <br>
            <label for="address">Address:</label>
            <input type="text" name="address"> 
            <br>
            <label for="city">City</label>
            <input type="text" name="city"> 
            <br>
            <label for="state">State:</label>
            <input type="text" name="state"> 
            <br>
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip"> 
            <br>
            <label for="email">Email:</label>
            <input type="text" name="email">   
            <br>
            <button formaction="cart.php">Return to Cart</button>
            <input type="submit" name="submit">
        </form>
</body>
</html>
