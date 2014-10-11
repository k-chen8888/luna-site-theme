<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package harunaluna_na
 */
get_header(); ?>
        <div id="news" class="row">
            <a class="anchor" id="news-top"></a>
            
            <?php if( is_null( get_page_by_title('All News') ) == TRUE ) { ?>
                <h1 class="anchor_title"><abbr title="The news list is not ready yet!">News</abbr></h1>
            <?php } else { ?>
                <h1 class="anchor_title">
                    <a class="page-hard-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('All News')->ID; ?>">News</a>
                </h1>
            <?php } ?>
            <hr />
            
            <?php if ( is_active_sidebar( 'newsfeed-1' ) ) : ?>
                <div id="feed" class="newsfeed widget-area" role="complementary">
                    <?php dynamic_sidebar( 'newsfeed-1' ); ?>
                </div><!-- #primary-sidebar -->
	       <?php endif; ?>
        </div>
        
        <div id="primary" class="content-area row">
            <main id="main" class="site-main" role="main">
                <a class="anchor" id="blog-top"></a>
                <?php if( is_null( get_page_by_title('All Posts') ) == TRUE ) { ?>
                    <h1 class="anchor_title"><abbr title="The blog post list is not ready yet!">Blog</abbr></h1>
                <?php } else { ?>
                    <h1 class="anchor_title">
                        <a class="page-hard-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('All Posts')->ID; ?>">Blog</a>
                    </h1>
                    <hr />
                <?php } ?>
                
                <?php $i = 0; while ( have_posts() && $i < 5 ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                        $i++;
                    ?>

                <?php endwhile; ?>
            </main><!-- #main -->
            
        </div><!-- #primary -->
        
        <div id="wiki" class="row">
            <a class="anchor" id="wiki-top"></a>
            
            <?php if( is_null( get_page_by_title('Wiki Home', OUTPUT, 'incsub_wiki') ) == TRUE ) { ?>
                <h1 class="anchor_title"><abbr title="No wiki has been created yet!">Wiki</abbr></h1>
            <?php } else { ?>
                <h1 class="anchor_title">
                    <a class="page-hard-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Wiki Home', OUTPUT, 'incsub_wiki')->ID; ?>">Wiki</a>
                </h1>
            <?php } ?>
            <hr />
            
            <p>The wiki is an index of information, including Luna's <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Biography', OUTPUT, 'incsub_wiki')->ID; ?>">biography</a> and <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Discography', OUTPUT, 'incsub_wiki')->ID; ?>">discograpy</a>.</p>
        </div>
        
        <div id="events" class="row">
            <a class="anchor" id="events-top"></a>
            
            <h1 class="anchor_title">
                <a class="page-hard-link" href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Events')->ID; ?>">Events</a>
            </h1>
            <hr />
            
            <?php
                if (class_exists('EM_Calendar')) {
                    echo EM_Calendar::output( array('long_events'=>1, 'location'=>'1') );
                }
            ?>
        </div>
        
        <a id="bg-view"></a>
    </div><!-- #content -->
    
    <?php get_sidebar(); ?>
</div><!-- .container-fluid -->
<?php get_footer(); ?>
