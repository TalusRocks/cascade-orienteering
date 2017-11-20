<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->
    
    <div class="page-header lg-mrg-bottom">
        <h1><?php wp_title(''); ?></h1>
        <hr></hr>
    </div>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        
    <article class="post">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <p class="post-info"><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?></p>


        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
       
        <p><?php the_excerpt(); ?></p>

        <?php the_category( ' ' ); ?>


    </article>



	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. This is the page-sidebar-right template.</p>

	<?php endif; ?>


    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'news' ); ?>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>