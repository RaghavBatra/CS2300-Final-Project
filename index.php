<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        include 'includes/setup.php';
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <?php
        include 'includes/login.php';
    ?>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Welcome to the</h2>
        <h1>Cornell Food Science Club</h1>
        <p>We do more than just eat food!</p>
        <div id='scroll_button'>
            <a href="about.php">Learn More About Us</a>
        </div>
    </div>
        
    <? include 'includes/footer.php' ?>

</body>
</html>