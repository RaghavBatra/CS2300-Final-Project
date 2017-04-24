<!-- Navbar for all pages. -->
<?php
	echo '<div class="header">
		<div id="sweiss">
		<a href="index.php">SWEISS</a>
		</div>
		<div id="sections">
		<div class="section">
		<a href="index.php">ALL PHOTOS</a>
		</div>
		<div class="section">
		<a href="albums.php">ALBUMS</a>
		</div>
		<div class="section">
		<a href="upload.php">UPLOAD</a>
		</div>';
		//greet user and provide logout tab if user is logged in
		if (isset($_SESSION['logged_user'])) {
			echo '<div class="section">';
			echo 'WELCOME, ' . $_SESSION['logged_user'] . '!';
			echo '</div>';
			echo '<div class="section">';
			echo '<a href="logout.php"> LOG OUT</a>';
			echo '</div><</div></div>';
		}
		//user is not logged in, give a link
		else {
			echo '<div class="section">';
			echo '<a href="login.php"> LOG IN</a>';
			echo '</div></div></div>';
		}
	?>
