<?php
get_header(); ?>
<?php get_template_part('template-parts/content', 'single'); ?>


<div class="container share">
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div id="shareBlock"></div>
            <script>
                jQuery(document).ready(function() {
                    jQuery('#SideShareBlock').cShare({
                        show_buttons: [
                            'fb',
                            'twitter',
                            'linkedin',
                            'email'
                        ]
                    });
                });
            </script>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/content', 'related'); ?>
<?php get_footer(); ?>