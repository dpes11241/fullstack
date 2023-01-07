var MyNamespace = {
  scrollToTop: function () {
    // add click event listener to button and scroll to top
    document
      .getElementById("scroll-to-top-button")
      .addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });
  },
  toggleCard: function () {
    // Get the child element
    $(function () {
      $(".card-open").click(function () {
        var $this = $(this);
        $(this).parents(".featured-events__card").addClass("is-open");
        $("html, body").animate(
          {
            scrollTop:
              $this.parents(".featured-events__card").offset().top - 58,
          },
          0
        );
      });
      $(".featured-events__card-close").click(function () {
        var $this = $(this);
        $(this).parents(".featured-events__card").removeClass("is-open");
      });
    });
  },
  slickSlider_News: function () {
    // Latest news slider
    var getNews_sliderElem =   $(".news-slider__items");
    getNews_sliderElem.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
    });

    // Goto previous slide
    $(".news-slider__left").click(function (e) {
      getNews_sliderElem.slick("slickPrev");
    });

    // Goto next slide
    $(".news-slider__right").click(function (e) {
      getNews_sliderElem.slick("slickNext");
    });

  },
  featuredEvents__cards: function(){
    var getSliderElem =  $("#featured-events .featured-events__cards");
    if( $(window).width() <= 1024 ){
      // Only trigger slider if not initialized to avoid error on resize
      if( !$('.featured-events__cards').hasClass('slick-initialized') ){
        getSliderElem.slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        });
      }
    }else{
      getSliderElem.slick('unslick');
    }

      // Goto previous slide
      $(".featuredEvents__left").click(function (e) {
        getSliderElem.slick("slickPrev");
      });
  
      // Goto next slide
      $(".featuredEvents__right").click(function (e) {
        getSliderElem.slick("slickNext");
      });
    
  },
  mobileToggle: function(){
      $('.menu_mobileTrigger').click(function(){
        $(this).toggleClass('is-open')
        $('.menu__list').slideToggle();
      })
  }
};

MyNamespace.scrollToTop();
MyNamespace.toggleCard();
MyNamespace.slickSlider_News();
MyNamespace.featuredEvents__cards();
// Trigger Slider Destroy and resize for featured events
window.addEventListener('resize', function(event){
  MyNamespace.featuredEvents__cards();
});
MyNamespace.mobileToggle();

