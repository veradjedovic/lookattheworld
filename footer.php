        <!-- Footer Widgets -->
        <div class="col-md-12 col-sm-12 col-xs-12 footer">
<!--            <hr class="hr-footer" />-->
            <div class="row footer-widgets">
                <?php get_template_part('footer1'); ?>
                <?php get_template_part('footer2'); ?>
                <?php get_template_part('footer3'); ?>
            </div>
            <?php
            wp_nav_menu( array(
                'menu'              => 'secondary',
                'theme_location'    => 'secondary',
                'container'         => 'div',
                'container_class'   => 'row menu'
            ));
            ?>
        </div>
        <!-- End Footer Widgets -->

    </div> <!-- End Main Container -->
</div> <!-- End Container -->

    <!-- Footer -->
    <footer class="bg-dark">
        <p>&copy; 2019 Prozor u svet avanture</p>
    </footer>
    <!-- End Footer -->

        <!-- Scripts -->
        <script>
            jQuery(document).ready(function(){

                jQuery('.row-sidebar ul li').has('ul').children('a').addClass('dropdown-background');
                
                // initialise Superfish 
                jQuery('.row-sidebar ul').superfish({
                    animation: {height:'show'},	// slide-down effect without fade-in
                    delay:		 800			// 1.2 second delay on mouseout
                });

                // Select all links with hashes
                jQuery('a[href*="#"]')
                // Remove links that don't actually link to anything
                    .not('[href="#"]')
                    .not('[href="#0"]')
                    .click(function(event) {
                        // On-page links
                        if (
                            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                            &&
                            location.hostname == this.hostname
                        ) {
                            // Figure out element to scroll to
                            var target = jQuery(this.hash);
                            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
                            // Does a scroll target exist?
                            if (target.length) {
                                // Only prevent default if animation is actually gonna happen
                                event.preventDefault();
                                jQuery('html, body').animate({
                                    scrollTop: target.offset().top
                                }, 1000, function() {
                                    // Callback after animation
                                    // Must change focus!
                                    var $target = jQuery(target);
                                    $target.focus();
                                    if ($target.is(":focus")) { // Checking if the target was focused
                                        return false;
                                    } else {
                                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                        $target.focus(); // Set focus again
                                    }
                                });
                            }
                        }
                    });

                // Add a parrot icon in front of the subtitle in a single article
                $('.content-page h5 a, .content-page h4 a, .content-page h6 a').prepend('<i class="fab fa-themeisle"></i> ');

                // Add a tooltip to the sidebar recent posts widget link, no need to add .tooltip() function at the end of this chain
                $('body').on('mouseover', '.rpwwt-widget a', function (e) {

                    var content = $('span', this).html();
                    console.log(content);

                    $('.rpwwt-widget a').attr('data-toggle', 'tooltip').attr('title', content).attr('data-placement', 'right');
                });

                // Remove attr style on div picture in article
                $('.content-page div').removeAttr('style');
            });
        </script>
        <!-- End Scripts -->

        <!-- Admin Bar -->
        <?php wp_footer(); ?>
        <!-- End Admin Bar -->
</body>
</html>