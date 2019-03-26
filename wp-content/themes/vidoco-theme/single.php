<?php
get_header();
$post_id=0;
$title="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
$permalink="";
$date_post="";
$term_slug="";
if(have_posts()){
	while (have_posts()) {
		the_post();                            
        $post_id=get_the_ID(); 
        $title=get_the_title($post_id);    
        $excerpt=get_the_excerpt( $post_id );
        $content=get_the_content( $post_id);
        $permalink=get_the_permalink( $post_id );
        $date_post=get_the_date('d/m/Y',@$post_id);    
        $source_term = wp_get_object_terms( $post_id,  'category' );          
        $term_slug=$source_term[0]->slug;
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');                   
        if(count($source_term) > 0){
            foreach ($source_term as $key => $value) {
                $source_term_id[]=$value->term_id;
            }
        }    
	}
	wp_reset_postdata();  
}
$box_news="box_diem_kinh_doanh_chi_tiet";
if(strcmp($term_slug, 'tin-tuc')==0){
	$box_news="box_news_detail";
}
?>
<div class="<?php echo $box_news; ?>">
	<div class="container">		
		<div class="row">
			<div class="col-lg-9">
				<h1 class="diem_kd_h"><?php echo $title; ?></h1>
				<div class="news_published_date">
					<span><img src="<?php echo P_IMG.'/calendar.png'; ?>"></span>
					<span class="published_date_txt"><?php echo $date_post; ?></span>
				</div>
				<div>
					<?php 
							if(have_posts()){
								while (have_posts()) {
									the_post();                            
									the_content();
								}
								wp_reset_postdata();  
							}
							?>
				</div>
				<div class="binhluan">Bình luận</div>
				<div>
					<div class="fb-comments" data-href="<?php echo @$permalink; ?>" data-numposts="5"></div>
				</div>
			</div>
			<div class="col-lg-3">
				<?php 
				$args = array(
					'post_type' => 'post',  
					'orderby' => 'id',
					'order'   => 'DESC',  
					'posts_per_page' => 3,        
					'post__not_in'=>array($post_id),
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => @$source_term_id,                   
						),
					),
				);
				$the_query=new WP_Query($args);  
				if($the_query->have_posts()){
					switch ($term_slug) {
						case 'tin-tuc':						
						?>
						<div class="business_position_other">
							<div class="business_position_other_left"><img src="<?php echo P_IMG.'/news-icon.png'; ?>"></div>
							<h2 class="business_position_other_right">						
								Tin tức liên quan
							</h2>
							<div class="clr"></div>					
						</div>	
						<div class="business_position_other_box">
							<?php 
							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_id=$the_query->post->ID;
								$permalink=get_the_permalink($post_id);
								$title=wp_trim_words( get_the_title($post_id), 5, '...') ;							
								$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
								?>
								<div class="diemkinhdoanhv2">
									<div class="dkdimg">
										<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">
											<img src="<?php echo $featured_img; ?>" alt="<?php echo $title; ?>">
										</a>
									</div>
									<div class="business_item_title">
										<h3><a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>" ><?php echo $title; ?></a></h3>
									</div>
									<div class="clr"></div>
								</div>
								<?php
							}						
							?>					
						</div>
						<?php										
						break;					
						default:
						?>
						<div class="business_position_other">
							<div class="business_position_other_left"><img src="<?php echo P_IMG.'/icon-home.png'; ?>"></div>
							<h2 class="business_position_other_right">	
								<?php 
								if(strcmp($term_slug,'diem-kinh-doanh') == 0){
									echo 'Điểm kinh doanh khác';
								}else{
									echo 'Trạm dừng chân khác';
								}
								?>													
							</h2>
							<div class="clr"></div>
						</div>
						<div class="line_circle"><img src="<?php echo P_IMG.'/line-circle.png'; ?>"></div>
						<div class="business_position_other_box">
							<?php 

							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_id=$the_query->post->ID;
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id) ;							
								$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
								?>
								<div class="diemkinhdoanhv2">
									<a href="<?php echo $permalink; ?>">
							<div class="overlay"></div>
							<div class="dkdimg">
								<img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
							</div>
							<div class="business_item_title">
								<h3><?php echo @$title; ?></h3>
							</div>
						</a>
								</div>
								<?php
							}									
							?>					
						</div>
						<?php						
						break;
					}
					wp_reset_postdata();	
				}			
				if(strcmp($term_slug, 'tin-tuc') == 0){
					$source_social=get_field('op_inf_sn_repeat','option');		
					?>
					<div class="box_social_network">
						<h3 class="social_net_work_title">Social network</h3>
						<div class="social_nw_line"></div>
						<div class="social_real">
							<div class="social_w social_left">
								<div class="social_facebook"><a target="_blank" rel="nofollow" href="<?php echo $source_social[0]['op_inf_sn_repeat_link']; ?>" title="social"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
							</div>
							<div class="social_w social_right">
								<div class="social_google_plus"><a target="_blank" rel="nofollow" href="<?php echo $source_social[3]['op_inf_sn_repeat_link']; ?>" title="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a></div>
							</div>		
							<div class="clr"></div>				
						</div>
						<div class="social_real">
							<div class="social_w social_left">
								<div class="social_pinterest"><a target="_blank" rel="nofollow" href="<?php echo $source_social[4]['op_inf_sn_repeat_link']; ?>" title="social"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></div>
							</div>
							<div class="social_w social_right">
								<div class="social_twitter"><a target="_blank" rel="nofollow" href="<?php echo $source_social[1]['op_inf_sn_repeat_link']; ?>" title="social"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
							</div>			
							<div class="clr"></div>							
						</div>
					</div>
					<?php
				}				
				?>														
			</div>
		</div>
	</div>
</div>
<?php
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>