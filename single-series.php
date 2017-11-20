<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->



    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="post md-mrg-top">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
            <h3><?php the_field('month_range'); ?></h3>  

            <p class="post-info">Series director(s): 
                    <?php

                    $posts = get_field('contact_series_director', $post->ID);
                    
                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);
                            echo '<a href="' . get_the_permalink() . '">';
                            echo get_the_title();
                            echo '</a>';
                            echo '&nbsp&nbsp';
                        endforeach;
                        wp_reset_postdata();
                    }

                  ?>
            </p>

            <div class="img-container md-mrg-bottom">
              <?php the_post_thumbnail('large'); ?>
            </div>

            <?php the_content(); ?>

        </div>

<!-- took the endwhile/endif from here and put it after the repeater, below the table -->





    <!-- begin upcoming events TABLE -->
    <div class="md-mrg-top">
        <table class="table table-striped">
            <tr id="column-titles">
               <th>DATE</th>
               <th>EVENT PAGE</th>
               <!-- <th class="hidden-xs">TERRAIN</th> -->
               <th class="hidden-xs">ORIENTEERING MAP</th>
               <th>DIRECTIONS</th>
               <!-- <th>HOST</th> -->
            </tr>

            <?php
            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            ?>

            <?php

            $query = new WP_Query( array(

                'post_type' => 'event',
                'category__in' => $category_id,
                'meta_key'   => 'event_date',
                'orderby'    => 'meta_value_num',
                'order'      => 'ASC',
                // 'meta_value'    => date('Ymd'),
                // 'meta_compare'  => '>=',
                // 'date_query'    => array(
                //     array(
                //             'key' => 'date',
                //             'value' => date('Ymd'),
                //             'compare' => '>=', //Greater than
                //             'type' => 'DATETIME'
                //         )
                //     ),

                ) );

            ?>


            <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
                    <tr class="event">

                        <!-- DATE (required) -->
                        <td class="date"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('D, M j');?></td>          
                        

                        <!-- EVENT PAGE LINK -->
                        <td class="event-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></td>
                        

                        <!-- TERRAIN TYPE -->
                       <!--  <td class="terrain hidden-xs"><?php the_field('terrain'); ?></td> -->

                        <!-- MAP PAGE LINK -->
                        <?php
                        $posts = get_field('map_link');

                        if( $posts ): ?>

                            <?php foreach( $posts as $p ): ?>
                                <?php setup_postdata($post); ?>
                                    <td class="map-name hidden-xs"><a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></td>

                            <?php endforeach; ?>

                            <?php else: ?>
                            <td class="map-name hidden-xs"> – </td>

                        <?php endif; ?>

                        <!-- DIRECTIONS -->
                        <?php 
                        $directions_link = get_field('directions_link');
                        $directions_name = get_field('location');

                        if( $directions_link != '' ){ ?>

                        <td class="event-location">
                           <a href="<?php echo $directions_link; ?>" 
                           target="_blank" 
                           title="<?php echo $directions_name; ?>"><?php echo $directions_name; ?></a>
                        </td>

                        <?php } else { ?>

                        <td><?php echo $directions_name; ?></td>

                        <?php } ?>

                        <!-- HOST -->
                     <!--    <td class="club-host-name"><?php the_field('host'); ?></td> -->
                    
                    </tr>
            <?php endwhile; else: ?>

            <p>Check back for dates</p>

            <?php endif; wp_reset_postdata(); ?>

        </table>
    </div>






        <!-- repeating fields -->
        <?php

        if( have_rows('series_block') ):

            while ( have_rows('series_block') ) : the_row();

                // sub-heading
                echo '<div class="md-mrg-top">';
                echo '<a name="';
                the_sub_field('series_block_heading');
                echo '">';
                echo '<h3>';
                the_sub_field('series_block_heading');
                echo '</h3>';

                // text content
                echo '</a>';
                the_sub_field('series_block_content');

                // image
                echo '<img class="semi-wide" src="';
                the_sub_field('series_block_image');
                echo '"/>';
                echo '</div>';

            endwhile;

        else :

            // no rows found

        endif;

        ?>




    <?php endwhile; endif; ?> <!-- stole this from the content above the table -->





    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'series' ); ?>

</div> <!-- close content LEFT row -->

<?php get_footer(); ?>