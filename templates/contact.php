<?php
// Template name: Contact
get_header(); ?>

<?php if (have_rows('contactpagina')) : ?>
    <?php while (have_rows('contactpagina')) : the_row(); ?>
        <section class="contactp">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <?php the_sub_field('titel'); ?>
                    </div>
                    <div class="offset-md-1 col-md-6">
                        <?php $contactform = get_sub_field('formulier_shortcode');
                                echo do_shortcode($contactform);
                                ?>
                    </div>
                    <div class="col-md-3 offset-md-1 cinf">
                        <?php the_sub_field('extra_adres_gegevens'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<?php

$location = get_field('google_maps');

if (!empty($location)) :
    ?>
    <div class="acf-map">
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
<?php endif; ?>



<?php $apikey = get_field('api_key', 'option'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>"></script>
<script type="text/javascript">
    (function($) {
        function new_map($el) {
            var $markers = $el.find('.marker');
            var args = {
                zoom: 16,
                mapTypeControl: false,
                streetViewControl: false,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map($el[0], args);
            map.markers = [];
            $markers.each(function() {

                add_marker($(this), map);

            });
            center_map(map);
            return map;

        }

        function add_marker($marker, map) {
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            map.markers.push(marker);
            if ($marker.html()) {
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });
                google.maps.event.addListener(marker, 'click', function() {

                    infowindow.open(map, marker);

                });
            }

        }

        function center_map(map) {

            var bounds = new google.maps.LatLngBounds();
            $.each(map.markers, function(i, marker) {

                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                bounds.extend(latlng);

            });

            // only 1 marker?
            if (map.markers.length == 1) {
                // set center of map
                map.setCenter(bounds.getCenter());
                map.setZoom(16);
            } else {
                map.fitBounds(bounds);
            }

        }
        var map = null;

        $(document).ready(function() {
            $('.acf-map').each(function() {

                map = new_map($(this));
            });
        });
    })(jQuery);
</script>

<?php get_footer(); ?>