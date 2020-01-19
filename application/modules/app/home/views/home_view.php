<!--/ Carousel Star /-->
<div class="intro intro-carousel">
	<div id="carousel" class="owl-carousel owl-theme">
		<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo base_url()?>assets/img/slide-1.jpg)">
			<div class="overlay overlay-a"></div>
			<div class="intro-content display-table">
				<div class="table-cell">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="intro-body">
									<p class="intro-title-top">Doral, Florida
										<br> 78345</p>
									<h1 class="intro-title mb-4">
										<span class="color-b">204 </span> Mount
										<br> Olive Road Two</h1>
									<p class="intro-subtitle intro-price">
										<a href="#"><span class="price-a">rent | $ 12.000</span></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo base_url()?>assets/img/slide-2.jpg)">
			<div class="overlay overlay-a"></div>
			<div class="intro-content display-table">
				<div class="table-cell">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="intro-body">
									<p class="intro-title-top">Doral, Florida
										<br> 78345</p>
									<h1 class="intro-title mb-4">
										<span class="color-b">204 </span> Rino
										<br> Venda Road Five</h1>
									<p class="intro-subtitle intro-price">
										<a href="#"><span class="price-a">rent | $ 12.000</span></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo base_url()?>assets/img/slide-3.jpg)">
			<div class="overlay overlay-a"></div>
			<div class="intro-content display-table">
				<div class="table-cell">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="intro-body">
									<p class="intro-title-top">Doral, Florida
										<br> 78345</p>
									<h1 class="intro-title mb-4">
										<span class="color-b">204 </span> Alira
										<br> Roan Road One</h1>
									<p class="intro-subtitle intro-price">
										<a href="#"><span class="price-a">rent | $ 12.000</span></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ Carousel end /-->

<!--/ Services Star /-->
<section class="section-services section-t8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-wrap d-flex justify-content-between">
					<div class="title-box">
						<h2 class="title-a">Our Services</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if(!empty($services_rows)):?>
				<?php foreach ($services_rows AS $row_service): ?>
					<div class="col-md-4">
						<div class="card-box-c foo">
							<div class="card-header-c d-flex">
								<div class="card-box-ico">
									<img src="<?php echo base_url('assets/storage/files/services/'.$row_service->image)?>" width="106px" height="106px" alt="">
								</div>
								<div class="card-title-c align-self-center">
									<h2 class="title-c"><?php echo $row_service->name;?></h2>
								</div>
							</div>
							<div class="card-body-c">
								<p class="content-c">
									<?php echo $row_service->description;?>
								</p>
							</div>
							<div class="card-footer-c">
								<a href="<?php echo base_url('services/preview/'.$row_service->serviceId)?>" target="_blank" class="link-c link-icon">Leer mas
									<span class="ion-ios-arrow-forward"></span>
								</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif;?>
		</div>
	</div>
</section>
<!--/ Services End /-->

<!--/ Property Star /-->
<section class="section-property section-t8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-wrap d-flex justify-content-between">
					<div class="title-box">
						<h2 class="title-a">Latest Properties</h2>
					</div>
					<div class="title-link">
						<a href="property-grid.html">All Property
							<span class="ion-ios-arrow-forward"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="property-carousel" class="owl-carousel owl-theme">
			<div class="carousel-item-b">
				<div class="card-box-a card-shadow">
					<div class="img-box-a">
						<img src="<?php echo base_url()?>assets/img/property-6.jpg" alt="" class="img-a img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-overlay-a-content">
							<div class="card-header-a">
								<h2 class="card-title-a">
									<a href="property-single.html">206 Mount
										<br /> Olive Road Two</a>
								</h2>
							</div>
							<div class="card-body-a">
								<div class="price-box d-flex">
									<span class="price-a">rent | $ 12.000</span>
								</div>
								<a href="#" class="link-a">Click here to view
									<span class="ion-ios-arrow-forward"></span>
								</a>
							</div>
							<div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
									<li>
										<h4 class="card-info-title">Area</h4>
										<span>340m
                        					<sup>2</sup>
                      					</span>
									</li>
									<li>
										<h4 class="card-info-title">Beds</h4>
										<span>2</span>
									</li>
									<li>
										<h4 class="card-info-title">Baths</h4>
										<span>4</span>
									</li>
									<li>
										<h4 class="card-info-title">Garages</h4>
										<span>1</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-b">
				<div class="card-box-a card-shadow">
					<div class="img-box-a">
						<img src="<?php echo base_url()?>assets/img/property-3.jpg" alt="" class="img-a img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-overlay-a-content">
							<div class="card-header-a">
								<h2 class="card-title-a">
									<a href="property-single.html">157 West
										<br /> Central Park</a>
								</h2>
							</div>
							<div class="card-body-a">
								<div class="price-box d-flex">
									<span class="price-a">rent | $ 12.000</span>
								</div>
								<a href="property-single.html" class="link-a">Click here to view
									<span class="ion-ios-arrow-forward"></span>
								</a>
							</div>
							<div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
									<li>
										<h4 class="card-info-title">Area</h4>
										<span>340m
                        					<sup>2</sup>
                      					</span>
									</li>
									<li>
										<h4 class="card-info-title">Beds</h4>
										<span>2</span>
									</li>
									<li>
										<h4 class="card-info-title">Baths</h4>
										<span>4</span>
									</li>
									<li>
										<h4 class="card-info-title">Garages</h4>
										<span>1</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-b">
				<div class="card-box-a card-shadow">
					<div class="img-box-a">
						<img src="<?php echo base_url()?>assets/img/property-7.jpg" alt="" class="img-a img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-overlay-a-content">
							<div class="card-header-a">
								<h2 class="card-title-a">
									<a href="property-single.html">245 Azabu
										<br /> Nishi Park let</a>
								</h2>
							</div>
							<div class="card-body-a">
								<div class="price-box d-flex">
									<span class="price-a">rent | $ 12.000</span>
								</div>
								<a href="property-single.html" class="link-a">Click here to view
									<span class="ion-ios-arrow-forward"></span>
								</a>
							</div>
							<div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
									<li>
										<h4 class="card-info-title">Area</h4>
										<span>340m
                        					<sup>2</sup>
                      					</span>
									</li>
									<li>
										<h4 class="card-info-title">Beds</h4>
										<span>2</span>
									</li>
									<li>
										<h4 class="card-info-title">Baths</h4>
										<span>4</span>
									</li>
									<li>
										<h4 class="card-info-title">Garages</h4>
										<span>1</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-b">
				<div class="card-box-a card-shadow">
					<div class="img-box-a">
						<img src="<?php echo base_url()?>assets/img/property-10.jpg" alt="" class="img-a img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-overlay-a-content">
							<div class="card-header-a">
								<h2 class="card-title-a">
									<a href="property-single.html">204 Montal
										<br /> South Bela Two</a>
								</h2>
							</div>
							<div class="card-body-a">
								<div class="price-box d-flex">
									<span class="price-a">rent | $ 12.000</span>
								</div>
								<a href="property-single.html" class="link-a">Click here to view
									<span class="ion-ios-arrow-forward"></span>
								</a>
							</div>
							<div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
									<li>
										<h4 class="card-info-title">Area</h4>
										<span>340m
                        					<sup>2</sup>
                      					</span>
									</li>
									<li>
										<h4 class="card-info-title">Beds</h4>
										<span>2</span>
									</li>
									<li>
										<h4 class="card-info-title">Baths</h4>
										<span>4</span>
									</li>
									<li>
										<h4 class="card-info-title">Garages</h4>
										<span>1</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ Property End /-->

<!--/ News Star /-->
<section class="section-news section-t8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-wrap d-flex justify-content-between">
					<div class="title-box">
						<h2 class="title-a">Latest News</h2>
					</div>
					<div class="title-link">
						<a href="blog-grid.html">All News
							<span class="ion-ios-arrow-forward"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="new-carousel" class="owl-carousel owl-theme">
			<div class="carousel-item-c">
				<div class="card-box-b card-shadow news-box">
					<div class="img-box-b">
						<img src="<?php echo base_url()?>assets/img/post-2.jpg" alt="" class="img-b img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-header-b">
							<div class="card-category-b">
								<a href="#" class="category-b">House</a>
							</div>
							<div class="card-title-b">
								<h2 class="title-2">
									<a href="blog-single.html">House is comming
										<br> new</a>
								</h2>
							</div>
							<div class="card-date">
								<span class="date-b">18 Sep. 2017</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-c">
				<div class="card-box-b card-shadow news-box">
					<div class="img-box-b">
						<img src="<?php echo base_url()?>assets/img/post-5.jpg" alt="" class="img-b img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-header-b">
							<div class="card-category-b">
								<a href="#" class="category-b">Travel</a>
							</div>
							<div class="card-title-b">
								<h2 class="title-2">
									<a href="blog-single.html">Travel is comming
										<br> new</a>
								</h2>
							</div>
							<div class="card-date">
								<span class="date-b">18 Sep. 2017</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-c">
				<div class="card-box-b card-shadow news-box">
					<div class="img-box-b">
						<img src="<?php echo base_url()?>assets/img/post-7.jpg" alt="" class="img-b img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-header-b">
							<div class="card-category-b">
								<a href="#" class="category-b">Park</a>
							</div>
							<div class="card-title-b">
								<h2 class="title-2">
									<a href="blog-single.html">Park is comming
										<br> new</a>
								</h2>
							</div>
							<div class="card-date">
								<span class="date-b">18 Sep. 2017</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item-c">
				<div class="card-box-b card-shadow news-box">
					<div class="img-box-b">
						<img src="<?php echo base_url()?>assets/img/post-3.jpg" alt="" class="img-b img-fluid">
					</div>
					<div class="card-overlay">
						<div class="card-header-b">
							<div class="card-category-b">
								<a href="#" class="category-b">Travel</a>
							</div>
							<div class="card-title-b">
								<h2 class="title-2">
									<a href="#">Travel is comming
										<br> new</a>
								</h2>
							</div>
							<div class="card-date">
								<span class="date-b">18 Sep. 2017</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ News End /-->
