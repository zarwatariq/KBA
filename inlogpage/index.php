    <!DOCTYPE html>
    <html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="inlogpage.css">
        <link rel="stylesheet" href="sprint1/header.css">
        <link rel="stylesheet" href="../main.css/main.css">
        <link rel="stylesheet" href="../footer.css">
        <link rel="shortcut icon" href="logo.png">
    </head>
    <body>
    <header>

        <h1>NerdyGadgets</h1>
        <p>Make your day easier with NerdyGadgets!</p>

        <div class="circle">

        </div>


    </header>   <! -- Hier eindigt Header -->


    <main>  <! -- Hier begint Main -->

        <div class="navbar">
            <a href="home.html">Home</a>
            <a href="productpage/productpage-tryout.html">Producten</a>
            <a href="productoverzicht/productoverzicht.html">Product-overzicht</a>
            <a href="inlogpage/index.php">Inloggen</a>
            <a href="Contact/contact.html">Contact</a>
        </div>
        <div class="shop-cart-img">
            <a href="#">
                <img src="shopping-cart-white-hi.png" alt="shop-cart">
            </a>
        </div>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>

        <label>User Name</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <a href="signup.php" class="ca">Create an account</a>
    </form>
    </body>
    </html>
