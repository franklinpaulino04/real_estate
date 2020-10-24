<!--/ Intro Single star /-->
<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="title-single-box">
					<h1 class="title-single">Todas las Propiedades</h1>
					<span class="color-text-a">Propiedades</span>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('home/index')?>">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Propiedades
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--/ Intro Single End /-->

<!--/ Property Grid Star /-->
<section class="property-grid grid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"></div>
			<?php if(!empty($properties_rows)):?>
				<?php foreach ($properties_rows AS $row_propertie): ?>
					<div class="col-md-4">
						<div class="card-box-a card-shadow">
							<div class="img-box-a">
								<img src="<?php echo base_url('assets/storage/files/properties/'.$row_propertie->original_name)?>" style="width: 350px !important; height: 470px !important;" alt="" class="img-a img-fluid">
							</div>
							<div class="card-overlay">
							<div class="card-overlay-a-content">
								<div class="card-header-a">
									<h2 class="card-title-a">
										<a href="#"><?php echo $row_propertie->name;?>
											<br /> <?php echo $row_propertie->address;?></a>
									</h2>
								</div>
								<div class="card-body-a">
									<div class="price-box d-flex">
										<span class="price-a">$<?php echo number_format($row_propertie->price,2);?></span>
									</div>
									<a href="<?php echo base_url('properties/preview/'.$row_propertie->propertyId)?>" target="_blank" class="link-a">Haz clic aquí para ver
										<span class="ion-ios-arrow-forward"></span>
									</a>
								</div>
								<div class="card-footer-a">
									<ul class="card-info d-flex justify-content-around">
										<li>
											<h4 class="card-info-title">Area</h4>
											<span><?php echo $row_propertie->area;?>m<sup>2</sup></span>
										</li>
										<li>
											<h4 class="card-info-title">Habitaciones</h4>
											<span><?php echo $row_propertie->rooms;?></span>
										</li>
										<li>
											<h4 class="card-info-title">Baños</h4>
											<span><?php echo $row_propertie->bathrooms;?></span>
										</li>
										<li>
											<h4 class="card-info-title">Garage</h4>
											<span><?php echo $row_propertie->garage;?></span>
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
		<div class="row">
			<div class="col-sm-12">
				<nav class="pagination-a">
					<ul class="pagination justify-content-end">
						<?php $page_result = ($segment == 1)? 1 : ($segment-1);?>
						<li class="page-item <?php echo ($segment <= 1)? 'disabled' : '';?>">
							<a class="page-link" href="<?php echo base_url('properties/index/'.($page_result))?>" tabindex="-1">
								<span class="ion-ios-arrow-back"></span>
							</a>
						</li>

						<?php for ($i = 0; $i < $page; $i++): $for_count = ($i+1);?>
							<li class="page-item <?php echo ($segment == $for_count)? 'active' : '';?>">
								<a class="page-link" href="<?php echo base_url('properties/index/'.$for_count)?>"><?php echo $for_count;?></a>
							</li>
						<?php endfor;?>

						<li class="page-item <?php echo ($segment >= $page )? 'disabled' : '';?>">
							<a class="page-link" href="<?php echo base_url('properties/index/'.($segment+1))?>">
								<span class="ion-ios-arrow-forward"></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--/ Property Grid End /-->
