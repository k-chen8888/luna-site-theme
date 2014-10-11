<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package harunaluna_na
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="sidebar" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div id="secondary" class="widget-area col-xs-12 col-sm-12 col-md-12 col-lg-12 fixed-semi-trans" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
    
    <div id="twitter" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fixed-semi-trans">
        <a class="anchor" id="twitter-top"></a>
        <h1 class="anchor_sub_title">
            <a class="page-hard-link" href="https://twitter.com/luna_galaxy">Luna's Twitter</a>
        </h1>
        
        <br />
        <a class="twitter-timeline" href="https://twitter.com/luna_galaxy" data-widget-id="497006646774624256">Tweets by @luna_galaxy</a>

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    
</div>