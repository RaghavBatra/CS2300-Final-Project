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

    <div id="executives_wrapper" class='section_wrapper'>
        <h1>Executive Board</h1>
        <div class='table_row'>
            <div class='profile_wrapper'>
                <img src='images/president.jpg' alt='Halle Bershad'>
                <h2>Halle Bershad</h2>
                <h3>President</h3>
                <h4>Class of 2017</h4>
            </div>
            <div class='profile_wrapper'>
                <img src='images/vice_president.jpg' alt='Nayara Luna'>
                <h2>Nayara Luna</h2>
                <h3>Vice President</h3>
                <h4>Class of 2019</h4>
            </div>
            <div class='profile_wrapper'>
                <img src='images/secretary.jpg' alt='Sierra Jamir'>
                <h2>Sierra Jamir</h2>
                <h3>Secretary</h3>
                <h4>Class of 2018</h4>
            </div>
        </div>
        <div class='table_row'>
            <div class='profile_wrapper'>
                <img src='images/p4.jpg' alt='Sean Dolan'>
                <h2>Sean Dolan</h2>
                <h3>Treasurer</h3>
                <h4>Class of 2019</h4>
            </div>
            <div class='profile_wrapper'>
                <img src='images/p5.jpg' alt='Kaitlin Steinleitner'>
                <h2>Kaitlin Steinleitner</h2>
                <h3>Transfer Representative</h3>
                <h4>Class of 2019</h4>
            </div>
            <div class='profile_wrapper'>
                <img src='images/p6.jpg' alt='Morgan Dickens'>
                <h2>Morgan Dickens</h2>
                <h3>Community Outreach</h3>
                <h4>Class of 2020</h4>
            </div>
        </div>
        <div class='table_row'>
            <div class='profile_wrapper'>
                <img src='images/p7.jpg' alt='Morgan Smith'>
                <h2>Morgan Smith</h2>
                <h3>Community Outreach</h3>
                <h4>Class of 2020</h4>
            </div>
        </div>
    </div>

    <div id='members_wrapper' class='section_wrapper'>
        <h1>Club Members</h1>
    </div>

</body>
</html>