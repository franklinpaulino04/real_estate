<!--/ Intro services star /-->
<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-7">
				<div class="title-single-box">
					<h1 class="title-single"><?php echo $row->name;?></h1>
					<span class="color-text-a">Agente Immobiliario</span>
				</div>
			</div>
			<div class="col-md-12 col-lg-5">
				<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo base_url('services/index');?>">Servicios</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">preview</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $row->name;?>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--/ Intro services End /-->

<!--/ services Star /-->
<section class="agent-single">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-md-6">
						<div class="agent-avatar-box">
							<img class="agent-avatar img-fluid" src="<?php echo base_url('assets/storage/files/services/'.$row->image)?>" alt="">
						</div>
					</div>
					<div class="col-md-5 section-md-t3">
						<div class="agent-info-box">
							<div class="agent-title">
								<div class="title-box-d">
									<h3 class="title-d"><?php echo $row->name;?></h3>
								</div>
							</div>
							<div class="agent-content mb-3">
								<p class="content-d color-text-a">
									<?php echo $row->description;?>
								</p>
								<div class="info-agents color-a">
									<p>
										<strong>Telefono: </strong>
										<span class="color-text-a"> +<?php echo $row->phone;?> </span>
									</p>
									<p>
										<strong>Celular: </strong>
										<span class="color-text-a"> +<?php echo $row->mobile;?></span>
									</p>
									<p>
										<strong>Correo: </strong>
										<span class="color-text-a"> <?php echo $row->correo;?></span>
									</p>
								</div>
							</div>
							<div class="socials-footer">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="#" class="link-one">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="link-one">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="link-one">
											<i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="link-one">
											<i class="fa fa-pinterest-p" aria-hidden="true"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a href="#" class="link-one">
											<i class="fa fa-dribbble" aria-hidden="true"></i>
										</a>
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
<!--/ services End /-->
