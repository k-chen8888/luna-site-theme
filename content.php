<?php
/**
 * @package harunaluna_na
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header p<?php the_ID(); ?>">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
        
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php harunaluna_na_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
    
    <div class="thumb-content p<?php the_ID(); ?>" style="float: right">
        <?php if(has_post_thumbnail()) {
            the_post_thumbnail();
        } else {
            // Nothing
        } // End of post thumbnail
        ?>
    </div><!-- .thumb-content -->
    
	<div class="entry-content p<?php the_ID(); ?>">
		<?php /*the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'harunaluna_na' ) ); */
             echo mb_substr(get_the_content(), 0, 256); echo sprintf( '<a href="%s">', esc_url( get_permalink() ) ); echo '[...]</a>';
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'harunaluna_na' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'harunaluna_na' ) );
				if ( $categories_list && harunaluna_na_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'harunaluna_na' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>
            
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'harunaluna_na' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'harunaluna_na' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type()
		?>
        <!-- Load featured image -->
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'harunaluna_na' ), __( '1 Comment', 'harunaluna_na' ), __( '% Comments', 'harunaluna_na' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'harunaluna_na' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->