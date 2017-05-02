<?php include 'php/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'php/navbar.php';
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Profiles of club executives and members to be implemented!</h2>
    </div>

</body>
</html>