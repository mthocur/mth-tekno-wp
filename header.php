<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true);
    } else {
        bloginfo('name'); echo " - "; echo get_option('mth_seodescription');
    }
    ?>" />
    <meta name="keywords" content="<?php echo get_option('mth_seokeyword'); ?>">
    <meta name="author" content="<?php echo get_option('mth_seoauthor'); ?>">
    <link href="<?php echo get_option('mth_publisher'); ?>" rel="publisher" />
    <link rel="shortcut icon" href="<?php echo get_option('mth_favicon'); ?>" type="image/x-icon" />

    <title><?php echo get_option('mth_seotitle'); ?><?php wp_title(); ?></title>

    <script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script> <!-- Modernizr -->

    <!-- CSS reset -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Material Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" id="font-source-sans-pro-css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C300%2C600%2C700%2C400italic&amp;subset=latin%2Clatin-ext&amp;ver=4.5.3" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap-material/bootstrap-material-design.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/ripples/ripples.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/scrolling-nav/scrolling-nav.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/mega-dropdown.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php echo get_option('mth_customhead'); ?>


<?php wp_head(); ?>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="<?php echo join(' ', get_body_class()).PHP_EOL; ?>">

    <!-- Top Line -->
        <?php get_template_part( 'inc/top-line' ); ?>
    <!-- Top Line -->
    <div class="clearfix"></div>
    <!-- Navigation -->
        <?php get_template_part( 'inc/navigation' ); ?>
    <!-- Navigation -->
    <div class="clearfix"></div>
