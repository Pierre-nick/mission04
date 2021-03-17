<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'multi_sports_above_slider' ); ?>

	<?php if( get_theme_mod('multi_sports_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div class="slider-bg"></div>
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $multi_sports_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'multi_sports_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $multi_sports_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($multi_sports_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $multi_sports_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
					        	<div class="row">
						            <div class="col-lg-3 col-md-3">
							            <div class="slider-text">
							            	<div class="slider-inner-text">
								              	<h2><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
								              	<p><?php $multi_sports_excerpt = get_the_excerpt(); echo esc_html( multi_sports_string_limit_words( $multi_sports_excerpt,15 ) ); ?></p>
							              	</div>
							            </div>
							        </div>
					        		<div class="col-lg-9 col-md-9">
							        	<div class="slider-img">
							          		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?> "/></a>
							          	</div>
						            </div>
							    </div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			        <span class="screen-reader-text"><?php esc_html_e('Previous','multi-sports'); ?></span>
		      	</a>
		      	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			        <span class="screen-reader-text"><?php esc_html_e('Next','multi-sports'); ?></span>
		      	</a>
		  	</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('multi_sports_below_slider'); ?>

	<?php /*--- Our services ---*/ ?>
	<section id="our_service">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4">
			    	<?php $multi_sports_services_pages = array();
			      	$mod = intval( get_theme_mod( 'multi_sports_services_page' ));
			     	if ( 'page-none-selected' != $mod ) {
			        	$multi_sports_services_pages[] = $mod;
			      	}
			    	if( !empty($multi_sports_services_pages) ) :
			      	$args = array(
			        	'post_type' => 'page',
			        	'post__in' => $multi_sports_services_pages,
			        	'orderby' => 'post__in'
			      	);
			      	$query = new WP_Query( $args );
			     	if ( $query->have_posts() ) :
				        $count = 0;
				        while ( $query->have_posts() ) : $query->the_post(); ?>        	
				            <div class="service-page-box">
				            	<?php if (get_theme_mod('multi_sports_service_title','') != '') { ?>
				            		<strong><?php echo esc_html(get_theme_mod('multi_sports_service_title','')); ?></strong>
				            	<?php }?>
						      	<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
						      	<p><?php $excerpt = get_the_excerpt(); echo esc_html( multi_sports_string_limit_words( $excerpt,10 ) ); ?></p>
						      	<div class="service-btn">
				            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','multi-sports'); ?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php esc_html_e('Read More','multi-sports'); ?></span></a>
						       	</div>
						    </div>
				        <?php $count++; endwhile; 
				        wp_reset_postdata();?>
			      	<?php else : ?>
			          	<div class="no-postfound"></div>
			      	<?php endif;
			    	endif;?>
		      		<div class="clearfix"></div>
		      	</div>
		      	<div class="col-lg-9 col-md-8">
		      		<div class="row">
			      		<?php 
			      		$multi_sports_catData=  get_theme_mod('multi_sports_services_cat');
			            if($multi_sports_catData){
				            $page_query = new WP_Query(array( 'category_name' => esc_html( $multi_sports_catData ,'multi-sports')));?>
				        	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?> 
				        		<div class="col-lg-4 col-md-6">
									<div class="service-box">  
				          				<div class="servicesbox-img">
								      		<?php the_post_thumbnail(); ?>
								      	</div>
							        	<div class="service-content">
						            		<h4><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h4>
						            		<p><?php $excerpt = get_the_excerpt(); echo esc_html( multi_sports_string_limit_words( $excerpt,6 ) ); ?></p>
					            		</div>
									</div>
								</div>
						  		<div class="clearfix"></div>    	
			          		<?php endwhile; 
				          	wp_reset_postdata();
			      		} ?>
			      	</div>
		      	</div>
	      	</div>
		</div>
	</section>

	<?php do_action('multi_sports_below_services_section'); ?>

	<div class="container lz-content">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>