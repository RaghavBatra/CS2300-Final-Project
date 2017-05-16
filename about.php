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

    <div class='about_wrapper section_wrapper'>
        <h1>Who are we?</h1>
        <h2>We are a community of Cornell University students who are 
        passionate about anything related to food! We are dedicated to providing
        students who share our same passion with the resources to pursue their
        food dreams. We hold regular information sessions, career development
        opportunities, food company tours to connect students like you
        with companies looking for new hires!</h2>
    </div>

    <div id='red_background' class='about_wrapper section_wrapper'>
        <h1>What is our vision?</h1>
        <h2>Our <span>Vision</span> is to
        <span>Support</span> students interested in the food industry, food 
        science, and/or the culinary arts, <span>Promote</span> club membership 
        across various majors, and <span>Advocate</span> opportunities in the 
        food industry to students across campus.</h2>
    </div>

    <div class='about_wrapper section_wrapper'>
        <h1>Who are you?</h1>
        <h2>Have we perked your interest? Are you interested in joining the club 
        or just attending one of our many events? If you answered yes to either of 
        those questions, Then we would like to get to know more about you. Check our 
        <a href='events.php'>Calendar</a> to see when our next information meeting is 
        or <a href='contact.php'>contact us</a> directly by email! We hope to see you
        soon!</h2>
    </div>
        
    <? include 'includes/footer.php' ?>

</body>
</html>