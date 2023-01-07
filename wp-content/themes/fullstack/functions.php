<?php

/**
 * fullstack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fullstack
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fullstack_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fullstack, use a find and replace
		* to change 'fullstack' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('fullstack', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'fullstack'),
        )
    );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'fullstack_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'fullstack_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fullstack_content_width()
{
    $GLOBALS['content_width'] = apply_filters('fullstack_content_width', 640);
}
add_action('after_setup_theme', 'fullstack_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fullstack_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'fullstack'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'fullstack'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'fullstack_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fullstack_scripts()
{
    wp_enqueue_style('fullstack-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css', array(), _S_VERSION);
    wp_enqueue_style('fullstack-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(), _S_VERSION);
    wp_enqueue_style('fullstack-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), _S_VERSION);
    wp_enqueue_style('fullstack-fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), _S_VERSION);
    wp_enqueue_style('fullstack-style', get_stylesheet_uri(), array(), _S_VERSION);

    // wp_enqueue_script( 'fullstack-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script('fullstack-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('fullstack-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('fullstack-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('fullstack-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array(), _S_VERSION, true);
    wp_enqueue_script('fullstack-customJs', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'fullstack_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}




// Register custom post type for events
function register_event_post_type()
{
    $labels = array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'add_new' => 'Add New Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
        'not_found' => 'No events found',
        'not_found_in_trash' => 'No events found in Trash',
        'parent_item_colon' => 'Parent Event:',
        'menu_name' => 'Events'
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Custom post type for events',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('event', $args);
}
add_action('init', 'register_event_post_type');


// Register custom field for featured event
function register_featured_event_meta_box()
{
    add_meta_box('featured_event_meta_box', 'Featured Event', 'display_featured_event_meta_box', 'event', 'side', 'high');
}
add_action('add_meta_boxes', 'register_featured_event_meta_box');


// Display custom field for featured event
function display_featured_event_meta_box($event)
{
    $featured_event = get_post_meta($event->ID, 'featured_event', true);
?>
    <input type="checkbox" name="featured_event" value="1" <?php checked($featured_event, 1); ?> />
    <label for="featured_event">Feature this event</label>
    <?php
}

// Save value of custom field for featured event
function save_featured_event_meta($post_id)
{
    if (isset($_POST['featured_event'])) {
        update_post_meta($post_id, 'featured_event', 1);
    } else {
        update_post_meta($post_id, 'featured_event', 0);
    }
}
add_action('save_post', 'save_featured_event_meta');



// Shortcode to display event search form and results
function event_search_shortcode($atts)
{
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'limit' => 10, // Default value for limit attribute
    ), $atts);

    // Create search form
    $form = '<form role="search" method="get" id="event-search-form" class="search-bar" action="' . home_url('/') . '" >
    <div class="search-bar__wrap">
    <label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
        <input class="search-bar__input" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Search Events') . '" />
        <input type="hidden" name="post_type" value="event" />
        <button class="search-bar__button" type="submit" value="' . esc_attr__('Search') . '">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M39.6322 37.5039L27.1903 25.063C29.4819 22.2816 30.7158 18.7798 30.674 15.1765C30.5875 6.88259 23.8428 0.116794 15.5524 0.00147404C6.99759 -0.116058 0 6.81005 0 15.339C0 23.8188 6.92001 30.7111 15.3994 30.6775C19.0965 30.6656 22.6637 29.313 25.4395 26.8707L37.8521 39.2833V39.2837C38.3435 39.7747 39.1396 39.7747 39.631 39.2837C39.8673 39.0478 40 38.7276 40 38.3938C40.0004 38.0601 39.8677 37.7398 39.6318 37.5039L39.6322 37.5039ZM15.6247 28.1583C8.32796 28.3193 2.35566 22.3489 2.51711 15.0507C2.6674 8.22198 8.21998 2.66955 15.0482 2.51963C22.3449 2.35869 28.3172 8.32902 28.1558 15.6273C28.0047 22.456 22.4537 28.0074 15.6247 28.1583Z" fill="#878787"></path>
        </svg>
      </button>
        </div>
    </form>';

    // Add container for search results
    $form .= '<div id="event-search-results"></div>';

    // Enqueue scripts and styles
    wp_enqueue_style('event-search-style', get_template_directory_uri() . '/event-search.css');
    wp_enqueue_script('event-search-script', get_template_directory_uri() . '/event-search.js', array('jquery'), '1.0', true);
    wp_localize_script('event-search-script', 'event_search_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'limit' => intval($atts['limit']),
    ));

    return $form;
}
add_shortcode('eventsearch', 'event_search_shortcode');



// Handle event search with AJAX
function event_search_ajax()
{
    // Check if request is valid
    if (!isset($_POST['s']) || !isset($_POST['paged'])) {
        wp_die();
    }

    // Query events
    $events_query = new WP_Query(array(
        'post_type' => 'event',
        's' => sanitize_text_field($_POST['s']),
        'posts_per_page' => intval($_POST['limit']),
        'paged' => intval($_POST['paged']),
    ));

    // Check if there are events
    if ($events_query->have_posts()) { ?> 
    <div class="featured-events__cards">
    <?php
        while ($events_query->have_posts()) : $events_query->the_post;
            $events_query->the_post(); ?>

            <!-- CARD STARTS -->
            <div class="featured-events__card">
                <div class="featured-events__front">
                    <?= the_post_thumbnail(); ?>
                    <?php echo "<h3 class='featured-events__card-title'>" . get_the_title() . "</h3>"; ?>
                    <div class="featured-events__card-open">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/card-plus.svg" alt="card-plus" class="card-open" />
                    </div>
                </div>
                <div class="featured-events__back">
                    <?= the_content(); ?>

                    <a href="javascript:void(0);" class="site-btn site-btn__orange featured-events__card-cta">Shorter CTA Text</a>
                    <div class="featured-events__card-close">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/card-close.svg" alt="card-close" />
                    </div>
                </div>
            </div>

            <!-- CARD ENDS -->
        <?php endwhile;

        // Check if there are more pages
        if ($events_query->max_num_pages > 1) : ?>
 <div id="event-search-pagination">
<nav class="pagination">
          <?php
            // Previous page link
            if ($events_query->query['paged'] > 1) : ?>
                <a href="#" class="pagination__link pagination__link--prev" data-paged="<?php echo $events_query->query['paged'] - 1; ?>">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" > <path fill-rule="evenodd" clip-rule="evenodd" d="M40 20C40 31.0458 31.0458 40 20 40C8.95417 40 0 31.0458 0 20C0 8.95417 8.95417 0 20 0C31.0458 0 40 8.95417 40 20ZM9.82143 18.8546C9.16713 19.5006 9.16992 20.5474 9.83073 21.1961L17.6949 28.9193C18.9523 30.1744 20.838 28.2924 19.5806 27.0377L14.3249 21.7977C14.0663 21.5396 14.157 21.3304 14.5239 21.3304H29.0239C29.7619 21.3304 30.3605 20.7398 30.3605 19.9999C30.3605 19.2647 29.7634 18.6689 29.0239 18.6689H14.5239C14.1552 18.6689 14.0673 18.4592 14.3249 18.202L19.5806 12.9616C20.838 11.7079 18.9524 9.82538 17.6949 11.08L9.82143 18.8546Z" fill="black" /> </svg>
            </a>
            <?php endif;
            ?>
         

          <div class="pagination__wrap">
          
          </div>
        
          <?php
            // Next page link
            if ($events_query->max_num_pages > $events_query->query['paged']) : ?>
                <a href="#" class="pagination__link pagination__link--next" data-paged="<?php echo $events_query->query['paged'] + 1; ?>">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" > <path fill-rule="evenodd" clip-rule="evenodd" d="M0 20C0 8.95417 8.95417 0 20 0C31.0458 0 40 8.95417 40 20C40 31.0458 31.0458 40 20 40C8.95417 40 0 31.0458 0 20ZM30.1786 21.1454C30.8329 20.4994 30.8301 19.4526 30.1693 18.8039L22.3051 11.0807C21.0477 9.82561 19.162 11.7076 20.4194 12.9623L25.6751 18.2023C25.9337 18.4604 25.843 18.6696 25.4761 18.6696H10.9761C10.2381 18.6696 9.63952 19.2602 9.63952 20.0001C9.63952 20.7353 10.2366 21.3311 10.9761 21.3311H25.4761C25.8448 21.3311 25.9327 21.5408 25.6751 21.798L20.4194 27.0384C19.162 28.2921 21.0476 30.1746 22.3051 28.92L30.1786 21.1454Z" fill="black" /> </svg>
        
            </a>
            <?php endif; ?>
         
        
        </nav>

        </div>
           
              

               
        <?php endif;
        wp_reset_postdata();
    }
    ?>
        </div>
    <?php
    wp_die();
}
add_action('wp_ajax_event_search_ajax', 'event_search_ajax');
add_action('wp_ajax_nopriv_event_search_ajax', 'event_search_ajax');



// Enqueue scripts and styles
function event_search_enqueue_scripts()
{
    wp_enqueue_style('event-search-style', get_template_directory_uri() . '/event-search.css');
    wp_enqueue_script('event-search-script', get_template_directory_uri() . '/event-search.js', array('jquery'), '1.0', true);
    wp_localize_script('event-search-script', 'event_search_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'event_search_enqueue_scripts');

// Handle event search pagination with AJAX
function event_search_pagination_ajax()
{
    // Check if request is valid
    if (!isset($_POST['s']) || !isset($_POST['paged']) || !isset($_POST['limit'])) {
        wp_die();
    }

    // Query events
    $events_query = new WP_Query(array(
        'post_type' => 'event',
        's' => sanitize_text_field($_POST['s']),
        'posts_per_page' => intval($_POST['limit']),
        'paged' => intval($_POST['paged']),
    ));

    // Check if there are events
    if ($events_query->have_posts()) {
        while ($events_query->have_posts()) : $events_query->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
<?php endwhile;
        wp_reset_postdata();
    }

    wp_die();
}
add_action('wp_ajax_event_search_pagination_ajax', 'event_search_pagination_ajax');
add_action('wp_ajax_nopriv_event_search_pagination_ajax', 'event_search_pagination_ajax');
