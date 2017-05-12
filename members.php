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
            $query = 'SELECT * FROM executives';
            $result = $mysqli->query($query);
            $column_count = 0;
            echo "<div class='table_row'>";
            while($row = $result->fetch_assoc()) {
                if($column_count === 3) {
                    $column_count = 0;
                    echo "</div><div class='table_row'>";
                }
                $id = $row['id'];
                $name = $row['executive'];
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

    <script>
        $('.profile_wrapper').click(function(event) {
            var id = $(this).attr('id');
            if($('#' + id).find('.description_wrapper').css('display') == 'none') {
                $('#' + id).find('.description_wrapper').slideDown('slow');
                console.log("aSDF");
            }
            else {
                $('#' + id).find('.description_wrapper').slideUp();
                console.log("aSasddDF");
            }
        });
    </script>

</body>
</html>