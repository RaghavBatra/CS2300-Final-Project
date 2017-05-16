<?php
    /* Associative array containing the pages to be displayed in the navbar and 
     * their respective file names */
    $navbar_items = array(
        'Home' => 'index.php',
        'About Us' => 'about.php',
        'Events' => 'events.php',
        'Members' => 'members.php',
        'Photos' => 'photos.php',
        'Contact Us' => 'contact.php'
    );

    /* Displays the navbar with the items listed in $navbar_items */
    function display_navbar($navbar_items) {
        echo "<nav>
            <div id='logo_wrapper'>
                <p><a href='index.php'>Cornell Food Science Club</a></p>
            </div>
            <div id='nav_wrapper'>
                <ul>";
        foreach($navbar_items as $name => $url) {
            echo "<li><a href='$url'>$name</a></li>";
        }
        echo "  </ul>
            </div>
        </nav>";
    }

    /* Displays the drop-down navbar for mobile users */
    // icon adapted from https://cdn3.iconfinder.com/data/icons/photo-camera-ui/512/
    // mobile-navigation-bar-menu-responsive-ui-512.png
    function display_mobile($navbar_items) {
        echo "<div id='mobile_nav'>
            <div id='top_wrapper'>
                <p><a href='index.php'>Cornell Food Science Club</a></p>
                <div id='nav_icon'>
                    <img src='images/nav_icon' alt='nav'>
                </div>
                <div id='dummy'>
                    <img src='images/nav_icon' alt='nav'>
                </div>
            </div>
            <div id='drop_down'>";

        foreach($navbar_items as $name => $url) {
            echo "<div class='drop_down_item'><a href='$url'>$name</a></div>";
        }

        echo "  </div>
        </div>";
    }

    display_navbar($navbar_items);
    display_mobile($navbar_items);
?>