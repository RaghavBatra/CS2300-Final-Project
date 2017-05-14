<?php

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); // connect with the mysql database
    if($mysqli->connect_error) { // terminate script if fail to connect with database
        die("Connection failed: " . $mysqli->connect_error);
    }

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
        echo "MAILASLKDFJLSAK";
        // mail('cufoodsci@cornell.edu', $subject, $message);
    }

?>