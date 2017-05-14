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

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Photo gallery</h2>
    </div>

    <?php
    
     if (isset($_POST['add_album']) && isset($_FILES['newalbum'])) {
                $id = filter_input(INPUT_POST, 'select_edit', FILTER_SANITIZE_STRING);
                $new_file = $_FILES['newalbum'];
                $original_name = $new_file['name'];
                if($new_file['error'] == 0) {
                    $temp_name = $new_file['tmp_name'];
                    move_uploaded_file($temp_name, "images/$original_name");
                }
                $title = filter_input(INPUT_POST, title, FILTER_SANITIZE_STRING);
                $credits = filter_input(INPUT_POST, credits, FILTER_SANITIZE_STRING);
                $sql = "INSERT INTO albums (title, credits, coverImageFilePath) VALUES ('$title', '$credits', '$original_name')";
                 if($mysqli->query($sql)) {
                     echo "<p class='status'>A new album has been added!</p><br>";
                 }
                else {
                    echo "<p class='status'>Error: new album has not been added!</p><br>"; 
                }
            }

            else if (isset($_POST['edit_album'])) {
                 $id = filter_input(INPUT_POST, 'select_edit', FILTER_SANITIZE_STRING);
                if(isset($_FILES['newalbum'])) {
                    $new_file = $_FILES['newalbum'];
                    $original_name = $new_file['name'];
                    if($new_file['error'] == 0) {
                        $temp_name = $new_file['tmp_name'];
                        move_uploaded_file($temp_name, "images/$original_name");
                    }
                    else {
                        echo "<p class='status'>Error: failed to update album!</p><br>"; 
                    }
                }
                $title = filter_input(INPUT_POST, title, FILTER_SANITIZE_STRING);
                $credits = filter_input(INPUT_POST, credits, FILTER_SANITIZE_STRING);
                $sql = "UPDATE albums SET title = '$title', credits = '$credits', coverImageFilePath = '$original_name' WHERE title = '$id';";
                if($mysqli->query($sql)) {
                    echo "<p class='status'>Album has been updated!</p><br>";
                }
                else {
                    echo "<p class='status'>Error: album has not been updated!</p><br>";
                }
            }

            else if (isset($_POST['delete_album'])) {
                $id = filter_input(INPUT_POST, 'select_delete', FILTER_SANITIZE_STRING);
                $sql = "DELETE FROM albums WHERE title = '$id'";
                $result = $mysqli->query($sql);
                if($result) {
                    echo "<p class='status'>An album has been deleted!</p><br>";
                }
                else {
                    "<p class='status'>Error: album has not been deleted!</p><br>";
                }
            }
    
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
                    <input type='submit' name='submit' value = 'Search'>    
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
        
    
    if(isset($_SESSION['logged_user'])) {
        echo "<div class='profile_wrapper'>
                        <form method='post' enctype='multipart/form-data'>
                            <input type='file' name='newalbum' required>
                            <input type='text' name='title' placeholder='Title' required>
                            <input type='text' name='credits' placeholder='Photo credits' required>
                            <input type='submit' name='add_album' value='Add album'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post' enctype='multipart/form-data'>
                        <select name='select_edit'>";
    
                        $query = 'SELECT title FROM albums';
                        $result = $mysqli->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            echo "<option value = $title> $title </option>";
                        }
                        echo "</select>
                            <input type='file' name='newalbum' required>
                            <input type='text' name='title' placeholder='Title' required>
                            <input type='text' name='credits' placeholder='Photo credits' required>
                            <input type='submit' name='edit_album' value='Edit album'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post'>
                            <select name='select_delete'>";                        
                            $query = 'SELECT title FROM albums';
                            $result = $mysqli->query($query);
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                echo "<option value = $title> $title </option>";
                            } 
                            echo "</select>
                            <input type='submit' name='delete_album' value='Delete album'>
                        </form>";
        }
    
    include 'includes/footer.php';
    $mysqli->close();
    ?>

</body>
</html>