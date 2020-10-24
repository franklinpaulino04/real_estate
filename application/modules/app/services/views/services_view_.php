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
				<div class="grid-option"></div>
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
						<?php $page_result = ($segment == 1)? 1 : ($segment-1);?>
						<li class="page-item <?php echo ($segment <= 1)? 'disabled' : '';?>">
							<a class="page-link" href="<?php echo base_url('services/index/'.($page_result))?>" tabindex="-1">
								<span class="ion-ios-arrow-back"></span>
							</a>
						</li>

						<?php for ($i = 0; $i < $page; $i++): $for_count = ($i+1);?>
						<li class="page-item <?php echo ($segment == $for_count)? 'active' : '';?>">
							<a class="page-link" href="<?php echo base_url('services/index/'.$for_count)?>"><?php echo $for_count;?></a>
						</li>
						<?php endfor;?>

						<li class="page-item <?php echo ($segment >= $page )? 'disabled' : '';?>">
							<a class="page-link" href="<?php echo base_url('services/index/'.($segment+1))?>">
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
