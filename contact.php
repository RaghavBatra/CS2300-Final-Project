<?php include 'includes/contact_head.php' ?>

<body>

    <?php
    	require_once 'config.php';
    	include 'includes/navbar.php'; 
    	include 'includes/setup.php';
    	include 'js/capcha.js';
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='contact_wrapper' class='section_wrapper'>
        <h2>Contact us!</h2>
    </div>
        
	<div id='main' class='section_wrapper2'>
		<form class="cmxform" id="commentForm" method="POST" 
		action="contact.php" novalidate="novalidate">
		<fieldset>
		<legend> We want to hear from you, especially if you're interested in joining.
    	Please feel free to reach out <br> to us using the form below or come to any
    	information sessions or meetings you hear about!</legend>
		<p>
		<label for="cname"> Full Name: </label> <br>
		<input id="cname" name="name" minlength="2" type="text" required="" 
		aria-required="true" class="error" aria-invalid="true">
		<label id="cname-error" class="error" for="cname"></label>
		</p>
		<p>
		<label for="cemail"> E-Mail: </label> <br>
		<input id="cemail" type="email" name="email" required="" aria-required="true">
		</p>
		<p>
		<label for="ccomment">Your message:</label> <br>
		<textarea id="ccomment" name="comment" required="" aria-required="true"></textarea>
		</p>
		<p>
		<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
		<label for='message'>Enter the code above here :</label><br>
		<input id="6_letters_code" name="6_letters_code" type="text"><br>
		<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
		</p>
		<input type="submit" value="Submit" name='submit'>
		</fieldset>
		</form>
	</div>
	
	<?php
		include 'includes/footer.php';
		
		if (!empty($_POST)){
			if(empty($_SESSION['6_letters_code'] ) ||
   			strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
  			{
		      //Note: the captcha code is compared case insensitively.
		      //if you want case sensitive match, update the check above to
		      // strcmp()
			  $errors .= "n The captcha code does not match!";
			}
 
		  if(empty($errors)){
			$name=$_REQUEST['name'];
			$email=$_REQUEST['email'];
			$message=$_REQUEST['comment'];
			if (($name=="")||($email=="")||($message==""))
			$from="From: $name<$email>\r\nReturn-path: $email";
			$subject="Message sent by $name about the food science club!";
			//mail("cufoodsci.cornell.edu", $subject, $message, $from);
			}
		}
	?>
	
</body>
</html>