<?php

/*
===============================
Display all the speakers
===============================
*/

function speakers_list_shortcode(){

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
		'post_per_page' => 50
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
add_shortcode('speakers-list', 'speakers_list_shortcode');

/*
=============================================================
Display the modal for long description of the speakers
=============================================================
*/

function speakers_long_description(){

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
		'post_per_page' => 50
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
add_shortcode('speakers-long-descriptions', 'speakers_long_description');

/*
====================================
Display all the previos speakers
====================================
*/

function previous_speakers_shortcode(){

	$return_arg[] = '<center><h1>'.get_the_title().'</h1></center><br>';

	$args = array(
		'post_type' => 'speakers',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_per_page' => 50
	);

	$speakers_list = new WP_Query($args);
	$i = 1;

	if ($speakers_list->have_posts()):
		while ($speakers_list->have_posts()): $speakers_list->the_post();

			

			if ($i%2==1){
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
			}else{
				$return_arg[] = '<div class="row" style="padding: 15px;">
				                    <div class="col-md-9 text-justify">
				                        <h2 style="color: white;">'.get_the_title().' </h2>
				                        <p align="justify" style="color: white">'.get_post_meta(get_the_ID(), "long-description", true).'</p>
				                    </div>
				                    <div class="col-md-3 col-xs-12" style="padding-top: 15px;">
				                        <img src="'.get_the_post_thumbnail_url(get_the_ID()).'" class="img-responsive" style="height:250px; width:100%;">
				                        <br>
				                    </div>
				                    
				                </div>';
			}

			$i++;

		endwhile;
	endif;

	$arg = join($return_arg);
	return $arg;

			/*<div class="row" style="padding: 15px;">
                
                    <div class="col-md-3 col-xs-12">
                        <img src="'.wp_get_attachment_url(31).'" class="img-responsive" style="height:250px; width:100%;">
                        <br>
                    </div>
                    <div class="col-md-9 text-justify">
                        <h2 style="color: white;">Lorem Ipsum </h2>
                        <h5 style="color: white;">
                            Integer tempus finibus massa, ornare viverra nunc commodo ac. In pellentesque ex eu hendrerit maximus.
                        </h5>

                        <p align="justify" style="color: white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dolor tellus,
                            consequat accumsan accumsan id, tempus sed nisi. Cras a nisi auctor, pharetra dui vel, ornare justo.
                            Aenean varius elementum efficitur. Vestibulum rhoncus sagittis massa, nec aliquet orci dapibus a.
                            Aenean augue sem, faucibus sed lorem vel, feugiat pellentesque lacus. Etiam tincidunt, dolor sit amet
                            interdum convallis, nunc sapien pulvinar erat, venenatis vulputate nisl nisi in nisl. Aenean placerat
                            felis sed risus pulvinar convallis. Pellentesque euismod diam commodo lorem mattis, in pretium purus
                            aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                            Praesent molestie maximus metus eu volutpat. Nulla condimentum placerat facilisis. Proin non posuere magna.
                            Praesent pharetra elementum ultricies. Donec ultricies gravida est ac porta.
                        </p>
                    </div>

            </div>
            <div class="row" style="padding: 15px;">
                
                    <div class="col-md-3 col-xs-12" style="float: right;">
                        <img src="'.wp_get_attachment_url(31).'" class="img-responsive" style="height:250px; width:100%;">
                        <br>
                    </div>
                    <div class="col-md-9 text-justify">
                        <h2 style="color: white;">Lorem Ipsum </h2>
                        <h5 style="color: white;">
                            Integer tempus finibus massa, ornare viverra nunc commodo ac. In pellentesque ex eu hendrerit maximus.
                        </h5>

                        <p align="justify" style="color: white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dolor tellus,
                            consequat accumsan accumsan id, tempus sed nisi. Cras a nisi auctor, pharetra dui vel, ornare justo.
                            Aenean varius elementum efficitur. Vestibulum rhoncus sagittis massa, nec aliquet orci dapibus a.
                            Aenean augue sem, faucibus sed lorem vel, feugiat pellentesque lacus. Etiam tincidunt, dolor sit amet
                            interdum convallis, nunc sapien pulvinar erat, venenatis vulputate nisl nisi in nisl. Aenean placerat
                            felis sed risus pulvinar convallis. Pellentesque euismod diam commodo lorem mattis, in pretium purus
                            aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                            Praesent molestie maximus metus eu volutpat. Nulla condimentum placerat facilisis. Proin non posuere magna.
                            Praesent pharetra elementum ultricies. Donec ultricies gravida est ac porta.
                        </p>
                    </div>
                
            </div>
            <div class="row" style="padding: 15px;">
                
                    <div class="col-md-3 col-xs-12">
                        <img src="'.wp_get_attachment_url(31).'" class="img-responsive" style="height:250px; width:100%;">
                        <br>
                    </div>
                    <div class="col-md-9 text-justify">
                        <h2 style="color: white;">Lorem Ipsum </h2>
                        <h5 style="color: white;">
                            Integer tempus finibus massa, ornare viverra nunc commodo ac. In pellentesque ex eu hendrerit maximus.
                        </h5>
    
                        <p align="justify" style="color: white">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dolor tellus,
                            consequat accumsan accumsan id, tempus sed nisi. Cras a nisi auctor, pharetra dui vel, ornare justo.
                            Aenean varius elementum efficitur. Vestibulum rhoncus sagittis massa, nec aliquet orci dapibus a.
                            Aenean augue sem, faucibus sed lorem vel, feugiat pellentesque lacus. Etiam tincidunt, dolor sit amet
                            interdum convallis, nunc sapien pulvinar erat, venenatis vulputate nisl nisi in nisl. Aenean placerat
                            felis sed risus pulvinar convallis. Pellentesque euismod diam commodo lorem mattis, in pretium purus
                            aliquam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                            Praesent molestie maximus metus eu volutpat. Nulla condimentum placerat facilisis. Proin non posuere magna.
                            Praesent pharetra elementum ultricies. Donec ultricies gravida est ac porta.
                        </p>
                    </div>
                
            </div>
        </div>';
        */
}
add_shortcode('previous_speakers', 'previous_speakers_shortcode');