<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // connect with the mysql database
        if($mysqli->connect_error) { // terminate script if fail to connect with database
            die("Connection failed: " . $mysqli->connect_error);
        }

        if(isset($_POST['login'])) { // login username and password were provided
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = hash("sha256", filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            $query = "SELECT * FROM users WHERE username = ? AND hashedPassword = ?";
            $stmt = $mysqli->stmt_init();
            if($stmt->prepare($query)) {
                $stmt->bind_param('ss', $username, $password);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows === 1) { // exactly one entry matched in user table
                    $_SESSION['logged_user'] = $username; // successful login
                }
            }
        }

        else if(isset($_POST['logout'])) { // logout requested
            unset($_SESSION['logged_user']); // successful logout
            session_destroy();
        }
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Welcome to the</h2>
        <h1>Cornell Food Science Club</h1>
        <p>We do more than just eat food!</p>
        <div id='scroll_button'>
            <a href="about.php">Learn More About Us</a>
        </div>
    </div>
        
    <? include 'includes/fixed_footer.php' ?>

    <div id='login_window'>
        <form method='post'>
            <input type='text' name='username' placeholder='Username' required>
            <input type='password' name='password' placeholder='Password' required>
            <input type='submit' name='login' value='Login'>
        </form>
    </div>
</body>
</html>