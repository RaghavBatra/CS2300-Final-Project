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
        <h2>Photo gallery to be implemented!</h2>
    </div>

    <!--
        /* Search form over multiple fields similar to P3 */
        form (post):
            input (text box) - image name
            input (text box) - album name
            input (text box) - description
            input (date) - date
            input (submit) - search

        /* php code that querys the database for images/albums that match the search parameters */
        if submit = true then
            connect to database
            validate input (image name, album name, etc.)
            write prepared statement
            bind parameters
            execute prepared statement
            display search results

        /* Default display list of albums similar to P3 */
        Albums div:
            Table:
                4 albums per row
                Clicking album generates custom page that displays images in album same as P3
                php code needed to generate table (copy from P3)
    -->

</body>
</html>