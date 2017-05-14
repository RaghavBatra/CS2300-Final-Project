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

    <div id='about_wrapper' class='section_wrapper'>
        <h1>Who are we?</h1>
        <h2>We are a community of Cornell University students who are 
        passionate about anything related to food! Our <span>Vision</span> is to
        <span>Support</span> students interested in the food industry, food 
        science, and/or the culinary arts, <span>Promote</span> club membership 
        across various majors, and <span>Advocate</span> opportunities in the 
        food industry to students across campus.</h2>
    </div>
        
    <? include 'includes/footer.php' ?>

</body>
</html>