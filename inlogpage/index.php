    <!DOCTYPE html>
    <html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="inlogpage.css">
    </head>
    <body>
    <header> <! -- Hier begint header -->

        <h1>NerdyGadgets</h1>
        <p>Make your day easier with NerdyGadgets!</p>

        <!-- Knop naar home page -->

        <?php

        echo "<form method='POST' action='home.php'>";
        echo "<input type='submit' name='knop' value='Home page' style='background-color: skyblue; color: white;'/>";
        echo "</form>";

        if(isset($_POST['knop'])){
            echo "Hoi, je hebt de knop geklikt!";
        }

        ?>

    </header>   <! -- Hier eindigt Header -->

    <main>  <! -- Hier begint Main -->

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
    </main> <! -- Hier eindigt Main -->
    </body>
    </html>
