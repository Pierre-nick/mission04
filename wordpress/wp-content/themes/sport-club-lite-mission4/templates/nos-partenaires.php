<?php
/*
    Template Name: Nos partenaires
*/

get_header(); ?>

<?php do_action( 'multi_sports_above_header_page' ); ?>

<div class="container">
	<div id="primary" class="content-area image-partenaire">
		<main id="skip-content" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>
		</main>
	</div>
</div>

<?php do_action( 'multi_sports_above_footer_page' ); ?>

<?php get_footer();