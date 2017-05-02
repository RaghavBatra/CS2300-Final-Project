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
        <h2>List view and calendar view of events to be implemented!</h2>
    </div>

    <!--
        /* Google calendar plugin supports list, day, week, and month views */
        iframe:
            Google calendar

        /* jQuery code for onclick events */
        if event clicked then
            connect to database
            query the database for event with same title and date as selected event
            display information on that event
    -->
</body>
</html>