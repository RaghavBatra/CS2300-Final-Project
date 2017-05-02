<?php include 'includes/head.php' ?>

<body>

    <?php include 'includes/navbar.php' ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Welcome to the</h2>
        <h1>Cornell Food Science Club</h1>
        <p>We do more than just eat food!</p>
        <div id='scroll_button'>
            <a href="#about_wrapper">Learn More About Us</a>
        </div>
    </div>

    <div id='about_wrapper' class='section_wrapper'>
        <h1>Who are we?</h1>
        <h2>We are a community of Cornell University students who are 
        passionate about anything related to food! Our <span>Vision</span> is to
        <span>Support</span> students interested in the food industry, food 
        sicence, and/or the culinary arts, <span>Promote</span> club membership 
        across various majors, and <span>Advocate</span> opportunities in the 
        food industry to students across campus.</h2>
    </div>

    <div id='footer' class='section_wrapper'>
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
            
        <div id='login_wrapper'>
            <div id='login_button'><a href="">Login</a></div>
        </div>

        <!--
            /* jQuery code for login button event handler */
            if login button clicked
                slide up login in window (will replace login page)

            /* login window template */
            login div:
                form (post):
                    input (text box) - username
                    input (text box) - password
                    input (submit) - login

            /* php code to execute login */
            if login = true
                validate user input (username and password)
                write prepared statement
                bind parameters
                execute prepared statement
                if login successful
                    set logged user as username
                else
                    display error message
        -->
    </div>
</body>
</html>