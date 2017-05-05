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
        <h2>Images</h2>
    </div>

    <?php

    echo "<form action='' method='post' id='search_form'>
                    <input type='text' name='search' placeholder ='Search'>
                    <input type='submit' name='submit' value = 'Submit'>    
    </form>";
    
    if (!isset($_POST['search']) or empty($_POST['search'])) {
        
        $query = "SELECT imageID, title, filePath, dateCreated, dateModified, credits FROM images WHERE imageID IN (SELECT imageID FROM link WHERE albumID = ?)";
        
        $stmt = $mysqli->stmt_init();
        
        if ($stmt->prepare($query)) {
            $stmt->bind_param('i', $requiredAlbumID);
            $requiredAlbumID = $_GET['albumID'];
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($imageID, $title, $filePath, $dateCreated, $dateModified, $credits);
        }
        
        if ($stmt->num_rows > 0) { 
            echo "<div id = 'search_grid'>";
            while($stmt->fetch()) { 
            
                echo "<div class = 'search_block'>";
                echo "<p> <b>" . $title . "</b> </p>";
                if (empty($filePath)) {
                    $imageFilePath = 'album_placeholder.png';
                }
                else {
                    $imageFilePath = $filePath;
                }
                echo "<a href = '#'> <img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'></a>";
                echo "</div>";    
        
            }
        echo "</div>";        
        }
        
        else {
            echo " <h2> No images found! </h2>";
        }
    }
    
    else {
        
        $query = "SELECT imageID, title, filePath, dateCreated, dateModified, credits FROM images WHERE title REGEXP ?";
        $stmt = $mysqli->stmt_init();
                    
        if ($stmt->prepare($query)) {
            $stmt->bind_param('s', $searchedTitle);
            $searchedTitle = $_POST['search'];
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($imageID, $title, $filePath, $dateCreated, $dateModified, $credits);
        }    
        
//        echo "<pre>" . print_r($stmt, true) . "</pre>";
        
        if ($stmt->num_rows > 0) { 
            echo "<div id = 'search_grid'>";
            while($stmt->fetch()) { 
                
                $query2 = "SELECT imageID, title, filePath, dateCreated, dateModified, credits FROM images WHERE title REGEXP ? AND imageID IN (SELECT imageID FROM link WHERE albumID = ?)";
        
                $stmt2 = $mysqli->stmt_init();

                if ($stmt2->prepare($query2)) {
                    $stmt2->bind_param('si', $searchedTitle, $requiredAlbumID);
                    $statementAlbumID = $_POST['search'];
                    $requiredAlbumID = $_GET['albumID'];
                    $stmt2->execute();
                    $stmt2->store_result();
                    $stmt2->bind_result($imageID2, $title2, $filePath2, $dateCreated2, $dateModified2, $credits2);
                    
//                    echo "<pre>" . print_r($stmt2, true) . "</pre>";
                }          
                
                if ($stmt2->num_rows > 0) { 
                    
                    while($stmt2->fetch()) { 
                
                        echo "<div class = 'search_block'>";
                        echo "<p> <b>" . $title2 . "</b> </p>";
                        if (empty($filePath2)) {
                            $imageFilePath2 = 'album_placeholder.png';
                        }
                        else {
                            $imageFilePath2 = $filePath2;
                        }
                        echo "<a href = '#'> <img src = 'images/$imageFilePath2' alt = 'images/$imageFilePath2' class = 'search_display'></a>";
                        echo "</div>";    
                    }
                }
            }
        echo "</div>";        
        }
        
        else {
            echo " <h2> No images found </h2>";
        }
    }

    $mysqli->close();
    ?>

</body>
</html>