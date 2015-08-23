<?php
    global $fivy_options;
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions" <?php language_attributes(); ?>>
<head>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title ('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,Comre - Coupon &amp; Offers Template">
    <meta name="description" content="Comre - Coupon &amp; Offers HTML Template">
    <meta name="author" content="M_Adnan">

    <!-- FONTS ONLINE -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font.css" rel="stylesheet" type="text/css">

    <!--MAIN STYLE-->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.4&appId=410330639051258";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Page Wrap ===========================================-->
<div id="wrap">

  <!--======= HEADER =========-->
  <header>
    <div class="container">
      <!--======= LOGO =========-->
      <div class="logo">
          <?php if (isset($fivy_options['logo']['url'])): ?>
          <a href="#."><img src="<?php echo esc_url( $fivy_options['logo']['url'] ); ?>" alt=""></a>
          <?php endif; ?>
          <div class="fb-like" data-href="<?php echo $fivy_options["header_fb_like"]?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
      </div>
    </div>

    <!--======= NAV =========-->
    <?php fivy_menu( 'fivy-menu' ); ?>
<!--    <nav>
      <div class="container">

        ======= MENU START =========
        <ul class="ownmenu"><li style="display: none;" class="showhide"><span class="title"></span><span class="icon fa fa-bars"></span></li>
          <li style="" class="active"><a href="http://wpmines.com/demos/comre/index.html">HOME<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
          <li style=""><a href="http://wpmines.com/demos/comre/03-About-Us.html">SCHREEUW EN WIN!</a></li>
          <li style=""><a href="http://wpmines.com/demos/comre/07-By-Stores.html">WORD SPONSOR</a></li>
          <li style=""><a href="http://wpmines.com/demos/comre/04-coupons.html">OVER ONS</a> </li>
          <li style=""><a href="<?php echo site_url('contact'); ?>">CONTACT</a> </li>
        </ul>
      </div>
    </nav>-->
  </header>