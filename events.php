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
        <h2>Check out our calendar of events or view relevant
	        information from any of our partner companies!</h2>

		<iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_0nicem4o3b27rf2hm9fdks8oj4%40group.calendar.google.com&ctz=America/New_York" 
		style="border: 0" width="800" height="600" frameborder="0" scrolling="no">
		</iframe>
		
	</div>
	
	<div id="companies_wrapper" class='company_wapper'>
        <div class='table_row'>
            <div class='prof_wrapper'>
				<a href = 'http://www.mars.com/global/science-and-innovation/science/food-safety'> 
					<img src = 'images/Mars_Grey.png' alt = 'Mars'> 
					<img src = 'images/Mars_Orange.png' alt = 'Mars' class = 'hide'> 
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
            		<img src='images/pepsico_orange.jpg' alt='PepsiCo' class = 'hide'> 
            	</a>
            </div>
            <div class='prof_wrapper'>
            	<a href = 'http://www.kraftheinzcompany.com/sustainability.html'> 
    	        	<img src='images/Kraft_Grey.png' alt='KraftHeinz'> 
      		      	<img src='images/Kraft_Orange.png' alt='KraftHeinz' class = 'hide'> 
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
            		<img src='images/Walmart_Grey.png' alt='Walmart'> 
            		<img src='images/Walmart_Orange.png' alt='Walmart' class = 'hide'> 
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

	<?php include 'includes/footer.php'; ?>
</body>
</html>