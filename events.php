<?php include 'includes/head.php' ?>

<body>

    <?php 
        require_once 'config.php';
        include 'includes/navbar.php';
        $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
    ?>

    <div id='banner_wrapper' class='section_wrapper'>
        <!-- Image adapted from http://www.icfsne.com/2016/home -->
        <img src='images/banner.jpg' alt='banner'>
    </div>

    <div id='welcome_wrapper' class='section_wrapper'>
        <h2>Check out our calendar of events!</h2>

		<iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_0nicem4o3b27rf2hm9fdks8oj4%40group.calendar.google.com&ctz=America/New_York" 
		style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
		</iframe>
		
	</div>
	
	<div id="companies_wrapper" class='company_wapper'>
        <h2>Click Below View Relevant Information From Any of Our Partner Companies!</h2>
        <div class='table_row'>
            <div class='prof_wrapper'>
				<a href = 'http://www.mars.com/global/science-and-innovation/science/food-safety'> 
					<img src = 'images/Mars_grey.jpg' alt = 'Mars'> 
					<img src = 'images/Mars_orange.png' alt = 'Mars' class = 'hide'> 
				</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.mondelezinternational.com/well-being'> 
            		<img src='images/mondelez_grey.jpg' alt='Mondelez'>
            		<img src='images/mondelez_orange.jpg' alt='Mondelez' class = 'hide'>
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'https://www.hersheys.com/en_us/simple-ingredients.html'> 
            		<img src='images/hershey_grey.jpg' alt='Hershey's'> 
            		<img src='images/hershey_orange.jpg' alt='Hershey's' class = 'hide'>
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.pepsico.com/live/content/type/story'> 
            		<img src='images/pepsico_grey.jpg' alt='PepsiCo'> 
            		<img src='images/pepsico_orange.png' alt='PepsiCo' class = 'hide'> 
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.kraftheinzcompany.com/sustainability.html'> 
    	        	<img src='images/Kraft_grey.jpg' alt='KraftHeinz'> 
      		      	<img src='images/Kraft_orange.png' alt='KraftHeinz' class = 'hide'> 
            	</a>
            </div>
     	   <div class='prof_wrapper'>
     	   		<a href = 'http://www.anheuser-busch.com/newsroom.html'> 
     	   			<img src='images/Busch_grey.jpg' alt='Anheuser Busch'> 
     	   			<img src='images/Busch_orange.jpg' alt='Anheuser Busch' class = 'hide'> 
     	   		</a>
        	</div>
            <div class='prof_wrapper'>
            	<a href = 'https://www.walmart.com/store/5240/whats-new'> 
            		<img src='images/walmart_grey.jpg' alt='Walmart'> 
            		<img src='images/walmart_orange.jpg' alt='Walmart' class = 'hide'> 
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://ithacabeer.com/news/'> 
            		<img src='images/Beer_grey.png' alt='Ithaca Beer Co'> 
            		<img src='images/Beer_orange.png' alt='Ithaca Beer Co' class = 'hide'> 
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'https://ithacahummus.com/press/'> 
            		<img src='images/hummus_grey.png' alt='Ithaca Hummus'> 
            		<img src='images/hummus_orange.png' alt='Ithaca Hummus' class = 'hide'> 
            	</a>
            </div>
        </div>
    </div>

	<div id='alt_footer' class='section_wrapper'>
        <div id='credits_wrapper'>
            <p>&copy; 2017 Cornell Food Science | cufoodsci@cornell.edu</p>
        </div>
            
        <div id='login_wrapper'>
            <div id='login_button'><a href="">Login</a></div>
        </div>
    </div>

    <!--
        /* Google calendar plugin supports list, day, week, and month views */
        iframe:
            Google calendar

        /* jQuery code for onclick events */
        if event clicked then
            connect to database
            query the database for event with same title and date as selected event
            display information on that event
    -->
</body>
</html>