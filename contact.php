<?php include 'includes/head.php' ?>

<body>

    <?php include 'includes/navbar.php'; ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Contact form to be implemented!</h2>
    </div>

    <!--
        /* div containing the contact form, which allows users to email the club */
        email div:
            form (post): 
                input (text box) - name
                input (text box) - netid
                input (text area) - email body
                input (submit) - send email
        
        /* php code to send email */
        if submit = true then
            validate inputs (name and netid)
            php send email function to club email
            if email sent successfully then
                display success message
            else
                display error message

        /* Facebook plugin */
        Facebook div:
            url to Facebook group page
            iframe - Facebook like button plugin
    -->
</body>
</html>