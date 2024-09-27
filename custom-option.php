<?php

    $roofing_flooring_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $roofing_flooring_scroll_position = get_theme_mod( 'roofing_flooring_scroll_top_position','Right');
    if($roofing_flooring_scroll_position == 'Right'){
        $roofing_flooring_theme_css .='#button{';
            $roofing_flooring_theme_css .='right: 20px;';
        $roofing_flooring_theme_css .='}';
    }else if($roofing_flooring_scroll_position == 'Left'){
        $roofing_flooring_theme_css .='#button{';
            $roofing_flooring_theme_css .='left: 20px;';
        $roofing_flooring_theme_css .='}';
    }else if($roofing_flooring_scroll_position == 'Center'){
        $roofing_flooring_theme_css .='#button{';
            $roofing_flooring_theme_css .='right: 50%;left: 50%;';
        $roofing_flooring_theme_css .='}';
    }

    /*--------------------------- Global First Color ------------------------*/

    $roofing_flooring_global_color = get_theme_mod('roofing_flooring_global_color');

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='#button, #top-slider h4.main-text, #top-slider .slide-btn a, .navigation_header, .social-link, .sidebar input[type="submit"], .sidebar button[type="submit"],

         a.btn-text, span.onsale, .pro-button a:hover, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, a.added_to_cart.wc-forward:hover, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .main-navigation ul.sub-menu > li > a:hover, .main-navigation ul.sub-menu > li > a:focus, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .comment-respond input#submit, #colophon, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover{';
            $roofing_flooring_theme_css .='background-color: '.esc_attr($roofing_flooring_global_color).';';
        $roofing_flooring_theme_css .='}';
    }

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='.contact-form [type="submit"]{';
            $roofing_flooring_theme_css .='background-color: '.esc_attr($roofing_flooring_global_color).' !important;';
        $roofing_flooring_theme_css .='}';
    }

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='#top-slider .phone-content p, .top-info .social-link a i:hover, .top-info p.location i, .top-header p.contact-text, .top-header i, .last_slide_head, #top-slider .image-box-2-icon i, #top-slider .image-box-3-icon i, #top-slider .image-box-1-icon i, #top-slider .phone-icon i, .ser-content .social-link a, .featured h6.team-designation, .featured h4.main-heading, .article-box a,.post-navigation .nav-previous a, .post-navigation .nav-next a, .posts-navigation .nav-previous a, .posts-navigation .nav-next a, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .main-navigation .menu > li > a:hover, .widget a:hover, .widget a:focus, .sidebar ul li a:hover{';
            $roofing_flooring_theme_css .='color: '.esc_attr($roofing_flooring_global_color).';';
        $roofing_flooring_theme_css .='}';
    }

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='.postcat-name{';
            $roofing_flooring_theme_css .='color: '.esc_attr($roofing_flooring_global_color).' !important;';
        $roofing_flooring_theme_css .='}';
    }

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover{';
            $roofing_flooring_theme_css .='border-color: '.esc_attr($roofing_flooring_global_color).' !important;';
        $roofing_flooring_theme_css .='}';
    }

    if($roofing_flooring_global_color != false){
        $roofing_flooring_theme_css .='.woocommerce-message, .woocommerce-info{';
            $roofing_flooring_theme_css .='border-top-color: '.esc_attr($roofing_flooring_global_color).';';
        $roofing_flooring_theme_css .='}';
    }

    /*-------------------- Heading typography -------------------*/

    $roofing_flooring_heading_color = get_theme_mod('roofing_flooring_heading_color');
    $roofing_flooring_heading_font_family = get_theme_mod('roofing_flooring_heading_font_family');
    $roofing_flooring_heading_font_size = get_theme_mod('roofing_flooring_heading_font_size');
    if($roofing_flooring_heading_color != false || $roofing_flooring_heading_font_family != false || $roofing_flooring_heading_font_size != false){
        $roofing_flooring_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #colophon h5, .sidebar h5, .article-box h3.entry-title, .service-sec h3.main-heading, #top-slider h4.main-text, .ser-content h4, .featured h4.main-heading{';
            $roofing_flooring_theme_css .='color: '.esc_attr($roofing_flooring_heading_color).'!important; 
            font-family: '.esc_attr($roofing_flooring_heading_font_family).'!important;
            font-size: '.esc_attr($roofing_flooring_heading_font_size).'px !important;';
        $roofing_flooring_theme_css .='}';
    }

    $roofing_flooring_paragraph_color = get_theme_mod('roofing_flooring_paragraph_color');
    $roofing_flooring_paragraph_font_family = get_theme_mod('roofing_flooring_paragraph_font_family');
    $roofing_flooring_paragraph_font_size = get_theme_mod('roofing_flooring_paragraph_font_size');
    if($roofing_flooring_paragraph_color != false || $roofing_flooring_paragraph_font_family != false || $roofing_flooring_paragraph_font_size != false){
        $roofing_flooring_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $roofing_flooring_theme_css .='color: '.esc_attr($roofing_flooring_paragraph_color).'!important; 
            font-family: '.esc_attr($roofing_flooring_paragraph_font_family).'!important;
            font-size: '.esc_attr($roofing_flooring_paragraph_font_size).'px !important;';
        $roofing_flooring_theme_css .='}';
    }