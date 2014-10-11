<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package harunaluna_na
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
                
				<?php
				    if (get_the_ID() == get_page_by_title('Login')->ID || get_the_ID() == get_page_by_title('Register')->ID) {
				        // No comments allowed on login/register pages
				    } else {
    					// If comments are open or we have at least one comment, load up the comment template
    					if ( comments_open() || '0' != get_comments_number() ) :
    						comments_template();
    					endif;
    				}
				?>

			<?php endwhile; // end of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>