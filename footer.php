<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Ligeti
 * @since Ligeti 1.0
 */
?>

	</div><!-- #main .rightpanel -->

	<footer class="footer-panel clearfix" role="contentinfo">
		<div class="site-info">
      <div class="tothetop">
        <a class="ugrogomb" href="#top"><i class="icon-caret-up icon-2x"></i>Top</a>
      </div>
			<?php do_action( 'ligeti_credits' ); ?>
			© 2013 <a href="http://ligetidesign.hu/">Ligeti Stúdió</a> <span class="sep"> | </span>
			Minden jog fenntartva <span class="sep"> | </span>
			Design by <a href="http://hydrogene.hu" rel="designer">Hydrogene</a>
      
		</div><!-- .site-info -->
	</footer><!--.site-footer -->

</div><!-- .site-->
</div><!-- .sitewrap -->


        <!--script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script-->
        <script src="<?php echo get_template_directory_uri(); ?>/js/deploy/scripts.min.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

        <?php if ( is_front_page() ) : ?>
        <script>
          jQuery(document).ready(function(){
              resizeDiv();
            });

          window.onresize = function(event) {
              resizeDiv();
          }

          function resizeDiv() {
              vpw = $(window).width(); 
              vph = $(window).height(); 
              $('.splash').css({'height': vph + 'px'});
          }
          </script>
        <?php endif; ?>


<?php if ( is_page_template( 'xxxtmpl_contact.php' ) ) : ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
    var map;
    function initialize() {
      var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(-34.397, 150.644),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    

    jQuery(document).ready(function(){
       resizeMap();
      });

    window.onresize = function(event) {
          resizeMap();
    }

    function resizeMap() {
          vpw = $(window).width(); 
          vph = $(window).height(); 
          $('.mapwrap').css({'height': vph/2 + 'px'});
    }


   </script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>