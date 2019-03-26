<?php 
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
$args = $wp_query->query;	
$args['orderby']='id';
$args['order']='DESC';		
$s="";
if(isset($_POST["s"])){
	$s=trim($_POST["s"]);
}
if(!empty(@$s)){		
	$args["s"] =@$s;
}	 
$wp_query->query($args);
$the_query=$wp_query;	
/* start setup pagination */
$totalItemsPerPage=get_option( 'posts_per_page' );
$pageRange=3;
$currentPage=1; 
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
/* end setup pagination */
$source_article=array();
if($the_query->have_posts()){
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$post_id=$the_query->post->ID;                                                                      
		$permalink=get_the_permalink($post_id);         
		$title=get_the_title($post_id);
		$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
		$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
		$date_post='';
		$date_post=get_the_date('d/m/Y',@$post_id);      
		$row_article["title"]=$title;
		$row_article["permalink"]=$permalink;
		$row_article["featured_img"]=$featured_img;
		$row_article["date_post"]=$date_post;
		$row_article["excerpt"]=$excerpt;
		$source_article[]=$row_article;
	}
	wp_reset_postdata();	
}  
?>
<form name="frm_prduct_lst" method="POST">
	<input type="hidden" name="filter_page" value="1" />
	<input type="hidden" name="s" value="<?php echo @$s; ?>" />
	<div class="category_box">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="category_name"><?php single_cat_title(); ?></h1>
					<div class="category_pan">
						<div class="row">
							<div class="col-md-5">
								<?php 
								if(count($source_article) > 1){
									for ($i=0; $i < 2 ; $i++) { 
										?>
										<div class="article_item">
											<div class="article_item_img">												
												<a href="<?php echo $source_article[$i]['permalink']; ?>" title="<?php echo $source_article[$i]['title']; ?>">
													<figure>
														<div style="background-image: url(<?php echo $source_article[$i]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600 / 400))"></div>
													</figure>						
												</a>	
											</div>
											<h2 class="article_item_title"><a href="<?php echo $source_article[$i]['permalink']; ?>" title="<?php echo $source_article[$i]['title']; ?>"><?php echo $source_article[$i]['title']; ?></a></h2>
											<div class="article_item_published_date">
												<span><img src="<?php echo P_IMG.'/calendar.png'; ?>"></span>
												<span class="article_item_sp_date"><?php echo $source_article[$i]['date_post']; ?></span>
											</div>
											<div class="article_item_intro">
												<?php echo $source_article[$i]['excerpt']; ?>
											</div>
										</div>
										<?php
									}
								}								
								?>							
							</div>
							<div class="col-md-7">
								<div class="box_article2">
									<?php 
									for ($i=2; $i < ($the_query->post_count) ; $i++) { 
										?>
										<div class="article_item2">
											<div class="row">
												<div class="col-lg-4 col-sm-5">
													<div class="article_item2_img">														
														<a href="<?php echo $source_article[$i]['permalink']; ?>" title="<?php echo $source_article[$i]['title']; ?>">
															<figure>
																<div style="background-image: url(<?php echo $source_article[$i]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600 / 400))"></div>
															</figure>						
														</a>	
													</div>
												</div>
												<div class="col-lg-8 col-sm-7">
													<div class="article_item2_info">
														<h3 class="article_item2_title">
															<a href="<?php echo $source_article[$i]['permalink']; ?>" title="ten"><?php echo $source_article[$i]['title']; ?>
														</a>
													</h3>
													<div class="article_item2_published_date">
														<span><img src="<?php echo P_IMG.'/calendar.png'; ?>"></span>
														<span class="article_item_sp_date"><?php echo $source_article[$i]['date_post']; ?></span>
													</div>
													<div class="article_item2_intro">
														<?php echo $source_article[$i]['excerpt']; ?>
													</div>
												</div>
											</div>
										</div>																
									</div>
									<?php
								}
								?>	
							</div>		
							<?php 
							echo @$pagination->showPagination();   
							?>																		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<?php     
include get_template_directory() . "/block/block-partner.php";
get_footer();
?>