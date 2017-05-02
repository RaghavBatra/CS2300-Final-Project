/* Enables smooth transition to anchors when using navigation bar.
 * Code adapted from http://www.w3schools.com/jquery/tryit.asp?filename=
 * tryjquery_eff_animate_smoothscroll 
 */
$(document).ready(function() {
  // Run the following when a link is clicked
  $("a").on('click', function(event) {
    if (this.hash !== '') {
      // Disables the default immediage transition to anchor
      event.preventDefault();
      var hash_code = this.hash;
      // Scrolls to anchor in 800 milliseconds
      $('html, body').animate( {
        scrollTop: $(hash_code).offset().top
      }, 800, function() {
        window.location.hash = hash_code;
      });
    }
  });

  $("#login_button").on('click', function(event) {
    event.preventDefault();
    alert("Temporarily not working! Please use the login form found in the navbar");
  });
});