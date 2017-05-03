<?php include 'includes/head.php' ?>

<body>

    <?php include 'includes/navbar.php'; ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Contact form to be implemented!</h2>
    </div>


        
        
	<div id='welcome_wrapper' class='section_wrapper'>
        <?php
			$action=$_REQUEST['action'];
			if ($action=="")    /* display the contact form */
   				{
    	?>
			    <form  action="" method="POST" enctype="multipart/form-data">
			    <input type="hidden" name="action" value="submit">
			    Your name:<br>
			    <input name="name" type="text" value="" size="30"/><br>
			    Your email:<br>
			    <input name="email" type="text" value="" size="30"/><br>
			    Your message:<br>
			    <textarea name="message" rows="7" cols="30"></textarea><br>
			    <input type="submit" value="Send email"/>
			    </form>
		<?php
			    } 
			else                /* send the submitted data */
    			{
			    $name=$_REQUEST['name'];
			    $email=$_REQUEST['email'];
			    $message=$_REQUEST['message'];
			    if (($name=="")||($email=="")||($message==""))
			        {
					echo "All fields are required, please fill <a href=\"\">the form</a> again.";
				    }
			    else {
				    $from="From: $name<$email>\r\nReturn-path: $email";
			        $subject="Message sent using your contact form";
					// mail("youremail@yoursite.com", $subject, $message, $from);
					echo "Email sent!";
			    }
		    }  
		?>
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