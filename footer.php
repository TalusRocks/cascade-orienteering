      <!-- =====FOOTER===== -->
      <footer class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="foot">

          <div class="col-lg-3">
            <a href="<?php echo site_url();?>">
              <img id="logo-foot" src="<?php echo get_stylesheet_directory_uri(); ?>/images/COC-logo-diamond-white.png" alt="<?php echo get_bloginfo('name')?>" />
            </a>
          </div>
          <div class="col-lg-3" id="footer-menu">
            <p><a href="<?php echo get_permalink(111); ?>">ABOUT</a></p>
            <p><a href="<?php echo get_permalink(113); ?>">CONTACT</a></p>
            <p><a href="http://register.cascadeoc.org/">REGISTRATION</a></p>
            <p><a href="https://drive.google.com/drive/folders/0B29jBY5njVIKSllCM1A5WGx5RWM">Document Library</a></p>
            <p><a href="http://classic.cascadeoc.org/">Old website '09-16</a></p>
            <p><a href="http://www.old.cascadeoc.org/">Older website '00-09</a></p>
          </div>
          <div class="col-lg-3">
            <p>COC is a non-profit</p>
            <p><a href="https://orienteeringusa.org">Member of Orienteering USA</a></p>
            <p><a href="http://orienteering.org/">Member of International Orienteering Federation</a></p>
          </div>
          <div class="col-lg-3" id="footer-text">
            <p>Design by Rebecca Jensen<br>of Fox Jump Design</p>
            <p>&copy; <?php bloginfo( 'name' ); ?> <?php echo date( 'Y' ); ?></p>
            <p><a href="http://cascadeoc.org/wp-admin">Admin log in</a></p>
          </div>

        </div>
      </footer> 

    </div> <!-- end the 10 offset by 1 col, the inner white body -->
  </div> <!-- end container -->
</div> <!-- end content -->

  <?php wp_footer(); ?>

</body>
</html>
