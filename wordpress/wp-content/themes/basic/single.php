<?php get_header();

if( have_posts() ){ the_post(); ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<?php themify_content_before(); // hook ?>
	<!-- content -->
	<main id="content" class="list-post">
    	<?php themify_content_start(); // hook ?>
		
		<?php get_template_part( 'includes/loop' , 'single'); ?>

		<?php wp_link_pages(array('before' => '<p class="post-pagination"><strong>' . __('Pages:', 'themify') . ' </strong>', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
		<?php get_template_part( 'includes/author-box', 'single'); ?>

		<?php get_template_part( 'includes/post-nav'); ?>

		<?php themify_comments_template(); ?>
        
		<?php themify_content_end(); // hook ?>	
	</main>
	<!-- /content -->
    <?php themify_content_after(); // hook 
}
themify_get_sidebar();?>
</div>
<!-- /layout-container -->
<?php get_footer(); 