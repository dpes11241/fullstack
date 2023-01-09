<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fullstack
 */

?>

<!-- Footer block -->
<footer class="footer">
        <div class="container">
          <!-- Footer left block -->
          <div class="footer__left">
            <!-- Footer logo element -->
            <div class="footer__logo" data-aos="fade-up">
              <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/footer-logo.svg" alt="Company logo" />
            </div>
            <!-- Footer social links element -->
            <ul class="footer__social-links" data-aos="fade-up">
              <li class="footer__social-link">
                <a href="javascript:void(0);"
                  ><i class="fab fa-facebook-f"></i
                ></a>
              </li>
              <li class="footer__social-link">
                <a href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="footer__social-link">
                <a href="javascript:void(0);"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </li>
              <li class="footer__social-link">
                <a href="javascript:void(0);"
                  ><i class="fab fa-instagram"></i
                ></a>
              </li>
            </ul>
            <!-- Footer address element -->
            <div class="footer__address" data-aos="fade-up">
              247 West 35th Street, 8th Floor, New York, NY 10001
            </div>
            <!-- Footer mail link element -->
            <div class="footer__mail">
              <a href="mailto:info@ELeducation.org " >info@ELeducation.org</a
              >
            </div>
          </div>
          <!-- Footer right block -->
          <div class="footer__right" data-aos="fade-up">
            <div class="footer__right--content" >
              <!-- Footer title element -->
              <h3 class="footer__title">Join the movement</h3>
              <!-- Footer CTA element -->
              <div class="footer__cta">
                <a 
                  href="javascript:void(0);"
                  class="site-btn site-btn--nightSky"
                  >Lorem CTA Text</a
                >
              </div>
            </div>
          </div>
        </div>
      </footer>

      <!-- FOOTER ENDS -->
      </div>
<?php wp_footer(); ?>

</body>
</html>
