<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs sidebar md-mrg-top"> <!-- begin sidebar RIGHT -->
  <div class="sidebar-widgets text-center">
  	<?php if ( ! dynamic_sidebar( 'series' ) ): ?>
<!-- NOTE: by adding widgets here, widgets cannot be added via the Wordpress CMS -->

  	<?php
      $categories = get_the_category();
      $category_id = $categories[0]->cat_ID;
      ?>

	  <?php
      $query = new WP_Query( array(
        'post_type' => 'season',
        'category__in' => $category_id,
        'meta_key'   => 'season_start_date',
        'orderby'    => 'meta_value_num',
        'order'      => 'DSC',
        ) );
    ?>

    <h4 class="md-mrg-top">SEASON STANDINGS</h4>

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

    <p><a class="red" href="<?php the_permalink();?>"><?php the_title();?></a></p>

    <?php endwhile; endif; wp_reset_postdata(); ?>

    <h4 class="md-mrg-top text-center">ALL SERIES</h4>
    <p><a href="?p=256">Winter League</a></p>
    <p><a href="?p=254">Ultimate Orienteer</a></p>
    <p><a href="?p=255">Wednesday Evening</a></p>
    <p><a href="?p=252">Choose Your Adventure</a></p>

    <?php endif; ?> <!-- end dynamic sidebar -->
  </div>
</div> <!-- close sidebar right -->
