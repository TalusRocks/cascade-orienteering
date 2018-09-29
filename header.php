<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

    <title>
      <?php wp_title( '|', true, 'right'); ?>
      <?php bloginfo( 'name' ); ?>
    </title>

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <!-- <link href="css/carousel.css" rel="stylesheet"> -->

    <?php wp_head(); ?>

  </head>

<body <?php body_class(); ?>>

  <!-- Google Analytics-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-77400913-1', 'auto');
    ga('send', 'pageview');

  </script>

  <div class="content">
    <div class="container">
      <div class="col-lg-10 col-lg-offset-1"> <!-- Sets the inner white area -->
      
      <header>
        <div class="row sm-mrg-bottom" id="top">
          <div class="col-lg-2 col-xs-12 col-sm-4" id="no-pad">
            <a href="<?php echo site_url();?>">
              <img id="logo-top-left" class="hidden-xs" src="<?php echo get_stylesheet_directory_uri(); ?>/images/COC-logo-diamond-red.png" alt="<?php echo get_bloginfo('name')?>" />
            </a>
          </div>
          <div class="col-lg-6 col-lg-offset-4 col-sm-8 col-md-6 col-md-offset-2 md-mrg-top hidden-xs" id="no-pad">
            <ul class="nav nav-justified" id="top-nav">
              <li><a href="<?php echo get_permalink(111); ?>">About</a></li>
              <li><a href="<?php echo get_permalink(113); ?>">Contact</a></li>
              <li><a href="http://register.wiol.org/">WIOL (School) Registration</a></li>
              <li><a href="http://register.cascadeoc.org/">General Registration</a></li>
            </ul>
          </div>
        </div>
      </header>


<!-- =====GLOBAL NAVIGATION===== -->
<div class="row">
  <nav class="navbar navbar-default navbar-inverse shadow" role="navigation">
    <div class="navbar-header">

      <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo site_url();?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/COC-logo-diamond-white-xs.png" alt="<?php echo get_bloginfo('name')?>" />
      </a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="collapse">
		<?php
          $args = array(
            'menu'  =>  'main-nav-menu',
            'menu_class'  => 'nav navbar-nav',
            'container' =>  'false',
            );
          wp_nav_menu( $args );
        ?>    
    </div>  
  </nav>
</div> <!-- end global navigation row -->
