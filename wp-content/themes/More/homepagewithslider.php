<?php 
/* Template name: Homepage with Slider */ 
?>

<?php get_header(); ?>
    
    <!--PAGE CONTENT-->
    <div class="container" style="margin-bottom:50px;">
        <div class="row">
        	<div class="span12">
                <div class="row">
                   <?php if (get_option('of_hp_titles') == 'is_on'){ ?>
                   <div class="presentation">
                            	<div class="span12">
                            		<div class="taglinedesc"><?php echo get_option('of_hp_main_small_title'); ?></div>
                            		<h1><span class="colored"><?php echo get_option('of_hp_main_title'); ?></span><br><?php echo get_option('of_hp_main_title_description'); ?></h1>
                                    <hr class="dashed">
                                   
    <div class="taglinequite"><?php echo get_option('of_hp_main_small_blockquite'); ?></div>

                            	<div class="divider"></div></div>
                                
                                </div><?php } ?>
                    <div class="span6">
                    	<div class="slider_area">
                            <div class="theme-default">
                                <div id="slider" class="nivoSlider">
<?php
							if ( have_posts() ) :
							
								$args = array( 'post_type' => 'slides', 'posts_per_page' => -1 );
								$loop = new WP_Query( $args );
								
								while ( $loop->have_posts() ) : $loop->the_post();
								
								
										if ( has_post_thumbnail() )
										{
											$image_link = get_post_meta( $post->ID, 'image_link', true );
											$image_new_window = get_post_meta( $post->ID, 'image_new_window', true );
											$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
											$image_caption = get_post_meta( $post->ID, 'image_caption', true );
											
											if ( $image_link )
											{
												?><a <?php if ($image_new_window) echo 'target="_blank"' ?> href="<?php echo $image_link; ?>"><img title="<?php echo $image_caption; ?>" src="<?php echo $url; ?>"  /></a><?php
											}
else
											{
											?><img title="<?php echo $image_caption; ?>" src="<?php echo $url; ?>"  /><?php
											}
											
										}

										
									
								endwhile;
							endif;
							
							wp_reset_query();
							?>
                                </div>
                               
                            </div>
                        </div><?php if (get_option('of_featured_titles') == 'is_on'){ ?>
                                <div class="hero-unit sep_bg">
                                	<h1><b><?php echo get_option('of_featured_main_title'); ?></b></h1><p><?php echo get_option('of_featured_main_desc'); ?></p><p><a class="featbtn" href="<?php echo get_option('of_featured_button_url'); ?>"><b><?php echo get_option('of_featured_button_text'); ?></b></a>
                                </div>
                                <?php } ?>
                    </div>
                    
                    <div class="span6">
                        <div class="presentation">
                        	<div class="row">
                                <div class="span6">
                                <?php if (get_option('of_hp_editor_content') == 'is_on'){ ?>
                                <?php if (get_option('of_content_title_off') == 'true'){  // Hide/show Content Title ?>
                                    <h3 class="titlemore"><span class="slash-colored">//</span> <?php echo get_option('of_hp_content_title');?></h3><?php } else{ ?><?php } ?>
                                    <?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?> 
         <?php endwhile; ?><div class="margintop10"></div><?php } ?>

                                <?php if (get_option('of_hp_thumbs') == 'is_on'){ ?>
                                   
                                    
                                	<div class="row">
                                  <?php if (get_option('of_portfolio_title_off') == 'true'){  // Hide/show Content Title ?>
				   <div class="span6"> 
                                
                                    <h3 class="titlemore"><span class="slash-colored">//</span> <?php echo get_option('of_hp_portfolio_title');?></h3></div><?php } else{ ?><?php } ?>
                               
                                    <?php
							if ( have_posts() ) :
							
								$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 6 );
								$loop = new WP_Query( $args );
								
								while ( $loop->have_posts() ) : $loop->the_post();
								?>
                                        <div class="span2 block">
                                        	<div class="view view-first">
                                            
                                            <?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_latest_portfolio_img' ); 
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
if ($image) : ?>
    <img src="<?php echo $image[0]; ?>" alt="" />
<?php endif; ?> 
                                               
                                           
                                                <div class="mask">
                                                    <a href="<?php echo $url; ?>" rel="prettyPhoto" class="info"></a>
                                                    <a href="<?php the_permalink(); ?>" class="link"></a>
                                                </div>
                                             </div>
                                             <div class="descr">
                                             	<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                             </div>
                                        </div>	<?php
								endwhile;
							endif;
							wp_reset_query();
						?>
                                                                               
                                	</div>
                                    	<?php
				}
			?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="clearfix"></div>
			
            <section>
            	<div class="span12">
                	<div class="row">
                        <div class="span6">
                        	<div id="slides">
                            <div class="titlemore">
                                    <h3 class="pull-left" style="margin-bottom:0px;"><span class="slash-colored">//</span> <?php echo get_option('of_hp_blog_title');?></h3>
                                    <div class="pull-right"><a href="#" class="prev"></a><a href="#" class="next"></a></div>
								<div class="clearfix"></div>
                                </div>
                            	<div class="slides_container">
                                <?php
          $loop = new WP_Query('post_type=post&showposts=4'); 
          if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();
         ?>
                                        <div class="row">
                                            <div class="span3">
                                                <div class="view view-first nolink noshadow hidden-phone">
                                                
                                                  <?php 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home_latest_post_img' ); 
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
if ($image) : ?>
    <img src="<?php echo $image[0]; ?>" alt="" />
<?php endif; ?> 
                                               
                                             <br />
                                        <div class="mask">
                                                    <a href="<?php echo $url; ?>" rel="prettyPhoto" class="info"></a>
                                                
                                                </div>
                                                </div>
                                               <div class="meta hidden-phone"><br /><br /><br /><br /><br /><br />
                                    <h3 style="text-align:right"><?php the_time('F j, Y') ?> </h3><div class="margintop10"></div>
                                    <span><i class="icon-list-alt"></i> <?php the_category(' '); ?> &nbsp;&nbsp;&nbsp; 
                                    <i class="icon-user"></i> <?php _e('', 'themeText'); ?> <?php the_author(); ?>  &nbsp;&nbsp;&nbsp;
                                    <i class="icon-comment"></i> <?php comments_popup_link(__('No Comments', 'themeText'), __('1 Comment', 'themeText'), __( '% Comments', 'themeText') ); ?> </span>
                                    <hr>
                                    
            
                                </div>
                                            </div>
                                            <div class="span3">
                                               <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                             <div class="margintop10"></div>
												<?php wpe_excerpt('wpe_excerptlength_teaser', 'wpe_excerptmore'); ?>
                                                 <div class="read-more"><a href="<?php the_permalink(); ?>">Read more &rarr;</a></div>
                                            </div>
                                        </div><?php 
          endwhile; endif; 
         ?>
                                    
                        		
                                </div>
                            </div>
                        </div>
                        <?php if (get_option('of_hp_clients') == 'is_on'){ ?>
                        <div class="span6">
                        	<h3 class="titlemore"><span class="slash-colored">//</span> <?php echo get_option('of_hp_clients_title'); ?></h3>

                                 <div class="row">
                            	<div class="span6">
                            		<div class="row">
                                    	<div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client1_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client1_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client2_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client2_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client3_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client3_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            	</div>
                                
                                <div class="span6 clearfix"></div>
                                <div class="span6">
                            <div class="row">
                            	<div class="span6">
                            		<div class="row">
                                    	<div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client4_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client4_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client5_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client5_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span2 block">
                                        	<div class="view view-first noinfo">
                                                <img class="bordered" src="<?php echo get_option('of_client6_logo'); ?>" alt="" />
                                                <div class="mask">
                                                    <a href="<?php echo get_option('of_client6_url'); ?>" class="link"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            	</div>
                                
                                <div class="span6 clearfix"></div>
                                 <?php } ?>

                                                                
                            </div>
                        </div>
                    </div>
            	</div>
            
            
    	</div>
    </div></section></div></div>
    <!--PAGE CONTENT-->
    
	<!--FOOTER-->
   <?php get_footer(); ?>
    <!--/FOOTER-->

  