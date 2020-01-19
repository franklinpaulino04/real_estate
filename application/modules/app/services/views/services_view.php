<!--/ Intro services star /-->
<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="title-single-box">
					<h1 class="title-single">Todos los Servicios</h1>
					<span class="color-text-a">servicios</span>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('services/index');?>">Servicios</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Todos los servicios
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--/ Intro services End /-->

<!--/ services Grid Star /-->
<section class="property-grid grid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="grid-option">
					<form>
						<select class="custom-select">
							<option selected>All</option>
							<option value="1">New to Old</option>
							<option value="2">For Rent</option>
							<option value="3">For Sale</option>
						</select>
					</form>
				</div>
			</div>
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
		<div class="row">
			<div class="col-sm-12">
				<nav class="pagination-a">
					<ul class="pagination justify-content-end">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">
								<span class="ion-ios-arrow-back"></span>
							</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">1</a>
						</li>
						<li class="page-item active">
							<a class="page-link" href="#">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="#">3</a>
						</li>
						<li class="page-item next">
							<a class="page-link" href="#">
								<span class="ion-ios-arrow-forward"></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--/ services Grid End /-->
