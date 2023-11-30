    <!DOCTYPE html>
    <html>
    <head>
        <title>SIGN UP</title>
        <link rel="stylesheet" type="text/css" href="inlogpage.css">
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
    <form action="signup-check.php" method="post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Name</label>
        <?php if (isset($_GET['name'])) { ?>
            <input type="text"
                   name="name"
                   placeholder="Name"
                   value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="name"
                   placeholder="Name"><br>
        <?php }?>

        <label>User Name</label>
        <?php if (isset($_GET['uname'])) { ?>
            <input type="text"
                   name="uname"
                   placeholder="User Name"
                   value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="uname"
                   placeholder="User Name"><br>
        <?php }?>


        <label>Password</label>
        <input type="password"
               name="password"
               placeholder="Password"><br>

        <label>Re Password</label>
        <input type="password"
               name="re_password"
               placeholder="Re_Password"><br>

        <button type="submit">Sign Up</button>
        <a href="index.php" class="ca">Already have an account?</a>
    </form>
    </body>
    </html>
