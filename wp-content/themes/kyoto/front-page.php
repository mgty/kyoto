<?php get_header();?>
<!-- <div class="container">
    <div class="row">
            <div class="col">
                <?php if (have_posts()) : while(have_posts()) : the_post();?>

                <?php the_content();?>

                <?php endwhile; endif;?>
            </div>
    </div>
</div> -->


<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="http://localhost:8888/kyoto/wp-content/uploads/2020/03/tilt-shift-photography-of-maki-681586-e1583508994327.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://localhost:8888/kyoto/wp-content/uploads/2020/03/rolled-rice-with-vegetables-1052189.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="http://localhost:8888/kyoto/wp-content/uploads/2020/03/person-slicing-meat-on-white-chopping-board-1409050.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->


<div class="container-fluid">
<?php the_content();?>
		
</div>

<div class="hero-background container-fluid no-padding" 
	role="banner" 
	style="background-image: url('<?php echo get_field('hero_background')['url'];?>')" >

	<div class="hero-row row">
		<div class="col-md-6 col-sm-12">

			<div class="generic-background container-fluid no-padding" 
				role="banner" 
				style="background-image: url('<?php echo get_field('generic_background')['url'];?>')" >
			</div>

		
			<img class="hero-img" 
				role="banner" 
				src="<?php echo get_field('hero_image')['url'];?>" >
  		</div>

  		<div class="hero-text-col col-md-6 col-sm-12">
  			<p class="bold-title"><?php the_field('hero_title');?></p>
  			<p class="reg-text"><?php the_field('hero_subtitle');?></p>
  		</div>
  	</div>
</div>




<div class="testimonial-section container-fluid">
	<?php $testimonial = get_field('testimonial');?>
	<p class="testimonial-title"><?php echo $testimonial['testimonial_title']; ?></p>
	<div class="white-bg row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
		    		<img class="testimonial-image" src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" />
				</div>

				<div class="col-md-6">
			        <div class="content">
			        	<p class="reg-text"><?php echo $testimonial['testimonial_text']; ?></p>

			        	
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<p class="reg-text"><?php echo $testimonial['extra_testimonial_text']; ?></p>
					<p class="med-text"><?php echo $testimonial['testimonial_author'].", ".$testimonial['location']; ?></p>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="row">
				<div class="testimonial-col col-md-6">
					<?php $testimonial_2 = get_field('testimonial_2');?>
					<img class="testimonial-image" src="<?php echo esc_url( $testimonial_2['image']['url'] ); ?>" />
				</div>

				<div class="col-md-6">
					<div class="content">
			        	<p class="reg-text"><?php echo $testimonial_2['testimonial_text']; ?></p>
			        	<p class="med-text"><?php echo $testimonial_2['testimonial_author'].", ".$testimonial_2['location']; ?></p>
			        </div>					
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
					<?php $testimonial_3 = get_field('testimonial_3');?>
					<img class="testimonial-image" src="<?php echo esc_url( $testimonial_3['image']['url'] ); ?>" />

				</div>

				<div class="col-md-6">
					<div class="content">
			        	<p class="reg-text"><?php echo $testimonial_3['testimonial_text']; ?></p>
			        	<p class="med-text"><?php echo $testimonial_3['testimonial_author'].", ".$testimonial_3['location']; ?></p>
			        </div>					
				</div>

				</div>
			</div>


		</div>


	</div>
</div>

<div class="img-background container-fluid" 
	role="banner" 
	style="background-image: url('<?php echo get_field('generic_background')['url'];?>')" >

	<div class="colored-bg row">
		<div class="col-lg-2 col-md-6 col-sm-12 ">
			<?php $selection_1 = get_field('selection_1');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_1['selection_title_1']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_1['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_1['selection_description_1']; ?></p>
				</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-sm-12 ">
			<?php $selection_2 = get_field('selection_2');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_2['selection_title_2']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_2['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_2['selection_description_2']; ?></p>
				</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-sm-12 ">
			<?php $selection_3 = get_field('selection_3');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_3['selection_title_3']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_3['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_3['selection_description_3']; ?></p>
				</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-sm-12 ">
			<?php $selection_4 = get_field('selection_4');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_4['selection_title_4']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_4['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_4['selection_description_4']; ?></p>
				</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-sm-12 ">
			<?php $selection_5 = get_field('selection_5');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_5['selection_title_5']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_5['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_5['selection_description_5']; ?></p>
				</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-xs-12 ">
			<?php $selection_6 = get_field('selection_6');?>
				<div class="section-col">
					<p class="bold-title"><?php echo $selection_6['selection_title_6']; ?></p>
	    			<img class="selection-image" src="<?php echo esc_url( $selection_6['image']['url'] ); ?>" />
	    			<p class="selection-text"><?php echo $selection_6['selection_description_6']; ?></p>
				</div>
  		</div>

  	</div>
</div>


<div class="blog-container container-fluid no-padding">
	<p class="testimonial-title"><?php the_field('blog_title');?></p>
	<div class="row">
		<div class="col-lg-3 col-md-6 col-xs-12">
			<?php $blog_1 = get_field('blog_1');?>
				<div class="top-blog-col blog-col">
					
	    			<img class="blog-image" src="<?php echo esc_url( $blog_1['image']['url'] ); ?>" />
	    			<p class="bold-title"><?php echo $blog_1['blog_subtitle_1']; ?></p>
	    			<p class="blog-text"><?php echo $blog_1['blog_description_1']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $blog_1['blog_link_1']['url'] ); ?>"><?php echo esc_html( $blog_1['blog_link_1']['title'] ); ?></a>


				</div>
		</div>

		<div class="col-lg-3 col-md-6 col-xs-12">
			<?php $blog_2 = get_field('blog_2');?>
				<div class="top-blog-col blog-col">
	    			<img class="blog-image" src="<?php echo esc_url( $blog_2['image']['url'] ); ?>" />
	    			<p class="bold-title"><?php echo $blog_2['blog_subtitle_2']; ?></p>
	    			<p class="blog-text"><?php echo $blog_2['blog_description_2']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $blog_2['blog_link_2']['url'] ); ?>"><?php echo esc_html( $blog_2['blog_link_2']['title'] ); ?></a>
				</div>
			
		</div>

		<div class="col-lg-3 col-md-6 col-xs-12">
			<?php $blog_3 = get_field('blog_3');?>
				<div class="blog-col">
	    			<img class="blog-image" src="<?php echo esc_url( $blog_3['image']['url'] ); ?>" />
	    			<p class="bold-title"><?php echo $blog_3['blog_subtitle_3']; ?></p>
	    			<p class="blog-text"><?php echo $blog_3['blog_description_3']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $blog_3['blog_link_3']['url'] ); ?>"><?php echo esc_html( $blog_3['blog_link_3']['title'] ); ?></a>
				</div>
			
		</div>

		<div class="col-lg-3 col-md-6 col-xs-12">
			<?php $blog_4 = get_field('blog_4');?>
				<div class="blog-col">
	    			<img class="blog-image" src="<?php echo esc_url( $blog_4['image']['url'] ); ?>" />
	    			<p class="bold-title"><?php echo $blog_4['blog_subtitle_4']; ?></p>
	    			<p class="blog-text"><?php echo $blog_4['blog_description_4']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $blog_4['blog_link_4']['url'] ); ?>"><?php echo esc_html( $blog_4['blog_link_4']['title'] ); ?></a>
				</div>
			
		</div>
	</div>

</div>



<!--Articles-->
<div class="img-background container-fluid" 
	role="banner" 
	style="background-image: url('<?php echo get_field('generic_background')['url'];?>')" >


	<div class="white-bg row">
		<div class="col-md-4 col-xs-12">
			<?php $article_1 = get_field('article_1');?>
				<div class="blog-col">
	    			<p class="bold-title"><?php echo $article_1['title']; ?></p>
	    			<p class="blog-text"><?php echo $article_1['preview']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $article_1['link']['url'] ); ?>"><?php echo esc_html( $article_1['link']['title'] ); ?></a>
				</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<?php $article_2 = get_field('article_2');?>
				<div class="blog-col">
	    			<p class="bold-title"><?php echo $article_2['title']; ?></p>
	    			<p class="blog-text"><?php echo $article_2['preview']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $article_2['link']['url'] ); ?>"><?php echo esc_html( $article_2['link']['title'] ); ?></a>
				</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<?php $article_3 = get_field('article_1');?>
				<div class="blog-col">
	    			<p class="bold-title"><?php echo $article_3['title']; ?></p>
	    			<p class="blog-text"><?php echo $article_3['preview']; ?></p>
	    			<a class="blog-link" href="<?php echo esc_url( $article_3['link']['url'] ); ?>"><?php echo esc_html( $article_3['link']['title'] ); ?></a>
				</div>
		</div>

	</div>

</div>










<?php get_footer();?>

