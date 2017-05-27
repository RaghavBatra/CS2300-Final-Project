<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        include 'includes/setup.php'; 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <?php
        include 'includes/login.php';
    ?>

    <div id='dummy_wrapper' class='section_wrapper'>
        <h2>Photos</h2>
    </div>

    <?php
    $album = $_GET['albumID'];
    $dummy_query = "SELECT * FROM albums WHERE albumID = $album";
    $dummy_result = $mysqli->query($dummy_query);
    $num_rows = $dummy_result->num_rows;
    if (!is_numeric($album) or is_float($album) or ($num_rows === 0)) {
            header('Location: not_found.php');
    }
    
    echo "<form action='' method='post' id='search_form'>
                    <input type='text' name='search' placeholder ='Search'>
                    <input type='submit' name='submit' value = 'Submit'>    
    </form>";
    
       if (isset($_POST['add_image']) && isset($_FILES['newimage'])) {
                $id = filter_input(INPUT_POST, 'select_edit', FILTER_SANITIZE_STRING);
                $new_file = $_FILES['newimage'];
                $original_name = $new_file['name'];
                if($new_file['error'] == 0) {
                    $temp_name = $new_file['tmp_name'];
                    move_uploaded_file($temp_name, "images/$original_name");
                }
                $title = filter_input(INPUT_POST, title, FILTER_SANITIZE_STRING);
                $credits = filter_input(INPUT_POST, credits, FILTER_SANITIZE_STRING);

                $sql = "INSERT INTO images (title, credits, filePath, dateCreated, dateModified) VALUES ('$title', '$credits', '$original_name', CURDATE(), CURDATE())";
                 if($mysqli->query($sql)) {
                     echo "<p class='status'>A new image has been added!</p><br>";
                 }
                else {
                    echo "<p class='status'>Error: new image has not been added!</p><br>"; 
                }
                $sql = "SELECT imageID FROM images WHERE filePath = '$original_name'";
                echo $sql;
                $result = $mysqli->query($sql);
                $row = $result->fetch_assoc();
                $image = $row['imageID'];
                echo $album . $image;
                $sql = "INSERT INTO link VALUES ($album, $image)";
                $mysqli->query($sql);
                echo $sql;
       }

        else if (isset($_POST['edit_image'])) {
                 $id = filter_input(INPUT_POST, 'select_edit', FILTER_SANITIZE_STRING);
                if(isset($_FILES['newimage'])) {
                    $new_file = $_FILES['newimage'];
                    $original_name = $new_file['name'];
                    if($new_file['error'] == 0) {
                        $temp_name = $new_file['tmp_name'];
                        move_uploaded_file($temp_name, "images/$original_name");
                    }
                    else {
                        echo "<p class='status'>Error: failed to update image!</p><br>"; 
                    }
                }
                $title = filter_input(INPUT_POST, title, FILTER_SANITIZE_STRING);
                $credits = filter_input(INPUT_POST, credits, FILTER_SANITIZE_STRING);
                $sql = "UPDATE images SET title = '$title', credits = '$credits', filePath = '$original_name', dateModified = CURDATE() WHERE title = '$id';";
                if($mysqli->query($sql)) {
                    echo "<p class='status'>Image has been updated!</p><br>";
                }
                else {
                    echo "<p class='status'>Error: image has not been updated!</p><br>";
                }
            }

            else if (isset($_POST['delete_image'])) {
                $id = filter_input(INPUT_POST, 'select_delete', FILTER_SANITIZE_STRING);
                $sql = "DELETE FROM images WHERE title = '$id'";
                $result = $mysqli->query($sql);
                if($result) {
                    echo "<p class='status'>An image has been deleted!</p><br>";
                }
                else {
                    "<p class='status'>Error: image has not been deleted!</p><br>";
                }
            }
    
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
                $captionText = $title;
                echo "<a href = 'images/$imageFilePath'  data-lightbox='album' data-title=$captionText> <img src = 'images/$imageFilePath' alt = 'images/$imageFilePath' class = 'search_display'></a>";
                echo "</div>";    
        
            }
        echo "</div>";        
        }
        
        else {
            echo "<div class='error_wrapper'><h2>No photos in this album!</h2></div>";
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
                    echo "<a href = 'images/$imageFilePath2'  data-lightbox='album' data-title=$title> <img src = 'images/$imageFilePath2' alt = 'images/$imageFilePath2' class = 'search_display'></a>";
                    echo "</div>";    
                    echo "</div>";    
                    }
                }
            }
        echo "</div>";        
        }
        
        else {
            echo "<div class='error_wrapper'><h2>No results match your search!</h2></div>";
        }
    }
    
    
     if(isset($_SESSION['logged_user'])) {
        echo "<div class='profile_wrapper'>
                        <form method='post' enctype='multipart/form-data'>
                            <input type='file' name='newimage' required>
                            <input type='text' name='title' placeholder='Title' required>
                            <input type='text' name='credits' placeholder='Photo credits' required>
                            <input type='submit' name='add_image' value='Add image'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post' enctype='multipart/form-data'>
                        <select name='select_edit'>";
    
                        $query = "SELECT title FROM images WHERE imageID IN (SELECT imageID FROM link WHERE albumID = $album)";
                        $result = $mysqli->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            if (empty($title)) {
                                $title = 'No name';
                            }
                            echo "<option value = $title> $title </option>";
                        }
                        echo "</select>
                            <input type='file' name='newimage' required>
                            <input type='text' name='title' placeholder='Title' required>
                            <input type='text' name='credits' placeholder='Photo credits' required>
                            <input type='submit' name='edit_image' value='Edit image'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post'>
                            <select name='select_delete'>";                        
                            $query = "SELECT title FROM images WHERE imageID IN (SELECT imageID FROM link WHERE albumID = $album)";
                            $result = $mysqli->query($query);
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                            if (empty($title)) {
                                $title = 'No name';
                            }
                                echo "<option value = $title> $title </option>";
                            } 
                            echo "</select>
                            <input type='submit' name='delete_image' value='Delete image'>
                        </form>
                    </div>";
        }
  
    include 'includes/footer.php';
    $mysqli->close();
    ?>

</body>
</html>