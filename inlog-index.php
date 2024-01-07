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
        <a href="main-index.html">Home</a>
        <a href="productoverzicht-index.html">Products</a>
        <a href="review.php">Review</a>
        <a href="inlog-index.php">Login</a>
        <a href="contact.html">Contact</a>

    </div>
    <div class="shop-cart-img">
        <a href="winkelwagen.php">
            <img src="shopping-cart-white-hi.png" alt="shop-cart">
        </a>
    </div>
    <body>
    <main>
        <form action="inlog-login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Login</button>
            <a href="inlog-signup.php" class="ca">Create an account</a>
        </form>
    </main>
         <footer>
             <!-- Footer content -->
         </footer>
         <script src="header-footer.js"></script>
         <script src="main.js"></script>
    </body>
    </html>