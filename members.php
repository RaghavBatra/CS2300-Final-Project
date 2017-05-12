<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if($mysqli->connect_error) { // terminate script if fail to connect with database
            die("Connection failed: " . $mysqli->connect_error);
        }
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id="executives_wrapper" class='section_wrapper'>
        <h1>Executive Board</h1>

        <?php
            if(isset($_POST['add_member']) && isset($_FILES['newphoto'])) {
                $new_file = $_FILES['newphoto'];
                $original_name = $new_file['name'];
                if($new_file['error'] == 0) {
                    $temp_name = $new_file['tmp_name'];
                    move_uploaded_file($temp_name, "images/$original_name");
                    unset($_POST['add_member']);
                    $field_array = array();
                    foreach($_POST as $key => $value) {
                        if(!empty($value)) {
                            $filtered_value = filter_input(INPUT_POST, "$key", FILTER_SANITIZE_STRING);
                            $field_array[$key] = "'$filtered_value'";
                        }
                    }
                    $field_name_array = array_keys($field_array);
                    $field_list = implode(',', $field_name_array);
                    $field_list .= ",image_url";
                    $value_list = implode(',', $field_array);
                    $value_list .= ",'$original_name'";
                    $sql = "INSERT INTO executives ($field_list) VALUES ($value_list);";
                    if($mysqli->query($sql)) {
                        $new_id = $mysqli->insert_id;
                        echo "<p class='status'>A new member has been added!</p><br>";
                    }
                }
                else {
                    echo "<p class='status'>Error: new member has not been added!</p><br>"; 
                }
            }

            else if(isset($_POST['edit_member'])) {
                $id = filter_input(INPUT_POST, 'select_edit', FILTER_SANITIZE_STRING);
                unset($_POST['edit_member']);
                unset($_POST['select_edit']);
                $field_array = array();
                foreach($_POST as $key => $value) {
                    if(!empty($value)) {
                        $filtered_value = filter_input(INPUT_POST, "$key", FILTER_SANITIZE_STRING);
                        array_push($field_array, "$key = '$filtered_value'");
                    }
                }
                $value_list = implode(',', $field_array);
                if(isset($_FILES['newphoto'])) {
                    $new_file = $_FILES['newphoto'];
                    $original_name = $new_file['name'];
                    if($new_file['error'] == 0) {
                        $temp_name = $new_file['tmp_name'];
                        move_uploaded_file($temp_name, "images/$original_name");
                        $value_list .= ", image_url = '$original_name'";
                    }
                    else {
                        echo "<p class='status'>Error: failed to update photo!</p><br>"; 
                    }
                }
                $sql = "UPDATE executives SET $value_list WHERE id = $id;";
                if($mysqli->query($sql)) {
                    echo "<p class='status'>Member has been updated!</p><br>";
                }
                else {
                    echo "<p class='status'>Error: member has not been updated!</p><br>";
                }
            }

            else if(isset($_POST['delete_member'])) {
                $id = filter_input(INPUT_POST, 'select_delete', FILTER_SANITIZE_STRING);
                $sql = "DELETE FROM executives WHERE id = '$id'";
                $result = $mysqli->query($sql);
                if($result) {
                    echo "<p class='status'>A member has been deleted!</p><br>";
                }
                else {
                    "<p class='status'>Error: member has not been deleted!</p><br>";
                }
            }

            $query = 'SELECT * FROM executives';
            $result = $mysqli->query($query);
            $names = array();
            $column_count = 0;
            echo "<div class='table_row'>";
            while($row = $result->fetch_assoc()) {
                if($column_count === 3) {
                    $column_count = 0;
                    echo "</div><div class='table_row'>";
                }
                $id = $row['id'];
                $name = $row['executive'];
                $names[$id] = $name;
                $title = $row['title'];
                $year = $row['grad_year'];
                $description = $row['description'];
                $image_url = 'images/' . $row['image_url'];
                echo "<div id='$id' class='profile_wrapper'>
                    <img src='$image_url' alt='$name'>
                    <h2>$name</h2>
                    <h3>$title</h3>
                    <h4>Class of $year</h4>
                    <div class='description_wrapper'>$description</div>
                </div>";
            }

            if(isset($_SESSION['logged_user'])) {
                echo "</div><div class='table_row'>
                    <div class='profile_wrapper'>
                        <form method='post' enctype='multipart/form-data'>
                            <input type='file' name='newphoto' required>
                            <p>Warning: only upload square photos</p>
                            <input type='text' name='executive' placeholder='Name' required>
                            <input type='text' name='title' placeholder='Position' required>
                            <input type='text' name='grad_year' placeholder='Graduation Year (ex. 2019)' required>
                            <textarea name='description' placeholder='Description'></textarea>
                            <input type='submit' name='add_member' value='Add Member'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post'>
                            <select name='select_edit'>";
                foreach($names as $id => $name) {
                    echo "<option value='$id'>$name</option>";
                }
                echo "      </select>
                            <input type='file' name='newphoto'>
                            <p>Warning: only upload square photos</p>
                            <input type='text' name='executive' placeholder='Name'>
                            <input type='text' name='title' placeholder='Position'>
                            <input type='text' name='grad_year' placeholder='Graduation Year (ex. 2019)'>
                            <textarea name='description' placeholder='Description'></textarea>
                            <input type='submit' name='edit_member' value='Edit Member'>
                        </form>
                    </div>
                    <div class='profile_wrapper'>
                        <form method='post'>
                            <select name='select_delete'>";
                foreach($names as $id => $name) {
                    echo "<option value='$id'>$name</option>";
                }
                echo "      </select>
                            <input type='submit' name='delete_member' value='Delete Member'>
                        </form>
                    </div>";
            }   
            echo '</div></div>';
        ?>

    <div id='alt_footer' class='section_wrapper'>
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
            
        <div id='login_wrapper'>
            <div id='login_button'><a href="">Login</a></div>
        </div>
    </div>

</body>
</html>