    <?php
    session_start();
    include "db_conn.php";

    // Check if the user is already logged in
    if (isset($_SESSION['user_name'])) {
        header("Location: inlog-home.php"); // Redirect to the home page if already logged in
        exit();
    }

    // Initialize the login attempt count
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }

    if (isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if (empty($uname)) {
            header("Location: inlog-index.php?error=User Name is required");
            exit();
        } elseif (empty($pass)) {
            header("Location: inlog-index.php?error=Password is required");
            exit();
        } else {
            // hashing the password
            $pass = md5($pass);

            $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: inlog-home.php");
                    exit();
                } else {
                    $_SESSION['login_attempts']++; // Increment login attempts
                    if ($_SESSION['login_attempts'] >= 3) {
                        // Show the GIF on the same page without redirecting
                        echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
                        echo '<img src="image/giphy%20(1).gif" style="display: block;">';
                        echo '</div>';
                        echo '
                                <script>
                                            setTimeout(function() {
                                                var gifElement = document.querySelector("img");
                                                gifElement.style.display = "none"; // Hide the GIF after 10 seconds
                                                window.location.href = "inlog-index.php"; // Go back to the login page
                                            }, 10000);
                                          </script>';
                        exit();
                    } else {
                        header("Location: inlog-index.php?error=Incorrect User name or password");
                        exit();
                    }

                }
            } else {
                echo "Error: " . mysqli_error($conn); // Output any SQL errors for debugging
                exit();
            }
        }
    } else {
        header("Location: inlog-index.php");
        exit();
    }
    ?>

