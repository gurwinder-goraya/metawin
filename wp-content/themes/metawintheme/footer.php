<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 */

?>
<footer class="footer">
    <div class="container">
        <div class="footer_other_pages text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/casino-hotel-white-logo.png" alt="" />
            <?php 
                wp_nav_menu(
                  array(
                    'theme_location' => 'footer',
                    'container_class' => 'footer_menu',
                    'menu_class' => 'list-unstyled pages_links',  
                  )
                );
            ?>
        </div>
        <div class="copyright text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/begamble-aware-logo.png" alt="Begamble Aware" />
            <p>© <script>var date = new Date(); document.write(date.getFullYear())</script> Top 10 Casinos Worldwide. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>