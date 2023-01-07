<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fullstack
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrap">
 <!-- HEADER STARTS -->
 <nav class="menu">
        <div class="container">
          <a class="menu__logo" href="javascript:void(0);">
            <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/logo.svg" alt="" />
          </a>

          <div class="menu_mobileTrigger">
            <svg width="95" height="24" viewBox="0 0 95 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <text style="
              font-size: 10px;
              transform: translate(10px, 1px);
            " id="active-menu" x="0" y="15" fill="#97DAEB">Why Elevate</text>
              
              <path id=""fill-rule="evenodd" clip-rule="evenodd" d="M76.9419 9.55816L81.5 14.1163L86.0581 9.55816L86.9419 10.4419L81.5 15.8838L76.0581 10.4419L76.9419 9.55816Z" fill="#97DAEB"/>
              <path d="M0.5 12C0.5 5.64873 5.64873 0.5 12 0.5H83C89.3513 0.5 94.5 5.64873 94.5 12C94.5 18.3513 89.3513 23.5 83 23.5H12C5.64872 23.5 0.5 18.3513 0.5 12Z" stroke="#97DAEB"/>
              </svg>
          </div>
          <ul class="menu__list">
            <li class="menu__item">
              <a
                class="menu__link menu__link--active"
                href="javascript:void(0);"
                >Why Elevate</a
              >
            </li>
            <li class="menu__item">
              <a class="menu__link" href="javascript:void(0);">Plan Pillars</a>
            </li>
            <li class="menu__item">
              <a class="menu__link" href="javascript:void(0);">Latest News</a>
            </li>
            <li class="menu__item">
              <a class="menu__link" href="javascript:void(0);">Campaign</a>
            </li>
          </ul>

		  <?php 
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'menu-1',
			// 		'menu_id'        => 'primary-menu',
			// 	)
			// );
			?>
        </div>
      </nav>

      <!-- HEADER ENDS -->
			