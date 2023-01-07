<?php
$banner_logo = get_field("banner")['banner_logo'];
$banner_title = get_field("banner")['banner_title'];
$banner_vimeo_image = get_field("banner")['banner_vimeo_image'];
$banner_vimeo_url = get_field("banner")['banner_vimeo_url'];
$banner_subtitle = get_field("banner")['banner_subtitle'];
?>



<!-- BANNER STARTS -->
<div class="banner">
  <div class="container">
    <?php
    if ($banner_logo) : ?>
      <img src="<?php echo esc_url($banner_logo['url']); ?>" alt="<?php echo esc_attr($banner_logo['alt']); ?>" />
    <?php endif; ?>

    <?php
    if (isset($banner_title)) {
      echo sprintf(' <h1 class="banner__title">%s</h1>', $banner_title);
    }
    ?>

  </div>

  <div class="banner__green">
    <div class="container">
      <a data-fancybox href="<?php echo $banner_vimeo_url; ?>">
        <?php
        if ($banner_vimeo_image) : ?>
          <img src="<?php echo esc_url($banner_vimeo_image['url']); ?>" alt="<?php echo esc_attr($banner_vimeo_image['alt']); ?>" />
        <?php endif; ?>

        <img class="banner__play" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Action Button.svg" alt="action-btn" />
      </a>

      <div class="banner__content">
        <?php
        if (isset($banner_subtitle)) {
          echo sprintf('<p>%s</p>', $banner_subtitle);
        }
        ?>
      </div>
      <img id="scroll-to-top-button" class="banner__goUp" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/go-up.svg" alt="go-up" />
    </div>
  </div>
</div>
<!-- BANNER ENDS -->