    <!DOCTYPE html>
    <html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="inlog-style.css">
    </head>
    <header>
        <!-- Header content -->
    </header>
    <div class="navbar">
        <a href="main.html">Home</a>
        <a href="productoverzicht/productoverzicht.html">Products</a>
        <a href="inlog-index.php">Login</a>
        <a href="contact.html">Contact</a>

    </div>
    <div class="shop-cart-img">
        <a href="productpage/winkelwagen.php">
            <img src="shopping-cart-white-hi.png" alt="shop-cart">
        </a>
    </div>
    <body> <br>
    <form action="inlog-signup-check.php" method="post">
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
        <a href="inlog-index.php" class="ca">Already have an account?</a>
    </form>
    <br>
    <footer>
        <!-- Footer content -->
    </footer>
    <script src="header-footer.js"></script>
    <script src="main.js"></script>
    </body>
    </html>