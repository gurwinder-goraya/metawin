/* lazy load */
const observer = lozad();
observer.observe();

/* smooth scroll */
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $('.worldwide').offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    }
  });
});