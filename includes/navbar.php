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

    display_navbar($navbar_items);
?>