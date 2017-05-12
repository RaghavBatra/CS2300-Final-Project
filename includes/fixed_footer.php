<?php
	echo "<div id='fixed_footer' class='section_wrapper'>
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
        </div>
    </div>";
?>