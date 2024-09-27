<?php
/**
 * Displays top header
 *
 * @package Roofing Flooring
 */
?>

<div class="top-info text-end">
	<div class="container">
		<div class="row top-header">
			<div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $roofing_flooring_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $roofing_flooring_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('roofing_flooring_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('roofing_flooring_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $roofing_flooring_description = get_bloginfo( 'description', 'display' );
                            if ( $roofing_flooring_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('roofing_flooring_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($roofing_flooring_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
			<div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 align-self-center">
				<div class="row ">
			        <div class="col-lg-4 col-md-4 col-sm-4 col-12 align-self-center">
			            <?php if(get_theme_mod('roofing_flooring_email') != '' || get_theme_mod('roofing_flooring_email_text') != '' ){ ?>
			                <div class="row">
			                    <div class="col-lg-3 col-md-2 col-sm-2 col-2 align-self-center">
			                        <i class="fas fa-envelope-open-text"></i>
			                    </div>
			                    <div class="col-lg-9 col-md-10 col-sm-10 col-10 align-self-center text-lg-start">
			                        <p class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_email_text','')); ?></p>
			                        <a href="mailto:<?php echo esc_attr(get_theme_mod('roofing_flooring_email','')); ?>"><p class="mb-0"><?php echo esc_html(get_theme_mod('roofing_flooring_email','')); ?></p></a>
			                    </div>
			                </div>
			            <?php }?>
			        </div>
			        <div class="col-lg-4 col-md-4 col-sm-4 col-12 align-self-center">
			            <?php if(get_theme_mod('roofing_flooring_phone_number') != '' || get_theme_mod('roofing_flooring_phone_text') != '' ){ ?>
			                <div class="row">
			                    <div class="col-lg-3 col-md-3 col-sm-3 col-2 align-self-center">
			                        <i class="fas fa-phone"></i>
			                    </div>
			                    <div class="col-lg-9 col-md-9 col-sm-9 col-10 align-self-center text-lg-start">
			                        <p class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_phone_text','')); ?></p>
			                        <a href="tel:<?php echo esc_attr(get_theme_mod('roofing_flooring_phone_number','')); ?>"><p class="mb-0"><?php echo esc_html(get_theme_mod('roofing_flooring_phone_number','')); ?></p></a>
			                    </div>
			                </div>
			            <?php }?>
			        </div>
			        <div class="col-lg-4 col-md-4 col-sm-4 col-12 align-self-center">
			            <?php if(get_theme_mod('roofing_flooring_location') != '' || get_theme_mod('roofing_flooring_location_text') != '' ){ ?>
			                <div class="row">
			                    <div class="col-lg-3 col-md-2 col-sm-2 col-2 align-self-center">
			                        <i class="fas fa-map-marker-alt"></i>
			                    </div>
			                    <div class="col-lg-9 col-md-10 col-sm-10 col-10 align-self-center text-lg-start">
			                        <p class="mb-1 contact-text"><?php echo esc_html(get_theme_mod('roofing_flooring_location_text','')); ?></p>
			                        <p class="mb-0"><?php echo esc_html(get_theme_mod('roofing_flooring_location','')); ?></p>
			                    </div>
			                </div>
			            <?php }?>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>