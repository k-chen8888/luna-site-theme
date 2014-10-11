<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package harunaluna_na
 */
?>
    
        <footer id="colophon" class="site-footer" role="contentinfo">
            <hr />
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'harunaluna_na' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'harunaluna_na' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( __( 'Theme: %1$s by %2$s.', 'harunaluna_na' ), 'harunaluna_na', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
            </div><!-- .site-info -->
        </footer><!-- #colophon -->
    </div><!-- #page -->

    <?php wp_footer(); ?>

    </body>
</html>
