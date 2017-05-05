<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Check out our calendar of events!</h2>
    </div>

	<iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_0nicem4o3b27rf2hm9fdks8oj4%40group.calendar.google.com&ctz=America/New_York" 
	style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
	</iframe>

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