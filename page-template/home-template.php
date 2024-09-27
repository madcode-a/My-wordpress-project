<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
<?php if (get_theme_mod('roofing_flooring_slider_section_setting', false) != '') { ?>
  <?php if(get_theme_mod('roofing_flooring_banner_main_heading') != '' || get_theme_mod('roofing_flooring_banner_button_text') != '' || get_theme_mod('roofing_flooring_banner_button_url') != '' || get_theme_mod('roofing_flooring_banner_short_heading') != '' || get_theme_mod('roofing_flooring_banner_main_content') != '' || get_theme_mod('roofing_flooring_banner_small_image') != '' || get_theme_mod('roofing_flooring_banner_center_image') != '' || get_theme_mod('roofing_flooring_contact_box_left_heading') != '' || get_theme_mod('roofing_flooring_contact_box_left_text') != '' ){ ?>
    <section id="top-slider" class="py-5">
      <div class="container">
        <div class="slier-main-box row">
          <div class="col-xl-6 col-lg-7 col-md-7 col-sm-12 col-12 text-start align-self-center slide-content">
            <div class="banner-content">
              <?php if(get_theme_mod('roofing_flooring_banner_short_heading') != ''){ ?>
                <h4 class="main-text text-lg-start mb-4"><?php echo esc_html(get_theme_mod('roofing_flooring_banner_short_heading')); ?></h4>
              <?php }?>
              <?php if(get_theme_mod('roofing_flooring_banner_main_heading') != ''){ ?>
                <h3 class="main-heading mb-3"><?php echo esc_html(get_theme_mod('roofing_flooring_banner_main_heading')); ?></h3>
              <?php }?>
              <?php if(get_theme_mod('roofing_flooring_banner_main_content') != ''){ ?>
                <p class="img-text-content mb-4"><?php echo esc_html(get_theme_mod('roofing_flooring_banner_main_content')); ?></p>
              <?php }?>
              <?php if(get_theme_mod('roofing_flooring_banner_button_url') != '' || get_theme_mod('roofing_flooring_banner_button_text') != ''){ ?>
                <div class="slide-btn pb-2">
                  <a href="<?php echo esc_html(get_theme_mod('roofing_flooring_banner_button_url')); ?>"><?php echo esc_html(get_theme_mod('roofing_flooring_banner_button_text')); ?></a>
                </div>
              <?php }?>
            </div>
            <div class="contact-form mt-4 ">
              <div class="row mb-4">
                <div class="col-lg-5 col-md-5 col-sm-6 col-12">
                  <?php if(get_theme_mod('roofing_flooring_contact_box_left_heading') != '' || get_theme_mod('roofing_flooring_contact_box_left_text') != ''){ ?>
                    <div class="left-text-box">
                      <?php if(get_theme_mod('roofing_flooring_contact_box_left_heading') != ''){ ?>
                      <h5 class="left-text-heading "><?php echo esc_html(get_theme_mod('roofing_flooring_contact_box_left_heading')); ?></h5>
                      <?php }?>
                      <?php if(get_theme_mod('roofing_flooring_contact_box_left_text') != ''){ ?>
                      <p class="left-text-content m-0"><?php echo esc_html(get_theme_mod('roofing_flooring_contact_box_left_text')); ?></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-12">
                  <?php if(get_theme_mod('roofing_flooring_contact_box_phone_number') != '' || get_theme_mod('roofing_flooring_contact_box_phone_text') != '' ){ ?>
                    <div class="row contact-call-box">
                      <div class="col-lg-3 col-md-3 col-sm-3 align-self-center phone-icon">
                          <i class="fas fa-phone"></i>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 align-self-center phone-content">
                        <h6 class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_contact_box_phone_text','')); ?></h6>
                          <a href="tel:<?php echo esc_attr(get_theme_mod('roofing_flooring_contact_box_phone_number','')); ?>"><p class="mb-0"><?php echo esc_html(get_theme_mod('roofing_flooring_contact_box_phone_number','')); ?></p></a>
                      </div>
                    </div>
                  <?php }?>
                </div>
              </div>
              <?php if(get_theme_mod('roofing_flooring_contact_form_shortcode')){ ?>
                <?php echo do_shortcode(get_theme_mod('roofing_flooring_contact_form_shortcode')); ?>
              <?php }?>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 col-md-5 col-sm-12 col-12 banner-center-img">
            <?php if(get_theme_mod('roofing_flooring_banner_center_image') != ''){ ?>
              <img src="<?php echo esc_url( get_theme_mod( 'roofing_flooring_banner_center_image' )); ?>" alt="Banner Left Image">
            <?php }?>
            <?php if(get_theme_mod('roofing_flooring_right_image_box_1_heading') != '' ){ ?>
              <div class="image-box-1">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center image-box-1-icon">
                    <i class="fas fa-lightbulb"></i>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center image-box-1-heading">
                    <h6 class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_right_image_box_1_heading','')); ?></h6>
                  </div>
                </div>
                </div>
              <?php }?>
              <?php if(get_theme_mod('roofing_flooring_right_image_box_2_heading') != '' ){ ?>
                <div class="image-box-2">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center image-box-2-icon">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center image-box-2-heading">
                      <h6 class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_right_image_box_2_heading','')); ?></h6>
                    </div>
                  </div>
                </div>
              <?php }?>
              <?php if(get_theme_mod('roofing_flooring_right_image_box_3_heading') != '' || get_theme_mod('roofing_flooring_right_image_box_3_text') != '' ){ ?>
                <div class="image-box-3">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center image-box-3-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-9 align-self-center image-box-3-heading">
                      <h6 class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_right_image_box_3_heading','')); ?></h6>
                      <p class="mb-0"><?php echo esc_html(get_theme_mod('roofing_flooring_right_image_box_3_text','')); ?></p>
                    </div>
                  </div>
                </div>
              <?php }?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>
<?php }?>

<?php if (get_theme_mod('roofing_flooring_activities_section_setting', false) != '') { ?>
  <section class="featured py-5">
    <div class="container ">
      <div class="heading text-center mb-4">
        <?php if(get_theme_mod('roofing_flooring_services_heading') != ''){ ?>
          <h4 class="main-heading mb-3 mt-3"><?php echo esc_html(get_theme_mod('roofing_flooring_services_heading')); ?></h4>
        <?php }?>
        <?php if(get_theme_mod('roofing_flooring_services_content') != ''){ ?>
          <h3 class="main-heading"><?php echo esc_html(get_theme_mod('roofing_flooring_services_content')); ?></h3>
        <?php }?>
      </div>
      <div class="owl-carousel m-0 ser-box">
        <?php
          $roofing_flooring_services_cat = get_theme_mod('roofing_flooring_services_sec_category','');
          if($roofing_flooring_services_cat){
            $roofing_flooring_page_query5 = new WP_Query(array( 'category_name' => esc_html($roofing_flooring_services_cat,'roofing-flooring'),'posts_per_page' => 8));
            $i=1;
            while( $roofing_flooring_page_query5->have_posts() ) : $roofing_flooring_page_query5->the_post(); ?>
              <?php if(get_theme_mod('roofing_flooring_services_icon'.$i,'fas fa-stethoscope')){ ?>
                <div class="service-box">
                  <div class="feature-box m-0">
                    <div class="ser-content">
                      <div class="service-icon">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                          } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                        <?php } ?>
                      </div>
                      <h4 class="mt-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?php if(get_theme_mod('roofing_flooring_services_team_designation'.$i) != ''){ ?>
                        <h6 class="team-designation mb-3"><?php echo esc_html(get_theme_mod('roofing_flooring_services_team_designation'.$i)); ?></h6>
                      <?php }?>
                      <?php if(get_theme_mod('roofing_flooring_facebook_url'.$i) != '' || get_theme_mod('roofing_flooring_twitter_url'.$i) != '' || get_theme_mod('roofing_flooring_intagram_url'.$i) != '' || get_theme_mod('roofing_flooring_linkedin_url'.$i) != '' || get_theme_mod('roofing_flooring_pintrest_url'.$i) != ''){ ?>
                        <div class="social-link">
                          <?php if(get_theme_mod('roofing_flooring_facebook_url'.$i) != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('roofing_flooring_facebook_url'.$i,'')); ?>"><i class="<?php echo esc_attr( get_theme_mod('roofing_flooring_facebook_icon'.$i) ); ?>"></i></a>
                          <?php }?>
                          <?php if(get_theme_mod('roofing_flooring_twitter_url'.$i) != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('roofing_flooring_twitter_url'.$i,'')); ?>"><i class="<?php echo esc_attr( get_theme_mod('roofing_flooring_twitter_icon'.$i) ); ?>"></i></a>
                          <?php }?>
                          <?php if(get_theme_mod('roofing_flooring_intagram_url'.$i) != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('roofing_flooring_intagram_url'.$i,'')); ?>"><i class="<?php echo esc_attr( get_theme_mod('roofing_flooring_intagram_icon'.$i) ); ?>"></i></a>
                          <?php }?>
                          <?php if(get_theme_mod('roofing_flooring_linkedin_url'.$i) != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('roofing_flooring_linkedin_url'.$i,'')); ?>"><i class="<?php echo esc_attr( get_theme_mod('roofing_flooring_linkedin_icon'.$i) ); ?>"></i></a>
                          <?php }?>
                          <?php if(get_theme_mod('roofing_flooring_pintrest_url'.$i) != ''){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('roofing_flooring_pintrest_url'.$i,'')); ?>"><i class="<?php echo esc_attr( get_theme_mod('roofing_flooring_pintrest_icon'.$i) ); ?>"></i></a>
                          <?php }?>
                        </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              <?php }?>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  </section>
<?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>