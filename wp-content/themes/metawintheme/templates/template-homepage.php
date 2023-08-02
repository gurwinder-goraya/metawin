<?php
/**
 * Template Name: Home Page Template
 *
 * 
 */
 get_header(); ?>

<body>
    <!--Start Hero Section-->
    <section class="banner lozad" <?php if ( get_field( 'background_image' ) ) : ?> data-background-image="<?php the_field( 'background_image' ); ?>" <?php else : ?> style="background-color: #646464;" <?php endif; ?>>
        <div class="container">
            <div class="banner_content">
                <?php if ( get_field( 'logo' ) ) : ?>
                    <img class="lozad" src="<?php the_field( 'logo' ); ?>" alt="Casino Hotel" />
                <?php endif ?>
                
                <?php if ( get_field( 'heading' ) ) : ?>
                    <h1><?php the_field( 'heading' ); ?></h1>
                <?php endif ?>    

                <?php if ( get_field( 'paragraph' ) ) : ?>
                    <p><?php the_field( 'paragraph' ); ?></p>
                <?php endif ?>

                <?php if ( get_field( 'button_url' ) ) : 
                    $button_info = get_field( 'button_url' ); ?>
                    <a class="btn theme-btn text-white" href="<?php echo esc_url( $button_info['url'] ) ; ?>"><?php echo esc_html( $button_info['title'] ); ?> <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/assets/images/button-icon.png" alt="Arrow Icon" /></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!--End Start Hero Section-->

    <!--Start About Us Section-->
    <section class="choose_us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="choose_us_content">
                        <?php if ( get_field( 'about_us_sub_heading' ) ) : ?>
                            <span class="highlight_text"><?php the_field( 'about_us_sub_heading' ); ?></span>
                        <?php endif ?>    
                        <?php if ( get_field( 'about_us_heading' ) ) : ?>
                            <h2><?php the_field( 'about_us_heading' ); ?></h2>
                        <?php endif ?>
                        <?php if ( get_field( 'about_us_paragraph' ) ) : ?>
                            <p><?php the_field( 'about_us_paragraph' ); ?></p>
                        <?php endif ?>
                        <?php if ( get_field( 'read_more_button' ) ) : 
                        $read_more_button = get_field( 'read_more_button' ); ?>
                        <a class="btn theme-btn text-white" href="<?php echo esc_url( $read_more_button['url'] ) ; ?>"><?php echo esc_html( $read_more_button['title'] ); ?> <img class="lozad" src="<?php echo get_template_directory_uri(); ?>/assets/images/right-arrow-icon.png" alt="Right Arrow" /></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <?php if ( get_field( 'main_image' ) ) : ?>
                        <figure class="choose_us_image">
                            <img class="lozad" src="<?php the_field( 'main_image' ); ?>" />
                    </figure>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
    <!--End About Us Section-->



    <!--Start Casino Hotels Section-->
    <section class="worldwide">
        <div class="container">
            <div class="section_title_wrapper text-center">
                <h2>The Best Casino Hotels Worldwide</h2>
                <span><img class="lozad" src="<?php echo get_template_directory_uri(); ?>/assets/images/calender.png" /> 01/11/22</span>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="top_rated">Top Rated Hotel</h5>
                    <?php 
                        $count = 1;
                        $args = array(
                          'numberposts'     => -1,
                          'post_type'       => 'casino_hotels',
                          'meta_key'        => 'score',
                          'orderby'         => 'meta_value_num',
                          'order'           => 'DESC',
                          'posts_per_page'  => 10,
                        );

                        $query = new WP_Query( $args );

                        if( $query->have_posts() ):
                          while( $query->have_posts() ) : $query->the_post(); ?>

                            <div class="worldwide_container">
                                <div class="outer">
                                    <div class="inner">
                                        <h3 class="text-white"><?php echo $count; ?></h3>
                                    </div>
                                    <div class="content_outer">
                                        <div class="wrapper">
                                            <div class="logo">
                                                <img class="lozad" src="<?php echo get_the_post_thumbnail_url(); ?>" />                  
                                            </div>
                                            <div class="address text-center">
                                                <span>Address</span>
                                                <p><?php the_field( 'address' ); ?></p>
                                            </div>
                                            <div class="rating">
                                                <div class="stars text-center">
                                                    <?php $min_stars = 1;
                                                        $max_stars = 5;
                                                        $fill_stars = get_field( 'star_rating' );
                                                        for($i=$min_stars; $i<=$max_stars; $i++) {
                                                          if ($fill_stars >= 1) {
                                                            echo '<span class="fa fa-star rated" style="font-size:20px"></span>';
                                                            $fill_stars--;
                                                          }else {
                                                            if ($fill_stars >= 0.5) {
                                                             echo '<span class="fa fa-star-half-o rated" style="font-size:20px"></span>&nbsp';
                                                              $fill_stars -= 0.5;
                                                            }else {
                                                              echo '<span class="fa fa-star-o " style="font-size:20px"></span>';
                                                            }
                                                          }
                                                        }
                                                    ?>
                                                    <p>Excellent</p>
                                                </div>
                                                <div role="progressbar"
                                                    aria-valuenow="<?php the_field( 'score' ); ?>"
                                                    aria-valuemin="0"
                                                    aria-valuemax="10"
                                                    style="--value:<?php the_field( 'score' ); ?>"><?php the_field( 'score' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wide_button">
                                            <div>
                                                <a href="<?php the_field( 'external_link' ); ?>" class="btn theme-btn text-white green-btn" target="_blank">Visit Hotel</a>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="plain_btn">Read Review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php    
                            $count++;
                          endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>    

                </div>
            </div>
        </div>
    </section>
    <!--End Casino Hotels Section-->

    <!--Start Choose Us Section-->
    <section class="choose_us">
        <div class="container">
            <div class="section_title_wrapper text-center">
                <?php if ( get_field( 'sub_heading' ) ) : ?>
                    <span class="highlight_text"><?php the_field( 'sub_heading' ); ?></span>
                <?php endif ?>
                <?php if ( get_field( 'main_heading' ) ) : ?>
                    <h2><?php the_field( 'main_heading' ); ?></h2>
                <?php endif ?>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php if ( get_field( 'image' ) ) : ?>
                        <figure class="choose_us_image">
                            <img class="lozad" src="<?php the_field( 'image' ); ?>" />
                    </figure>
                    <?php endif ?>
                </div>
                <div class="col-lg-6">
                    <div class="choose_us_content">
                        <?php if ( have_rows( 'first_row' ) ) : ?>
                            <?php while ( have_rows( 'first_row' ) ) : the_row(); ?>
                                <span class="count"><?php the_sub_field( 'number' ); ?></span>
                                <h3><?php the_sub_field( 'title' ); ?></h3>
                                <p><?php the_sub_field( 'paragraph' ); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        
                        <?php if ( have_rows( 'second_row' ) ) : ?>
                            <?php while ( have_rows( 'second_row' ) ) : the_row(); ?>
                                <span class="count"><?php the_sub_field( 'number' ); ?></span>
                                <h3><?php the_sub_field( 'title' ); ?></h3>
                                <p><?php the_sub_field( 'paragraph' ); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php if ( have_rows( 'third_row' ) ) : ?>
                            <?php while ( have_rows( 'third_row' ) ) : the_row(); ?>
                                <span class="count"><?php the_sub_field( 'number' ); ?></span>
                                <h3><?php the_sub_field( 'title' ); ?></h3>
                                <p><?php the_sub_field( 'paragraph' ); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Choose Us Section-->

    <?php get_footer(); ?>

</body>
</html>

    
   