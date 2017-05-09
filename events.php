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
				<a href = 'http://www.mars.com/global/science-and-innovation/science/food-safety'> <img src = 'images/Mars.jpg' alt = 'Mars'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.mondelezinternational.com/well-being'> <img src='images/mondelez.jpg' alt='Mondelez'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'https://www.hersheys.com/en_us/simple-ingredients.html'> <img src='images/hershey.jpg' alt='Hershey's'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.pepsico.com/live/content/type/story'> <img src='images/pepsico.jpg' alt='PepsiCo'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.kraftheinzcompany.com/sustainability.html'> <img src='images/Kraft.jpg' alt='KraftHeinz'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://galbanicheese.com/our-cheeses/'> <img src='images/sorrento.jpg' alt='Sorrento'> </a>
            </div>
     	   <div class='prof_wrapper'>
     	   		<a href = 'http://www.anheuser-busch.com/newsroom.html'> <img src='images/Busch.jpg' alt='Anheuser Busch'> </a>
        	</div>
            <div class='prof_wrapper'>
            	<a href = 'https://www.walmart.com/store/5240/whats-new'> <img src='images/walmart.jpg' alt='Walmart'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://ithacabeer.com/news/'> <img src='images/Beer.jpg' alt='Ithaca Beer Co'> </a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'https://ithacahummus.com/press/'> <img src='images/hummus.jpg' alt='Ithaca Hummus'> </a>
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