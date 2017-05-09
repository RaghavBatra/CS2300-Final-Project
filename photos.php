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

    <?php
    
    if (!isset($_POST['search']) or empty($_POST['search'])) {
        echo "<form action='' method='post' id='search_form'>
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
                echo "<p> <b>" . $row["title"] . "</b> </p>";
                if (empty($row['coverImageFilePath'])) {
                    $imageFilePath = 'album_placeholder.png';
                }
                else {
                    $imageFilePath =  $row["coverImageFilePath"];
                }
                $currentAlbumID = $row["albumID"];
                echo "<a href = 'images.php?albumID=$currentAlbumID'> <img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'> </a>";
                echo "</div>";    
            }
            echo "</div>";
        }
    }
    
    else {
        echo "<form action='' method='post' id='search_form'>
                    <input type='text' name='search' placeholder ='Search'>
                    <input type='submit' name='submit' value = 'Submit'>    
        </form>";
        
        $query = "SELECT albumID, title, credits, coverImageFilePath FROM albums WHERE title REGEXP ? ";
        
        $stmt = $mysqli->stmt_init();
        
        if ($stmt->prepare($query)) {
            $stmt->bind_param('s', $searchInput);
            $searchInput = htmlentities(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING));
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($albumID, $title, $credits, $coverImageFilePath);
        }
        
        if ($stmt->num_rows > 0) { 
            echo "<div id = 'search_grid'>";
            while($stmt->fetch()) { 
            
                echo "<div class = 'search_block'>";
                echo "<p> <b>" . $title . "</b> </p>";
                if (empty($coverImageFilePath)) {
                    $imageFilePath = 'album_placeholder.png';
                }
                else {
                    $imageFilePath = $coverImageFilePath;
                }
                echo "<a href = 'images.php?albumID=$albumID'> <img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'> </a>";
                echo "</div>";    
            }
        echo "</div>";        
        }
        
        else {
            echo " <h2> No results! </h2>";
        }
    }
        
    
    $mysqli->close();
    ?>

</body>
</html>