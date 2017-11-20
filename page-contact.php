<?php
/*
	Template Name: Contact
*/
?>


<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
        </div>

        <?php the_content(); ?>

	<?php endwhile; endif; ?>



	</div> <!-- close content LEFT col 12 -->
</div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'contact' ); ?>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>