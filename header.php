<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package harunaluna_na
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/crescentmoon_favicon.ico">
        
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap-3.2.0-dist/css/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap-3.2.0-dist/css/bootstrap-theme.css">
        
        <script type="text/javascript">
            //var temp_url = '<?php bloginfo("template_url"); ?>';
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.color-2.1.2.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/harunaluna_eventcal.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/harunaluna_discography.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/bootstrap-3.2.0-dist/js/bootstrap.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <?php
            
            // Main Script
            wp_enqueue_script('harunaluna_home', '' . get_bloginfo('template_url') . '/js/harunaluna_home.js' );
            
            $params = array(
                temp_url => get_bloginfo('template_url')
            );
            
            wp_localize_script( 'harunaluna_home', 'params', $params );
            
        ?>
        
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'harunaluna_na' ); ?></a>
            
            <header id="masthead" class="site-header navbar" role="banner">
                
                <div id="banner-container">
                    <canvas id="banner"></canvas>
                </div>
                
                <div class="site-branding">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <p class="site-subtitle">A North America Fan Portal for 春奈るな (Haruna Luna)</p>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                </div>
                
                <div class='navbtns'>
                    <ul class="nav navbar-nav left-nav">
                        <!-- Home Page-->
                        <?php if ( is_home() || is_front_page() ) { ?>
                            <li class="welcome-jump active">
                                <a>Welcome</a>
                            </li>
                            <li class="jump-link">
                                <a href="#news-top" onclick="return false">News</a>
                            </li>
                            <li class="jump-link">
                                <a href="#blog-top" onclick="return false">Blog</a>
                            </li>
                            <li class="jump-link">
                                <a href="#wiki-top" onclick="return false">Wiki</a>
                            </li>
                            <li class="jump-link">
                                <a href="#events-top" onclick="return false">Events</a>
                            </li>
                        <!-- Wiki -->
                        <?php } else if( get_post_type( get_the_ID() ) == 'incsub_wiki' ) { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>

                            <?php if( get_the_ID() == get_page_by_title('Wiki Home', OUTPUT, 'incsub_wiki')->ID ) { ?>
                                <li class="active">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Wiki Home', OUTPUT, 'incsub_wiki')->ID; ?>"><?php echo get_the_title(); ?></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Wiki Home', OUTPUT, 'incsub_wiki')->ID; ?>">Wiki Home</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo $_SERVER["REQUEST_URI"] ?>"><?php echo get_the_title(); ?></a>
                                </li>
                            <?php } ?>
                        <!-- All Posts -->
                        <?php } else if( get_the_ID() == get_page_by_title('All Posts')->ID ) { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('All Posts')->ID; ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <!-- Event listing -->
                        <?php } else if( get_the_ID() == get_page_by_title('Events')->ID ) { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Events')->ID; ?>">Events</a>
                            </li>
                        <!-- Events -->
                        <?php } else if ( get_post_type( get_the_ID() ) == 'event' ) { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('Events')->ID; ?>">Events</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo $_SERVER["REQUEST_URI"] ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <!-- Other queries -->
                        <?php } else if ( get_post_type( get_the_ID() ) == 'page' ) { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('All Posts')->ID; ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Welcome</a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>?page_id=<?php echo get_page_by_title('All Posts')->ID; ?>">All Posts</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo $_SERVER["REQUEST_URI"] ?>">
                                    <?php if( is_category() ) {
                                        echo single_cat_title('', false);
                                    } else if ( is_author() ) {
                                        printf( __( '%s', 'harunaluna_na' ), get_the_author() );  
                                    } else if ( is_day() ) {
                                        printf( __( '%s', 'harunaluna_na' ), get_the_date() );
                                    } else if ( is_month() ) {
                                        printf( __( '%s', 'harunaluna_na' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'harunaluna_na' ) ) );
                                    } else if ( is_year() ) {
                                        printf( __( '%s', 'harunaluna_na' ), get_the_date( _x( 'Y', 'yearly archives date format', 'harunaluna_na' ) ) );
                                    } else {
                                        echo mb_substr(get_the_title(), 0, 16); echo "...";
                                    } ?>
                                </a>
                            </li>
                            <!--
                            <nav id="site-navigation" class="main-navigation" role="navigation">
                                <button class="menu-toggle"><?php _e( 'Primary Menu', 'harunaluna_na' ); ?></button>
                                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                            </nav><!-- #site-navigation -->
                        <?php } ?>
                        <li>
                            <a class="bg-viewer" href="#bg-view"><i>View background art...</i></a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav right-nav">
                        <li class="img-link mobile-only-menu">
                            <div class="menu-icon mobile-only-menu">
                                <a class="mobile-menu-toggle"></a>
                            </div>
                        </li>
                        <li class="img-link">
                            <div class="twitter-img">
                                <a href="#twitter-top"><img width="25px" height="25px" src="<?php bloginfo('template_url'); ?>/img/twitter-icon.png"></img></a>
                            </div>
                        </li>
                        <li class="img-link">
                            <div class="fb-img">
                                <a href="https://www.facebook.com/harunalunaofficial/timeline"><img width="25px" height="25px" src="<?php bloginfo('template_url'); ?>/img/fb-icon.png"></img></a>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </header><!-- #masthead -->

                <div class="container-fluid">
                    <div id="bg-container">
                        <canvas id="background"></canvas>
                    </div>
                    <div id="content" class="site-content col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        
                        