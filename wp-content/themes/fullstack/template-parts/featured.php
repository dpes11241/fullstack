<!-- FEATURED STARTS -->
<section class="featured-events" id="featured-events">
    <div class="container">
        <div class="featuredEvents__nav">
            <div class="featuredEvents__left">
                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M41.0933 44.24L28.88 32L41.0933 19.76L37.3333 16L21.3333 32L37.3333 48L41.0933 44.24Z"
                        fill="#062360" />
                </svg>
            </div>
            <div class="featuredEvents__right">
                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22.9067 19.76L35.12 32L22.9067 44.24L26.6667 48L42.6667 32L26.6667 16L22.9067 19.76Z"
                        fill="#062360" />
                </svg>
            </div>
        </div>
        <h2 class="featured-events__title">Featured Events</h2>
        <div class="featured-events__cards">


            <?php

      // Display featured event in template
      function display_featured_event() {
        $featured_event_query = new WP_Query( array(
            'post_type' => 'event',
            'meta_key' => 'featured_event',
            'meta_value' => 1,
            'posts_per_page' => 4 // Show only 4 featured events
        ) );
        if ( $featured_event_query->have_posts() ) {
            while ( $featured_event_query->have_posts() ) {
                $featured_event_query->the_post();
                // Display featured event using template tags
                ?>

            <div class="featured-events__item">
                <div class="featured-events__card">
                    <div class="featured-events__front">
                        <?= the_post_thumbnail(); ?>

                        <?php echo "<h3 class='featured-events__card-title'>" . get_the_title() . "</h3>"; ?>
                    
                        <div class="featured-events__card-open">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/card-plus.svg"
                                alt="card-plus" class="card-open" />
                        </div>
                    </div>
                    <div class="featured-events__back">
                        <?= the_content(); ?>
                        <a href="javascript:void(0);"
                            class="site-btn site-btn__orange featured-events__card-cta">Shorter CTA Text</a>
                        <div class="featured-events__card-close">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/card-close.svg"
                                alt="card-close" />
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            wp_reset_postdata();
        }
      }

      display_featured_event();

      ?>





        </div>
        <div class="text-center">
            <a href="assets/files/dummy.pdf" download class="site-link">
                Download our campaign deck to learn more
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.6666 15.8333C16.6666 16.2935 16.2935 16.6666 15.8333 16.6666H4.16665C3.70641 16.6666 3.33331 16.2935 3.33331 15.8333C3.33331 15.3731 3.70641 15 4.16665 15H15.8333C16.2935 15 16.6666 15.3731 16.6666 15.8333ZM9.41073 13.1934C9.57347 13.3562 9.7867 13.4375 9.99998 13.4375C10.2132 13.4375 10.4265 13.3561 10.5892 13.1934L13.5418 10.2409C13.8672 9.91545 13.8672 9.38782 13.5418 9.06238C13.2163 8.73693 12.6887 8.73693 12.3633 9.06238L10.8333 10.5923V4.16665C10.8333 3.70641 10.4602 3.33331 9.99998 3.33331C9.53975 3.33331 9.16665 3.70641 9.16665 4.16665V10.5923L7.6367 9.06238C7.31126 8.73693 6.78363 8.73693 6.45818 9.06238C6.13274 9.38782 6.13274 9.91545 6.45818 10.2409L9.41073 13.1934Z"
                        fill="#EE5A46" />
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- FEATURED ENDS -->