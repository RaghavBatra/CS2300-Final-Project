<?php include 'php/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'php/navbar.php';
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='login_form_wrapper' class='section_wrapper'>
        <?php
            if(isset($_POST['login'])) { // login attempted
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = hash("sha256", filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
                $query = "SELECT * FROM users WHERE username = ? AND hashedPassword = ?";
                $stmt = $mysqli->stmt_init();

                if($stmt->prepare($query)) {
                    $stmt->bind_param('ss', $username, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows === 1) { // one user matched
                        $user_data = $result->fetch_assoc();
                        echo "<h1>Welcome $username!</h1>";
                        $_SESSION['logged_user'] = $username;
                    }
                    else {
                        echo '<h1>You have entered an incorrect username or password!</h1>';
                    }
                }
            }

            else if(isset($_POST['logout'])) { // logout
                unset($_SESSION['logged_user']);
                echo "<h1>You have successfully logged out</h1>";
                session_destroy();
            }

            if(!isset($_SESSION['logged_user'])) { // display login interface when not logged in
                echo "<form method='post'>
                    <h1>Login with your credentials</h1>
                    <input type='text' name='username' placeholder='Username'>
                    <input type='text' name='password' placeholder='Password'>
                    <input type='submit' name='login' value='Login'>    
                </form>";
            }

            else { // display logout interface when logged in
                echo "<form method='post'>
                    <h1>Click below to logout</h1>
                    <input type='submit' name='logout' value='Logout'>
                </form>";
            }
        ?>
    </div>

</body>
</html>