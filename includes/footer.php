<?php
    echo "<div id='footer' class='section_wrapper'>
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
            
        <div id='buttons_wrapper'>";

    if(!isset($_SESSION['logged_user'])) {            
        echo "<div id='login_wrapper'>
                <div id='login_button'><a href=''>Login</a></div>
            </div>";
    }
    else {
        echo "<form id='logout_wrapper' method='post'>
                <input id='logout_button' type='submit' name='logout' value='Logout'>
            </form>";
    }
    echo "  <div id='subscribe_wrapper'>
                <div id='subscribe_button'><a href=''>Subscribe</a></div>
            </div>
            <div id='facebook_wrapper'>
                <a href='https://www.facebook.com/groups/CornellFDSCClub/'>
                    <img src='images/facebook.jpg' alt='facebook'>
                </a>
            </div>
        </div>
    </div>
    <div id='login_window' class='popup'>
        <form method='post'>
            <input type='text' name='username' placeholder='Username' required>
            <input type='password' name='password' placeholder='Password' required>
            <input type='submit' name='login' value='Login'>
        </form>
    </div>
    <div id='subscribe_window' class='popup'>
        <form method='post'>
            <input type='text' name='name' placeholder='Name' required>
            <input type='text' name='email' placeholder='Email' required>
            <input type='submit' name='subscribe' value='Subscribe'>
        </form>
    </div>";
?>