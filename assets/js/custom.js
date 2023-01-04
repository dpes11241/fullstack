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
  slickSlider: function () {
    // Latest news slider
    $(".news-slider__items").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
    });

    // Goto previous slide
    $(".news-slider__left").click(function (e) {
      $(".news-slider__items").slick("slickPrev");
    });

    // Goto next slide
    $(".news-slider__right").click(function (e) {
      $(".news-slider__items").slick("slickNext");
    });
  },
};

MyNamespace.scrollToTop();
MyNamespace.toggleCard();
MyNamespace.slickSlider();
