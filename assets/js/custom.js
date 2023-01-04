var MyNamespace = {
    scrollToTop: function () {
        // add click event listener to button and scroll to top
        document.getElementById('scroll-to-top-button').addEventListener('click', function() {
         window.scrollTo({ top: 0, behavior: 'smooth' });
        });
  
    },
    toggleCard: function(){
        // Get the child element
        $(function(){
            $('.card-open').click(function(){
                var $this = $(this);
                $(this).parents('.featured-events__card').addClass('is-open');
                 $("html, body").animate({ scrollTop: $this.parents('.featured-events__card').offset().top - 58}, 0);
            });
            $('.featured-events__card-close').click(function(){
                var $this = $(this);
                $(this).parents('.featured-events__card').removeClass('is-open');
            });
        });

    }
};

MyNamespace.scrollToTop();
MyNamespace.toggleCard();