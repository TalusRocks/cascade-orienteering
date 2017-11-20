<?php get_header(); ?>

<div class ="row"> <!-- row for content LEFT -->
  <div class="col-lg-9 col-md-9 col-sm-9 more-pad-right no-pad-left"> <!-- col 9 for content LEFT -->
    <div class="col-lg-12 lg-mrg-bottom no-pad-left"> <!-- inner col 12 for content LEFT -->
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <!-- EVENT HEADER -->
        <div class="page-header sm-mrg-bottom">
            <h1><?php the_title(); ?></h1>
            <hr></hr>
            <div class="event-subhead">
                <!-- Displays the associated series link in the sub-heading -->
                <h3>  
                  <?php

                    $posts = get_field('related_series');
                    
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

                <!-- date -->
                <h3><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('l, F j');?>
            
                <!-- Displays the associated map link in the sub-heading -->
                  <?php

                    $posts = get_field('map_link');
                    
                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);
                            echo '@ ';
                            echo '<a href="' . get_the_permalink() . '">';
                            echo get_the_title();
                            echo '</a>';
                        endforeach;
                        wp_reset_postdata();
                    }

                  ?>
                  in <a href="<?php the_field('directions_link'); ?>"><?php the_field('location'); ?></a>
                </h3>

                <!-- meet director -->
                <?php if( get_field('contact_meet_director') ): ?>
                    <p class="post-info xs-mrg-top">Meet Director: 
                        <?php

                        $posts = get_field('contact_meet_director', $post->ID);
                        
                        if( $posts ) {

                            foreach( $posts as $post ):
                                setup_postdata($post);
                                echo '<a href="' . get_the_permalink() . '">';
                                echo get_the_title();
                                echo '</a>';
                            endforeach;
                            wp_reset_postdata();
                        }
                        else {
                            echo 'TBD';
                        }

                      ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>


        <!-- Optional field for urgent announcements -->
        <div class="urgent">
          <em><?php the_field('urgent_event_announcement'); ?></em>
        </div>


        <!-- EVENT INFO -->
        <div class="img-container">     
            <?php 

                $image = get_field('event_image');

                if( !empty($image) ): ?>

                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
        </div>


        <div class="md-mrg-top lg-mrg-bottom">
            
            <p><?php the_field('course_description'); ?></p>

            <?php if( get_field('link_to_registration') ): ?>
                <p class="sm-mrg-top"><a href="<?php the_field('link_to_registration'); ?>"><button class="btn-lg">REGISTER NOW</button></a></p>
            <?php endif; ?>

        </div>

    <div class="col-lg-12" id="no-pad">
        <div class="md-mrg-bottom">
            <h2>COURSES</h2>
            <p class="post-info">Course designer(s): <?php the_field('course_designers'); ?></p>
            <?php the_field('courses'); ?>
        </div>

        <div class="course-help md-mrg-bottom">
            <?php the_field('course_help'); ?>
        </div>

        <div class="lg-mrg-bottom">
            <?php the_field('course_notes'); ?>
        </div>
    </div>

    <div class="col-lg-12" id="no-pad">
        <div class="md-mrg-bottom">
            <h2>SCHEDULE</h2>
            <?php the_field('event_schedule'); ?>
        </div>

        <div class="course-help lg-mrg-bottom">
            <?php the_field('schedule_help'); ?>
        </div>
    </div>

    <div class="col-lg-12" id="no-pad">
        <div class="md-mrg-bottom">
            <h2>PRICES</h2>
            <?php the_field('prices'); ?>
        </div>

        <div class="course-help lg-mrg-bottom">
            <?php the_field('epunch_help'); ?>
        </div>
    </div>

    <div class="col-lg-12 l-mrg-bottom" id="no-pad">
        <h2>SIGN UP</h2>
        
        <?php if( get_field('alternative_registration') ): ?>
            <div class="col-lg-12 xs-mrg-top no-pad-left sm-pad-right">
                <?php the_field('alternative_registration'); ?>  
            </div>
        <?php endif; ?>

            
        <?php if( get_field('link_to_registration') ): ?>
            <div class="col-lg-6 xs-mrg-top no-pad-left sm-pad-right">
                <a href="<?php the_field('link_to_registration'); ?>"><button class="btn-lg sm-mrg-bottom">REGISTER</button></a>    
                <?php the_field('registration_info'); ?>    
            </div>       
        <?php endif; ?>


        <?php if( get_field('link_to_volunteer') ): ?>    
            <div class="col-lg-6 xs-mrg-top no-pad-left sm-pad-right">        
                <a href="<?php the_field('link_to_volunteer'); ?>"><button class="btn-lg vol-btn sm-mrg-bottom">VOLUNTEER</button></a>
                <?php the_field('volunteer_info'); ?>
            </div>
        <?php endif; ?>
    
    </div>




        <div class="col-lg-12 col-md-12 col-sm-12" id="no-pad">
            <h2>LOCATION</h2>

            <!-- mobile view -->
                    <?php

                    $posts = get_field('map_link', $post->ID);

                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);

                                echo '<div class="hidden-lg hidden-md hidden-sm">';
                                echo the_field('written_directions');
                                echo '</div>';
                    
                        endforeach;
                        wp_reset_postdata();
                    }

                    ?>
            

            <!-- tablet and desktop view -->
                    <?php

                    $posts = get_field('map_link', $post->ID);

                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);

                                echo '<div class="col-lg-12" id="no-pad">';
                                echo the_field('embed_directions');
                                echo '</div>';

                        endforeach;
                        wp_reset_postdata();

                    }

                    ?>
            

            <!-- this is hidden on mobile; mobile view above shows instead -->
                    <?php

                    $posts = get_field('map_link', $post->ID);

                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);

                                echo '<div class="col-lg-12 md-mrg-top hidden-xs more-pad-left">';
                                echo the_field('written_directions');
                                echo '</div>';

                        endforeach;
                        wp_reset_postdata();
                    }

                    ?>
            

        </div><!-- close col-12 embed and written directions section -->

        <div class="col-lg-12 sm-mrg-top" id="no-pad">
            <?php the_field('parking'); ?>
        </div>

        <div class="col-lg-12 l-mrg-bottom" id="no-pad">
            <?php the_field('carpool'); ?>
        </div>

        

        <div class="col-lg-12 col-md-12 col-sm-12 lg-mrg-bottom" id="no-pad">
            <h2>THE MAP</h2>
            <div class="col-lg-5 col-md-5 col-sm-5 map-image-event" id="no-pad">
                <?php

                $posts = get_field('map_link', $post->ID);

                if( $posts ) {

                    foreach( $posts as $post ):
                        setup_postdata($post);
                            
                            echo '<a href="' . get_the_permalink() . '">';
                            echo the_post_thumbnail('medium');
                            echo '</a>';

                    endforeach;
                    wp_reset_postdata();
                }

                    else {
                            echo '<p>No map preview available</p>';
                        }

                ?>
            </div><!-- close col-5 -->
            <div class="col-lg-7 col-md-7 col-sm-7" id="no-pad">
                <?php

                $posts = get_field('map_link', $post->ID);

                if( $posts ) {

                    foreach( $posts as $post ):
                        setup_postdata($post);

                            echo the_field('map_description');
                            echo '<a href="' . get_the_permalink() . '">';
                            echo 'Read more on the map page';
                            echo '</a>';


                    endforeach;

                    wp_reset_postdata();
                }

                ?>
            </div><!-- close col 7 -->



            <div class="col-lg-12 col-md-12 col-sm-12 venue-rating md-mrg-top no-margin" id="no-pad">
                <div class="col-lg-6">
                    <?php

                    $posts = get_field('map_link', $post->ID);

                    if( $posts ) {

                        foreach( $posts as $post ):
                            setup_postdata($post);

                                echo '<h4>Navigational Challenge: <b>';
                                echo  the_field('nav_rating');
                                echo '</b></h4>';
                                echo '</div><div class="col-lg-6">';
                                echo '<h4>Physical Challenge: <b>';
                                echo the_field('physical_rating');
                                echo '</b></h4>';

                                        endforeach;

                    wp_reset_postdata();
                }

                ?>
                </div>
            </div>

         </div><!-- close col 12 Map section -->

        
        <div class="col-lg-12 col-md-12 col-sm-12" id="no-pad">
            
            <?php the_field('misc_info'); ?>
            
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12" id="no-pad">
            
            <h2>SAFETY &amp; ETIQUETTE</h2>
            <?php the_field('safety_and_etiquette'); ?>
            
        </div> <!-- close col 12 Safety/Etiquette -->

    
    
	

	<?php endwhile; endif; ?>


    </div> <!-- close content LEFT col 12 -->
  </div> <!-- close content LEFT col 9 -->


<?php get_sidebar( 'event' ); ?>

<?php get_footer(); ?>