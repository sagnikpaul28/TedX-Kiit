<?php

/*
==============================================
Display the speakers in a grid system
==============================================
*/

function speakers_grid_display($atts, $content = null){

	$atts = shortcode_atts(
		array(
			'years' => array('2018', '2017', '2016')
		), $atts
	);

	$return_args[] = '<div id="section3">
			            <div class="animation-element slide slide-left testimonial">
			                <div class="row text-center">
			                    <h1 class="heading-1">Speakers</h1>
			                </div>
			            </div>
			            <div class="container gal-container">';

	$args = array(
		'post_type' => 'speakers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'year',
				'field' => 'name',
				'terms' => $atts['years']
			),
		),
	);

	$speakers_list = new WP_Query($args);

	if ($speakers_list->have_posts()):
		while ($speakers_list->have_posts()): $speakers_list->the_post();

			$return_args[] = '<div class="gal-item show_info">
                				<div class="box" style="background-image: url('.get_the_post_thumbnail_url(get_the_ID()).')">
			                        <div class="overlay">
			                            <div class="text">
			                                <span class="name">'.get_the_title().'</span>
			                                <br />
			                            </div>
			                        </div>
			                    </div>
			                </div>';

		endwhile;
	endif;

	$return_args[] = '</div></div>';

	$args = join($return_args);
	return $args;
}
add_shortcode('speakers-grid-display', 'speakers_grid_display');

/*
=============================================================
Display speakers with pop ups
=============================================================
*/

function speakers_popup($atts, $content = null){

	$atts = shortcode_atts(
		array(
			'years' => array('2018', '2017', '2016')
		), $atts
	);

	$return_args[] = '<div id="section3">
			            <div class="animation-element slide slide-left testimonial">
			                <div class="row text-center">
			                    <h1 class="heading-1">Speakers</h1>
			                </div>
			            </div>
			            <div class="container gal-container">';

	$args = array(
		'post_type' => 'speakers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'year',
				'field' => 'name',
				'terms' => $atts['years']
			),
		),
	);

	$speakers_list = new WP_Query($args);

	$i = 1;

	if ($speakers_list->have_posts()):
		while ($speakers_list->have_posts()): $speakers_list->the_post();

			$return_args[] = '<a href="#" data-target="#div'.$i.'" class="gal-item show_info">
			                    <div class="box" style="background-image: url('.get_the_post_thumbnail_url(get_the_ID()).')">
			                        <div class="overlay">
			                            <div class="text">
			                                <span class="name">'.get_the_title().'</span>
			                                <br />
			                            </div>
			                        </div>
			                    </div>
			                </a>';

			$i++;
		endwhile;
	endif;

	$return_args[] = '</div></div>';

	$speakers_list = new WP_Query($args);

	$i = 1;

	if ($speakers_list->have_posts()):
		while ($speakers_list->have_posts()): $speakers_list->the_post();
			$return_args[] = '<div id="div'.$i.'" class="show_speakers_info" style="display:none;">
					            <div class="profile-header-container">
					                <div class="profile-header-img">
					                    <img src="'.get_the_post_thumbnail_url(get_the_ID()).'" />
					                    <!-- badge -->
					                    <div class="profile-heading">
					                        <h3 class="heading-2">'.get_the_title().'</h3>
					                        <em>'.get_post_meta(get_the_ID(), "short-description", true).'</em>
					                    </div>
					                </div>
					            </div>
					            <div class="text-justify">
					                '.get_post_meta(get_the_ID(), "long-description", true).'
					            </div>
					        </div>';

			$i++;

		endwhile;
	endif;

	$return_args = join($return_args);

	return $return_args;

	
                
                
}
add_shortcode('speakers-popup', 'speakers_popup');

/*
====================================
Display the speakers in a list
====================================
*/

function list_speakers_shortcode($atts, $content = null){

	$atts = shortcode_atts(
		array(
			'years' => array('2018', '2017', '2016')
		), $atts
	);

	$return_arg[] = '<center><h1>'.get_the_title().'</h1></center><br>';

	$args = array(
		'post_type' => 'speakers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'year',
				'field' => 'name',
				'terms' => $atts['years']
			),
		),
	);

	$speakers_list = new WP_Query($args);
	$i = 1;

	if ($speakers_list->have_posts()):
		while ($speakers_list->have_posts()): $speakers_list->the_post();

			$return_arg[] = '<div class="row" style="padding: 15px;">
				                    <div class="col-md-3 col-xs-12" style="padding-top: 15px;">
				                        <img src="'.get_the_post_thumbnail_url(get_the_ID()).'" class="img-responsive" style="height:250px; width:100%;">
				                        <br>
				                    </div>
				                    <div class="col-md-9 text-justify">
				                        <h2 style="color: white;">'.get_the_title().' </h2>
				                        <p align="justify" style="color: white">'.get_post_meta(get_the_ID(), "long-description", true).'</p>
				                    </div>
				                </div>';

			$i++;

		endwhile;
	endif;

	$arg = join($return_arg);
	return $arg;

}
add_shortcode('speakers-list', 'list_speakers_shortcode');