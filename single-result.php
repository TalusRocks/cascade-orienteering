<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        
    <article class="post md-mrg-top">
        <h1><?php the_title(); ?></h1>
        <hr></hr>
    

        <div class="md-mrg-bottom">
            
            <h3><!-- Displays the associated series link in the sub-heading -->
              <?php

                $posts = get_field('results_related_series');
                
                if( $posts ) {

                    foreach( $posts as $post ):
                        setup_postdata($post);
                        echo '<a class="sm-pad-right" href="' . get_the_permalink() . '">';
                        echo get_the_title();
                        echo '</a>';
                    endforeach;
                    wp_reset_postdata();
                }

              ?>
            </h3>

            <h3><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date_results')); echo $date->format('F j, Y');?>  

                <?php

                $posts = get_field('related_event_page');

                    if( $posts ) {

                        
                        foreach( $posts as $post ):
                            setup_postdata($post);
                            echo ' - <a href="' . get_the_permalink() . '">';
                            echo 'Event Page';
                            echo '</a>';
                        endforeach;

                        wp_reset_postdata();
                    }
                    
                ?>


            </h3>
                <p class="post-info">Posted on: <?php the_time('F j, Y'); ?></p>
                <p class="post-info">Questions or changes, contact: 
                    <?php

                    $posts = get_field('contact_results_person', $post->ID);
                    
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
                </p>


        </div>

        
        <div class="hidden-lg hidden-md hidden-sm md-mrg-top md-mrg-bottom">
                   
                <h4 class="md-mrg-top">ANALYZE RESULTS</h4>

                <!-- WinSplits link, from ACF text field -->
                <p>
                <?php
                $key = 'winsplits_link_results';
                $themeta = get_post_meta($post->ID, $key, TRUE);
                if($themeta == '') {
                echo 'Check back soon for splits';
                }
                else {
                    echo '<a class="red" href="';
                    echo the_field('winsplits_link_results');
                    echo '">WinSplits';
                    echo '</a>';
                }
                ?>
                </p>


                <!-- RouteGadget link, from ACF text field -->
                <p>
                <?php
                $key = 'routegadget_link_results';
                $themeta = get_post_meta($post->ID, $key, TRUE);
                if($themeta == '') {
                echo 'Check back soon for routes';
                }
                else {
                    echo '<a class="red" href="';
                    echo the_field('routegadget_link_results');
                    echo '">RouteGadget';
                    echo '</a>';
                }
                ?>
                </p>


                <!-- Related season standings AND related team or individual results,
                as ACF relationship field -->
                <p>
                <?php if( get_field('related_result_pages') ): ?>
                    <h4 class="md-mrg-top">RELATED RESULTS</h4>
                    <?php

                        $posts = get_field('related_result_pages');

                        if( $posts ) {

                            
                            foreach( $posts as $post ):
                                setup_postdata($post);
                                echo '<p><a class="red" href="' . get_the_permalink() . '">';
                                echo get_the_title();
                                echo '</a></p>';
                            endforeach;

                            wp_reset_postdata();
                        }
                        
                    ?>
                <?php endif; ?>
                </p>

            </div> <!-- wrapper div -->

        <!-- ===== URGENT results MESSAGE ===== -->
        <div class="row urgent">
          <em><?php the_field('urgent_results_announcement'); ?></em>
        </div>

        <?php if( get_the_post_thumbnail() ) : ?>
            <div class="img-container">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>
       
        <p><?php the_content(); ?></p>

        <?php the_category( ' ' ); ?>


    </article>



	<?php endwhile; else: ?>

	    <div class="page-header">
	      <h1>Oh no!</h1>
	      <hr></hr>
	    </div>
	    <p>We've dropped our compass. <a href="<?php echo site_url();?>">Return to the start.</a></p>

	<?php endif; ?>


    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<span class="hidden-xs"><?php get_sidebar( 'results' ); ?></span>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>