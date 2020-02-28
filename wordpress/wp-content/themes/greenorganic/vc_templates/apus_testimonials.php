<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = wp_get_attachment_image_src($image,'full');
$args = array(
	'post_type' => 'apus_testimonial',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);
$loop = new WP_Query($args);
?>
<div class="widget-testimonials <?php echo esc_attr($el_class.' '.$style); ?>">
	<?php if ($title!=''): ?>
            <h3 class="widget-title">
                <span><?php echo trim( $title ); ?></span>
            </h3>
    <?php endif; ?>
    <?php if(!empty($img) && isset($img[0])){ ?>
        <div class="top-img text-center">
            <img src="<?php echo esc_url_raw($img[0]); ?>" alt="<?php esc_attr_e('Image', 'greenorganic'); ?>">
        </div>
    <?php }?>
	<?php if ( $loop->have_posts() ): ?>
        <div class="owl-carousel-wrapper">
            <?php if($style == 'white'){ ?>
                <div class="wrapper-testimonial" data-testimonial="content">
                  <div class="owl-carousel-wrapper">
          		      <div class="owl-carousel nav-white nav-bottom" data-items="<?php echo trim($columns) ?>" data-carousel="owl" data-smallmedium="1" data-extrasmall="1"  data-pagination="false" data-nav="true" <?php echo trim($loop->post_count > 1 ? 'data-loop="true"' : ''); ?>>
                      <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                        <?php 
                            $job = get_post_meta( get_the_ID(), 'apus_testimonial_job', true );
                            $link = get_post_meta( get_the_ID(), 'apus_testimonial_link', true );
                        ?>
                        <div class="testimonial-body layout2">
                            <div class="clearfix top-inner">
                              <div class="image">
                                <?php
                                 if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('120x120');
                                  } 
                                ?>
                              </div>
                              <div class="info">
                                  <?php if (!empty($link)) { ?>
                                    <h3 class="name-client"><a href="<?php echo esc_url_raw($link); ?>"><?php the_title(); ?></a></h3>
                                  <?php } else { ?>
                                    <h3 class="name-client"><?php the_title(); ?></h3>
                                  <?php } ?>
                                  <span class="job text-theme"><?php echo sprintf(__('%s', 'greenorganic'), $job); ?></span>
                              </div>
                            </div>
                            <div class="description hidden">
                                <?php the_excerpt(); ?>      
                            </div>
                        </div>
                      <?php endwhile; ?>
                    </div>
                    </div>
                    <div class="testimonial-content"></div>
                </div>
            <?php } else { ?>
                <?php if($style == 'style2') {?>
                <div class="owl-carousel nav-small nav-white" data-items="<?php echo trim($columns) ?>" data-carousel="owl" data-smallmedium="1" data-extrasmall="1"  data-pagination="false" data-nav="true" <?php echo trim($loop->post_count > 1 ? 'data-loop="true"' : ''); ?>>
                    <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                      <?php get_template_part( 'vc_templates/testimonial/testimonial', 'v2' ); ?>
                    <?php endwhile; ?>
                </div>
                <?php }else { ?>
                  <div class="owl-carousel nav-white nav-bottom" data-items="<?php echo trim($columns) ?>" data-carousel="owl" data-smallmedium="1" data-extrasmall="1"  data-pagination="true" data-nav="false" <?php echo trim($loop->post_count > 1 ? 'data-loop="true"' : ''); ?>>
                    <?php while ( $loop->have_posts() ): $loop->the_post(); ?>
                      <?php get_template_part( 'vc_templates/testimonial/testimonial', 'v1' ); ?>
                    <?php endwhile; ?>
                  </div>
                <?php } ?>
            <?php } ?>
        </div>
	<?php endif; ?>
</div>
<?php wp_reset_postdata(); ?>