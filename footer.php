<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roofing Flooring
 */
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
    		<?php
		        $roofing_flooring_count = 0;
		        
		        if ( is_active_sidebar( 'roofing-flooring-footer1' ) ) {
		            $roofing_flooring_count++;
		        }
		        if ( is_active_sidebar( 'roofing-flooring-footer2' ) ) {
		            $roofing_flooring_count++;
		        }
		        if ( is_active_sidebar( 'roofing-flooring-footer3' ) ) {
		            $roofing_flooring_count++;
		        }
		        // $roofing_flooring_count == 0 none
		        if ( $roofing_flooring_count == 1 ) {
		            $roofing_flooring_colmd = 'col-md-12 col-sm-12';
		        } elseif ( $roofing_flooring_count == 2 ) {
		            $roofing_flooring_colmd = 'col-md-6 col-sm-6';
		        } else {
		            $roofing_flooring_colmd = 'col-md-4 col-sm-4';
		        }
      		?>
	      	<div class="row">
		        <div class="<?php if ( !is_active_sidebar( 'roofing-flooring-footer1' ) ){ echo "footer_hide"; }else{ echo "$roofing_flooring_colmd"; } ?> col-xs-12 footer-block">
		          <?php dynamic_sidebar('roofing-flooring-footer1'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'roofing-flooring-footer2' ) ){ echo "$roofing_flooring_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
		            <?php dynamic_sidebar('roofing-flooring-footer2'); ?>
		        </div>
		        <div class="<?php if ( is_active_sidebar( 'roofing-flooring-footer3' ) ){ echo "$roofing_flooring_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
		            <?php dynamic_sidebar('roofing-flooring-footer3'); ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('roofing_flooring_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('roofing_flooring_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/', 'roofing-flooring' ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'roofing-flooring' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					     <span>
			          	 	<a target="_blank" href="<?php echo esc_url( 'https://www.themagnifico.net/products/free-roofing-wordpress-theme'); ?>">
					              	<?php
					                /* translators: 1: Theme name,  */
					                printf( esc_html__( ' %1$s ', 'roofing-flooring' ),'Flooring WordPress Theme' );
					              	?>
				          		</a>
					          	<?php
					              /* translators: 1: Theme author. */
					              printf( esc_html__( 'by %1$s.', 'roofing-flooring' ),'TheMagnifico'  );
					            ?>
	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('roofing_flooring_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('roofing_flooring_scroll_hide','')){ ?>
	    	<a id="button"><?php esc_html_e('TOP','roofing-flooring'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>