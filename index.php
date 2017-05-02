<!doctype html>

<html>
<head>
    <meta charset='utf-8'>

    <title>Cornell Food Science Club</title>

    <meta name='description' content='Cornell Food Science Club'>
    <meta name='keywords' content='Cornell, Food, Science, Club'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='js/main.js'></script>
</head>

<body>

    <?php include 'php/navbar.php' ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Welcome to the</h2>
        <h1>Cornell Food Science Club</h1>
        <p>We do more than just eat food!</p>
        <div id='scroll_button'>
            <a href="#about_wrapper">Learn more about us!</a>
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
        <!-- <div id='facebook_wrapper'>
            <a href='https://www.facebook.com/groups/CornellFDSCClub/'>
                <img src='images/facebook.jpg' alt='facebook'>
            </a>
        </div> -->
        
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
            
        <div id='login_wrapper'>
            <div id='login_button'>Login</div>
        </div>
    </div>
    
</body>
</html>