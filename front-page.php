<?php get_header(); ?>

<!-- ==== BIG IMAGE HEADING W TEXT OVERLAY === -->
<div class="row splash-row sm-mrg-top">
  <div class="shadow">

<!-- NEWS -->
    <div>
      <h2 class="hidden-lg hidden-md hidden-sm">NEWS</h2>
      <hr class="hidden-lg hidden-md hidden-sm"></hr>
        <?php
        $args = array( 'posts_per_page' => 1 );
        $postslist = get_posts( $args );
        foreach ( $postslist as $post ) :
          setup_postdata( $post ); ?>

          <div class="col-lg-5 col-md-4 col-sm-4 hidden-xs pull-left news-img" id="no-pad">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
           <!--  <p class="hidden-xs hidden-sm xs-mrg-top"><a href="<?php the_permalink('32'); ?>">MORE NEWS</a></p> -->
          </div>

          <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12 pull-right" id="no-pad news-text">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><i>Posted on <?php the_date(); ?></i></p>
              <p><?php the_excerpt(); ?></p>
              <p class="xs-mrg-top"><a href="<?php the_permalink('32'); ?>">ALL NEWS</a></p>
          </div>

        <?php
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
<!-- close NEWS -->
  </div>
</div>

<div class="row welcome sm-mrg-top">
<p class=" welcome text-center">WELCOME! <i>Are you new to orienteering?</i>
  Visit our <a href="http://cascadeoc.org/newcomers/">Newcomers page</a> to learn about what we do and how you can join the fun!</p>
</div>

<!-- ===== URGENT MESSAGE ===== -->
<div class="row urgent">
  <em><?php the_field('urgent_announcement'); ?></em>
</div>

<!-- ===== UPCOMING EVENTS ===== -->
<div class="row md-mrg-top">
  <h2>EVENTS</h2>
  <hr></hr>
  <div class="series text-center sm-mrg-top sm-mrg-bottom">
    <p>
      <a href="<?php echo get_permalink(256); ?>" class="red">Winter League</a>
    </p>
    <p> | </p>
    <p>
      <a href="<?php echo get_permalink(254); ?>" class="red">Ultimate Orienteer</a>
    </p>
    <p> | </p>
    <p>
      <a href="<?php echo get_permalink(255); ?>" class="red">Wednesday Evening</a>
    </p>
    <p> | </p>
    <p>
      <a href="<?php echo get_permalink(252); ?>" class="red">Choose Your Adventure</a>
    </p>
  </div>
  <table class="table table-striped sm-mrg-bottom">
      <tr id="column-titles">
         <th>DATE</th>
         <th>EVENT PAGE</th>
         <th class="hidden-xs">TERRAIN</th>
         <th class="hidden-xs">ORIENTEERING MAP</th>
         <th>DIRECTIONS</th>
         <th>HOST</th>
      </tr>

    <?php
      $query = new WP_Query( array(
        'post_type' => 'event',
        'meta_key'   => 'event_date',
        'orderby'    => 'meta_value_num',
        'order'      => 'ASC',
        'posts_per_page' => 7,
        'meta_value'  => date('Ymd'),
        'meta_compare'  => '>=',
        'date_query'  => array(
          array(
              'key' => 'date',
              'value' => date('Ymd'),
              'compare' => '>=',
              'type' => 'DATETIME'
            )
          ),
        ) );
    ?>

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

          <tr class="event">

            <!-- DATE (required) -->
            <td class="date"><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('D, M j');?>
            <?php if( get_field('until_date') ): ?>
              <p id="until-date"> - <?php $date = DateTime::createFromFormat('Ymd', get_field('until_date')); echo $date->format('D, M j');?></p>
            <?php endif; ?>
            </td>

            <!-- EVENT PAGE LINK -->
            <td class="event-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></td>

            <!-- TERRAIN TYPE -->
            <td class="terrain hidden-xs"><?php the_field('terrain'); ?></td>

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
            <td class="club-host-name"><?php the_field('host'); ?></td>

        </tr>
      <?php endwhile; endif; wp_reset_postdata(); ?>

  </table>
</div>

<div class="row md-mrg-bottom series">
  <p class="hidden-xs"><a href="<?php the_permalink('18'); ?>">ALL EVENTS</a></p>
  <a class="sm-pad-right" href="<?php the_permalink('18'); ?>"><button class="hidden-sm hidden-md hidden-lg sm-mrg-bottom">ALL EVENTS</button></a>
  <p><a class="sm-pad-right" href="<?php echo get_permalink(1225); ?>">Add CascadeOC events to your calendar</a></p>
</div>

<!-- ===== RESULTS ===== -->
<div class="row sm-mrg-bottom"> <!-- both Results -->
  <div class="col-lg-12 md-mrg-bottom" id="no-pad"> <!-- RESULTS B -->
    <h2>RESULTS</h2>
    <hr></hr>
    <div class="col-lg-12" id="no-pad"> <!-- Date and Event -->

<!-- result date -->
      <?php
      $query = new WP_Query( array(
        'posts_per_page' => 1,
        'post_type' => 'result',
        'meta_key'   => 'event_date_results',
        'orderby'    => 'meta_value_num',
        'order'      => 'DESC',
        'meta_value'  => date('Ymd'),
        'meta_compare'  => '<=',
        'date_query'  => array(
          array(
              'key' => 'date',
              'value' => date('Ymd'),
              'compare' => '<=', //Less than
              'type' => 'DATETIME'
            )
          ),
        ) );
      ?>

      <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
         <h4><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date_results')); echo $date->format('D, M j');?></h4>
      <?php endwhile; endif; wp_reset_postdata(); ?>

<!-- result event page -->
      <?php
      $query = new WP_Query( array(
        'posts_per_page' => 1,
        'post_type' => 'result',
        'meta_key'   => 'event_date_results',
        'orderby'    => 'meta_value_num',
        'order'      => 'DESC',
        'meta_value'  => date('Ymd'),
        'meta_compare'  => '<=',
        'date_query'  => array(
          array(
              'key' => 'date',
              'value' => date('Ymd'),
              'compare' => '<=', //Less than
              'type' => 'DATETIME'
            )
          ),
        ) );
      ?>

      <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
        <h3>
          <?php
          $posts = get_field('related_event_page');
              if( $posts ) {
                  foreach( $posts as $post ):
                      setup_postdata($post);
                      echo get_the_title();
                  endforeach;
                  wp_reset_postdata();
              }
          ?>
        </h3>

      <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>

<!-- result buttons -->
      <?php
      $query = new WP_Query( array(
        'posts_per_page' => 1,
        'post_type' => 'result',
        'meta_key'   => 'event_date_results',
        'orderby'    => 'meta_value_num',
        'order'      => 'DESC',
        'meta_value'  => date('Ymd'),
        'meta_compare'  => '<=',
        'date_query'  => array(
          array(
              'key' => 'date',
              'value' => date('Ymd'),
              'compare' => '<=', //Less than
              'type' => 'DATETIME'
            )
          ),
        ) );
      ?>

          <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

            <div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-pad-left">
                <a href="<?php the_permalink();?>"><button id="lg-results-btn">RESULTS</button></a>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-pad-left">
                <a href="<?php the_field('winsplits_link_results');?>"><button id="lg-sr-btn">SPLITS</button></a>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 no-pad-left">
                <a href="<?php the_field('routegadget_link_results');?>"><button id="lg-sr-btn">ROUTES</button></a>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="no-pad">
              <p><a href="<?php the_permalink('74'); ?>">ALL RESULTS</a></p>
            </div>

            <!-- <div class="series sm-mrg-top">
              <p><a class="red" href="<?php the_permalink();?>">EVENT RESULTS</a></p>
              <p> | </p>
              <p><a class="red" href="<?php the_field('winsplits_link_results');?>">SPLITS</a></p>
              <p> | </p>
              <p><a class="red" href="<?php the_field('routegadget_link_results');?>">ROUTES</a></p>
              <p> | </p>
              <p><a href="<?php the_permalink('74'); ?>">ALL RESULTS</a></p>
            </div> -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
            <!-- <div class="hidden-quote col-sm-12 md-mrg-top hidden-lg hidden-md hidden-xs">
              <p>An orienteer is never lost, just temporarily confused. Being lost means not knowing where you are,
                nor how to fix it. Being temporarily confused means not knowing where you are, but having the tools and skills to fix it.</p>
            </div> -->

  </div> <!-- close RESULTS -->
</div> <!-- close News and Results -->

<!-- ===== SOCIAL ===== -->
<div class="row">
  <h2>CONNECT WITH US</h2>
  <hr></hr>

  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-1' ) ); ?>
      <a href="<?php echo get_permalink(301); ?>"><button class="social-button">Sign up</button></a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-2' ) ); ?>
      <a href="https://groups.yahoo.com/neo/groups/cascadeoc/info" target="_blank"><button class="social-button">Sign up</button></a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-3' ) ); ?>
      <a href="<?php echo get_permalink(104); ?>"><button class="social-button">Sign up</button></a>

    </div>
<!--   </div>

  <div class="row"> -->
    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-4' ) ); ?>
      <a href="https://www.facebook.com/CascadeOC" target="_blank"><button class="social-button">Like us</button></a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-5' ) ); ?>
      <a href="https://www.instagram.com/cascadeorienteering/" target="_blank"><button class="social-button">Follow us</button></a>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 social social-widget">
      <?php if ( dynamic_sidebar( 'social-6' ) ); ?>
      <a href="<?php echo get_permalink(113); ?>"><button class="social-button">Contact us</button></a>
    </div>
  </div>
</div> <!-- end social row -->

<?php get_footer(); ?>

</div> <!-- end 10 col -->
