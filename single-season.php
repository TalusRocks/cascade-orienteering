<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->

    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        
    <article class="post md-mrg-top">
        <h1><?php the_title(); ?></h1>
        <hr></hr>

        <h3>  
          <?php

            $posts = get_field('series_page');
            
            if( $posts ) {

                foreach( $posts as $post ):
                    setup_postdata($post);
                    echo '<a href="' . get_the_permalink() . '">';
                    echo get_the_title();
                    echo '</a>';
                endforeach;
                wp_reset_postdata();
            }

          ?>
        </h3>

        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <p class="post-info sm-mrg-top lg-mrg-bottom">Updated on: <?php the_modified_time('F j, Y'); ?></p>
       
        <p><?php the_content(); ?></p>

        

    </article>



	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>


    </div> <!-- close content LEFT col 12 -->


</div> <!-- close content LEFT row -->

<?php get_footer(); ?>