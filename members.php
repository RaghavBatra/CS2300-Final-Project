<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        // $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Profiles of club executives and members to be implemented!</h2>
    </div>

    <!--
        /* php code needed to generate table view of club members */
            connect to database
            write prepared statement to fetch entries in profiles table
            execute prepared statement
            loop through the result of statement execution and ouput html table 
                nicely formated to display an image of each member along with 
                a brief description

        /* jQuery script for onclick events */
            if profile picture is clicked then
                enlarge picture and dim rest of page
    -->

</body>
</html>