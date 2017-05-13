<?php include 'includes/contact_head.php' ?>

<body>
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
 	 var js, fjs = d.getElementsByTagName(s)[0];
 	 if (d.getElementById(id)) return;
 	 js = d.createElement(s); js.id = id;
 	 js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
 	 fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	
    <?php include 'includes/navbar.php'; ?>

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
		<input class="submit" type="submit" value="Submit">
		</p>
		</fieldset>
		</form>
	</div>
	
	<?php
		if (!empty($_POST)){
			$name=$_REQUEST['name'];
			$email=$_REQUEST['email'];
			$message=$_REQUEST['comment'];
			if (($name=="")||($email=="")||($message==""))
			$from="From: $name<$email>\r\nReturn-path: $email";
			$subject="Message sent by $name about the food science club!";
			//mail("spencerc.weiss@gmail.com", $subject, $message, $from);
		}
	?>
	
	<div id='alt_footer' class='section_wrapper'>
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
		<div class="fb-like" 
			data-href="https://www.facebook.com/groups/CornellFDSCClub/" 
			data-layout="standard" data-action="like" 
			data-size="small" data-show-faces="true" 
			data-share="true">
		</div>
        <div id='login_wrapper'>
            <div id='login_button'><a href="">Login</a></div>
        </div>
    </div>
	<!--
		/* div containing the contact form, which allows users to email the club */
        email div:
            form (post): 
                input (text box) - name
                input (text box) - netid
                input (text area) - email body
                input (submit) - send email
        
        /* php code to send email */
	
        if submit = true then
            validate inputs (name and netid)
            php send email function to club email
            if email sent successfully then
                display success message
            else
                display error message

        /* Facebook plugin */
        Facebook div:
            url to Facebook group page
            iframe - Facebook like button plugin
    -->
</body>
</html>