document.addEventListener('DOMContentLoaded', function() {
    let sidenav = document.querySelectorAll('.sidenav');
    let instancia_sidenav = M.Sidenav.init(sidenav,{});
    let dropdowns = document.querySelectorAll('.dropdown-trigger');
    let instancia_dropwdown = M.Dropdown.init(dropdowns,{
    hover:false});
  });
  document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.parallax');
      var instances = M.Parallax.init(elems);
  });


  $(document).ready(function(){

    $('.carousel').carousel({fullWidth:true}).css("height", $(window).height());

    // for next slide
    $('.next').click(function(){
      $('.carousel').carousel('next');
    });

      // for prev slide
      $('.prev').click(function(){
      $('.carousel').carousel('prev');
    });

    $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                indicators: true
              });
  });
