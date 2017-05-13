<html>
    <body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
        
        
//        $query = "INSERT INTO albums (title, dateCreated, credits) VALUES('Molecular Gastronomy', CURDATE(), '')";
//        $mysqli->query($query);
//        if ($mysqli->connect_errno) {
//            printf("Connect failed: %s\n", $mysqli->connect_error);
//            exit();
//        }
        $files = glob('images/asha/*.{jpg,png,gif}', GLOB_BRACE);
        print_r($files);
        foreach($files as $file) {
            //do your work here
//            echo $file . "<br>";
            $name = explode('/', $file);
            $folderName = $name[1];
            $fileName = $name[2];
            $actualName = $folderName . '/' . $fileName;
            $query = "INSERT INTO images (title, filePath, dateCreated, dateModified, credits) VALUES('', '$actualName', CURDATE(), CURDATE(), '')";
            $mysqli->query($query);
            $query = "SELECT imageID FROM images WHERE filePath = '$actualName'";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            $imageID = $row['imageID'];
            echo $imageID;
            $query = "INSERT INTO link (albumID, imageID) VALUES (14, $imageID)";
            $mysqli->query($query);
        }
        
//        for ($i = 5; $i <= 25; $i++) {
//            $query = "INSERT INTO link VALUES(11, $i)";
//            $mysqli->query($query);
//        }
    ?>
    
    </body>
</html>