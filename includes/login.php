<?php
    if(isset($_POST['login'])) { // login username and password were provided
        $username = hash("sha256", filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = hash("sha256", filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $query = "SELECT * FROM users WHERE username = ? AND hashedPassword = ?";
        $stmt = $mysqli->stmt_init();
        if($stmt->prepare($query)) {
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 1) { // exactly one entry matched in user table
                $_SESSION['logged_user'] = $username; // successful login
                echo "<div class='lerror_wrapper'>
                    <h2>Successfully logged in. You are now authorized to use admin features.</h2>
                </div>";
            }
            else {
                echo "<div class='lerror_wrapper'>
                    <h2>Incorrect username or password. Please try logging in again.</h2>
                </div>";
            }
        }
    }

    else if(isset($_POST['logout'])) { // logout requested
        unset($_SESSION['logged_user']); // successful logout
        session_destroy();
    }

    if(isset($_POST['subscribe'])) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $subject = 'Request to be added to listserv';
        $message = "Please add $name $email to the listserv";
        // $success = mail('cufoodsci@cornell.edu', $subject, $message);
        // if($success) {
            echo "<div class='lerror_wrapper'>
                    <h2>Thank you for subscribing!</h2>
                </div>";
        // }
        // else {
        //     echo "<div class='lerror_wrapper'>
        //             <h2>Failed to subscribe. Please try again.</h2>
        //         </div>";
        // }
    }
?>