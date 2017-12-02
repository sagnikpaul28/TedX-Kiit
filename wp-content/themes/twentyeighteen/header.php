<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset');  ?>">
        <title>  <?php bloginfo('name') ?> <?php wp_title('  |  '); ?> </title>
        <meta name='description' content="<?php bloginfo('description'); ?>">
        <?php wp_head(); ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand navbar-left" href="<?php echo get_home_url(); ?>" style="height: auto;max-width: 75%;">
                    <img src="<?php echo wp_get_attachment_url( 34 ); ?>" style="max-height: 50px;max-width: 100%;" class="img-responsive">
                </a>
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-right" style="padding: 15px;">
                    
                    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new Walker_Nav_Primary)); ?>
                    
                </div>
                
                
            </div>

        </nav>
        <div class="container">