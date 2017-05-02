<?php
    /* Associative array containing the pages to be displayed in the navbar and 
     * their respective file names */
    $navbar_items = array(
        'Home' => 'index.php',
        'Events' => 'schedule.php',
        'Members' => 'members.php',
        'Photos' => 'gallery.php',
        'Contact Us' => 'contact.php'
    );

    /* Displays the navbar with the items listed in $navbar_items */
    function display_navbar($navbar_items) {
        echo "<nav>
            <div id='logo_wrapper'>
                <p>Cornell Food Science Club</p>
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

    display_navbar($navbar_items);
?>