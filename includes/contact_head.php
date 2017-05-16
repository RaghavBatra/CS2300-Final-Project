<?php
/* Included at the head of every page.
 * Contains the html doctype declaration and head tag with meta data about the 
 * website */
session_start();
echo "<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Cornell Food Science Club</title>
    <meta name='description' content='Cornell Food Science Club'>
    <meta name='keywords' content='Cornell, Food, Science, Club'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='js/main.js'></script>
    <script src='js/lightbox-plus-jquery.js'></script>
    <script src='js/lightbox.js'></script>
    <script src='js/jquery.js'></script>
    <script src='js/jquery-1.11.1.js'></script>
	<script src='js/jquery.validate.js'></script>
	
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
    <link rel='stylesheet' href='css/lightbox.css'>
    
    <script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert('Thanks for reaching out! We\'ll get back to you as soon as possible.');
			document.commentForm.submit();
			location.reload();
		}
	});
	$().ready(function() {
		// validate the comment form when it is submitted
		$('#commentForm').validate();
	})	
	</script>
</head>"
?>