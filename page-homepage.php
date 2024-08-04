<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
    <main id="content" class="standard">
        <?php if (have_posts()){
            while (have_posts()){
                the_post(); ?>
        <div class="nav-spacer"></div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-wrapper">
                <div class="article-wrapper">
                    <div class="entry-content">
                        <div id="splash-header">
                            <img id="splash-bg" src="<?php echo get_template_directory_uri(); ?>/img/splash_bg.<?php echo support_webp() ? "webp" : "png" ?>" aria-hidden="true">
                            <img id="splash-fg" src="<?php echo get_template_directory_uri(); ?>/img/splash_fg.<?php echo support_webp() ? "webp" : "png" ?>" aria-hidden="true">
                            <img id="splash-theme-logo" src="<?php echo get_template_directory_uri(); ?>/img/theme_logo.<?php echo support_webp() ? "webp" : "png" ?>" aria-hidden="true">
                        </div>
                        <div id="splash-countdown-wrapper">
                            <div id="splash-countdown">
                                CAST OFF IN: <span id="splash-clock">Wait...</span>
                            </div>
                        </div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>
            <?php }
        } ?>
    </main>
    <script>
        "use strict"
        document.addEventListener("DOMContentLoaded", function() {
            var countDownDate = new Date("Mar 6, 2025 18:00:00").getTime();
            var countdownfunction = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("splash-clock").innerHTML = pad(days) + "D " + pad(hours) + "H " + pad(minutes) + "M " + pad(seconds) + "S";
                if (distance <= 0) {
                    clearInterval(countdownfunction);
                    document.getElementById("countdown").innerHTML = "NOW";
                }
            }, 1000);
        });
        function pad(num) {
            num = num.toString();
            while (num.length < 2) num = "0" + num;
            return num;
        }
    </script>
<?php get_footer(); ?>