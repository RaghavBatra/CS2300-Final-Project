<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Photo gallery</h2>
    </div>

    <!--
        /* Search form over multiple fields similar to P3 */
        form (post):


        /* php code that querys the database for images/albums that match the search parameters */
        if submit = true then
            connect to database
            validate input (image name, album name, etc.)
            write prepared statement
            bind parameters
            execute prepared statement
            display search results

        /* Default display list of albums similar to P3 */
        Albums div:
            Table:
                4 albums per row
                Clicking album generates custom page that displays images in album same as P3
                php code needed to generate table (copy from P3)
    -->

    <?php
    
    if (!isset($_POST['search'])) {
        echo "<form action='' method='post' id='search'>
                    <input type='text' name='search' placeholder ='Search'>
                    <input type='submit' name='submit' value = 'Submit'>    
        </form>";
        
        // If nothing has been selected, display all albums
        $query = "SELECT * FROM albums";
        $albums = $mysqli->query($query);
        echo "<div id = 'search_grid'>";
        if ($albums->num_rows > 0) {
            while ($row = $albums->fetch_assoc()) {
                echo "<div class = 'search_block'>";
                echo "<p> <b> Album name: " . $row["title"] . "</b> </p>";
                echo "<p> <b> Album credits: " . $row["coverImageFilePath"] . "</b> </p>";
                if (empty($row['coverImageFilePath'])) {
                    $imageFilePath = 'album_placeholder.png';
                }
                else {
                    $imageFilePath =  $row["coverImageFilePath"];
                }
                echo "<img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'> ";
                echo "</div>";    
            }
            echo "</div>";
        }
    }
    
    else {
        $query = "SELECT * FROM albums WHERE title REGEXP ? ";
        
        $stmt = $mysqli->stmt_init();
        
        if ($stmt->prepare($query)) {
            $stmt->bind_param('s', $searchInput);
            $searchInput = htmlentities(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING));
            $stmt->execute();
            $stmt->store_result();
        }
        
        if ($stmt->num_rows > 0) { 
            echo "<div id = 'search_grid'>";
            while($row = $stmt->fetch()) { 
            
                echo "<div class = 'search_block'>";
                echo "<p> <b> Album name: " . $row["title"] . "</b> </p>";
                echo "<p> <b> Album credits: " . $row["coverImageFilePath"] . "</b> </p>";
                if (empty($row['coverImageFilePath'])) {
                    $imageFilePath = 'album_placeholder.png';
                }
                else {
                    $imageFilePath =  $row["coverImageFilePath"];
                }
                echo "<img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'> ";
                echo "</div>";    
            }
        echo "</div>";        
        }
        
        else {
            echo "No results!";
        }
    }
        
    
    $mysqli->close();
    ?>

</body>
</html>