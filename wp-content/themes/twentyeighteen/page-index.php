		<?php
		/*
		Template Name: Index Page
		*/
		?>

		<?php
		get_header();
		?>


		<div id="section1">
		    <div class="col-md-12" style="padding: 0;">
		        <div class="col-md-12 slider" style="padding: 20px 0;">
		            <div id="myCarousel" class="carousel slide" data-ride="carousel">
		                <div class="carousel-inner">
		                    <div class="item active">
		                        <img src="<?php echo wp_get_attachment_url( 31 ); ?>" alt="Los Angeles" class="img-responsive ht carousel-image">
		                    </div>
		                    <div class="item">
		                        <img src="<?php echo wp_get_attachment_url( 31 ); ?>" alt="Chicago" class="img-responsive ht carousel-image">
		                    </div>
		                    <div class="item">
		                        <img src="<?php echo wp_get_attachment_url( 31 ); ?>" alt="New York" class="img-responsive ht carousel-image">
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<!--Section2 coding-->
		<div id="section2">
		    <div class="animation-element slide slide-left testimonial">
		        <div class="row text-center">
		            <h1 class="heading-1">Events</h1>
		        </div>
		    </div>
		    <div class="col-md-12 contentNextOne">
		        <div class="row">
		            <a class="col-md-6 part1" style="background-image: url('<?php echo wp_get_attachment_url( 47 ); ?>');" href="#">
		                <div class="divider" >
		                    <div class="animation-element slide slide-left testimonial">
		                        <div class="content">
		                            <img src="<?php echo wp_get_attachment_url( 32 ); ?>" width="100%"><br>
		                        </div>
		                    </div>
		                </div>
		            </a>
		            <a class="col-md-6 part2" style="background-image: url('<?php echo wp_get_attachment_url( 47 ); ?>');" href="#">
		                <div class="divider">
		                    <div class="animation-element slide slide-right testimonial">
		                        <div class="content">
		                            <img src="<?php echo wp_get_attachment_url( 32 ); ?>" width="80%"><br>
		                        </div>
		                    </div>
		                </div>
		            </a>
		        </div>
		    </div>
		</div>

        <?php
        if (have_posts()):
            while(have_posts()): the_post();
                the_content();
            endwhile;
        endif; 
        ?>

        
	<?php
	get_footer();
	?>