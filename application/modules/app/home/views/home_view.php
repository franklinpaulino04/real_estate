<!--/ Carousel Star /-->
<div class="intro intro-carousel">
	<div id="carousel" class="owl-carousel owl-theme">
		<?php if(!empty($properties_rows)):?>
		<?php foreach ($properties_rows AS $row_properties): ?>
				<div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>)">
				<div class="overlay overlay-a"></div>
					<div class="intro-content display-table">
						<div class="table-cell">
							<div class="container">
								<div class="row">
									<div class="col-lg-8">
										<div class="intro-body">
											<p class="intro-title-top"><?php echo $row_properties->address;?></p>
											<h1 class="intro-title mb-4">
												<span class="color-b"><?php echo $row_properties->name;?> </span> </h1>
											<p class="intro-subtitle intro-price">
												<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>"><span class="price-a"><?php echo $row_properties->category;?> | $ <?php echo number_format($row_properties->price);?></span></a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif;?>
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
						<h2 class="title-a">Nuestros servicios</h2>
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
						<h2 class="title-a">Últimas propiedades</h2>
					</div>
					<div class="title-link">
						<a href="property-grid.html">Todas las propiedades
							<span class="ion-ios-arrow-forward"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="property-carousel" class="owl-carousel owl-theme">
			<?php if(!empty($properties_rows)):?>
				<?php foreach ($properties_rows AS $row_properties): ?>
					<div class="carousel-item-b">
						<div class="card-box-a card-shadow">
							<div class="img-box-a">
								<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" alt="" class="img-a img-fluid">
							</div>
							<div class="card-overlay">
								<div class="card-overlay-a-content">
									<div class="card-header-a">
										<h2 class="card-title-a">
											<a href="property-single.html"><?php echo $row_properties->name;?></a>
										</h2>
									</div>
									<div class="card-body-a">
										<div class="price-box d-flex">
											<span class="price-a">renta | $<?php echo number_format($row_properties->price);?></span>
										</div>
										<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" class="link-a">Haz clic aquí para ver
											<span class="ion-ios-arrow-forward"></span>
										</a>
									</div>
									<div class="card-footer-a">
										<ul class="card-info d-flex justify-content-around">
											<li>
												<h4 class="card-info-title">Area</h4>
												<span><?php echo $row_properties->area;?>m
													<sup>2</sup>
												</span>
											</li>
											<li>
												<h4 class="card-info-title">Baños</h4>
												<span><?php echo $row_properties->bathrooms;?></span>
											</li>
											<li>
												<h4 class="card-info-title">Habitaciones</h4>
												<span><?php echo $row_properties->rooms;?></span>
											</li>
											<li>
												<h4 class="card-info-title">Garages</h4>
												<span><?php echo $row_properties->garage;?></span>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif;?>
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
						<h2 class="title-a">Últimas noticias</h2>
					</div>
					<div class="title-link">
						<a href="blog-grid.html">Todas las noticias
							<span class="ion-ios-arrow-forward"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="new-carousel" class="owl-carousel owl-theme">
			<?php if(!empty($properties_rows)):?>
			<?php foreach ($properties_rows AS $row_properties): ?>
					<div class="carousel-item-c">
						<div class="card-box-b card-shadow news-box">
							<div class="img-box-b">
								<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" alt="" class="img-b img-fluid">
							</div>
							<div class="card-overlay">
								<div class="card-header-b">
									<div class="card-category-b">
										<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" class="category-b"><?php echo $row_properties->category;?></a>
									</div>
									<div class="card-title-b">
										<h2 class="title-2">
											<a href="blog-single.html"><?php echo $row_properties->type;?><br> new</a>
										</h2>
									</div>
									<div class="card-date">
										<span class="date-b">
											<?php $date = strtotime( $row_properties->date_issue);
												echo date('Y/m/d', $date); ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif;?>
		</div>
	</div>
</section>
<!--/ News End /-->
