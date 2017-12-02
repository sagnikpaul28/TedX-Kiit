<?php 
/*
Template Name: Sponsors Page
*/

get_header(); ?>

<div id="section1">
    <div class="animation-element slide slide-left testimonial">
        <div class="row text-center">
            <h1 class="heading-1">Sponsors</h1>
        </div>
    </div>
    <div class="col-md-12" style="padding: 0;">
        <div class="col-md-12 slider" style="padding: 20px 0;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo wp_get_attachment_url(31); ?>" alt="Los Angeles" class="img-responsive ht carousel-image">
                    </div>
                    <div class="item">
                        <img src="<?php echo wp_get_attachment_url(31); ?>" alt="Chicago" class="img-responsive ht carousel-image">
                    </div>
                    <div class="item">
                        <img src="<?php echo wp_get_attachment_url(31); ?>" alt="New York" class="img-responsive ht carousel-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>