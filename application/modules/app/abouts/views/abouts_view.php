<!--/ About Star /-->
<section class="section-about">
	<div class="container">
		<div class="row">
<!--			<div class="col-sm-12">-->
<!--				<div class="about-img-box col-md-6 col-lg-5">-->
<!--					<img src="--><?php //echo base_url()?><!--assets/img/logo.jpg" alt="" class="img-fluid logo-t">-->
<!--				</div>-->
<!--			</div>-->
			<div class="col-md-12 section-t8">
				<div class="row">
					<div class="col-md-6 col-lg-5">
						<img src="<?php echo base_url()?>assets/img/logo.jpg" alt="" class="img-fluid img-about">
					</div>
<!--					<div class="col-lg-2  d-none d-lg-block">-->
<!--						<div class="title-vertical d-flex justify-content-start">-->
<!--							<span>EstateAgency Exclusive Property</span>-->
<!--						</div>-->
<!--					</div>-->
					<div class="col-md-6 col-lg-5 section-md-t3">
						<div class="title-box-d">
							<h3 class="title-d">INMOBILIARIA F PERALTA
								<br> <span style="color: #2eca6a">& ASOCIADOS</span>.</h3>
						</div>
						<p class="color-text-a">
							Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget
							consectetur sed, convallis
							at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum
							ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
							neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
						</p>
						<p class="color-text-a">
							Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
							Mauris blandit aliquet
							elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed,
							convallis at tellus.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ About End /-->

<!--/ Team Star /-->
<section class="section-agents section-t8">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title-wrap d-flex justify-content-between">
					<div class="title-box">
						<h2 class="title-a">Conozca a nuestro equipo</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if(!empty($data_rows)):?>
				<?php foreach($data_rows AS $data_row):?>
					<div class="col-md-4">
					<div class="card-box-d">
						<div class="card-img-d">
							<img src="<?php echo base_url()?>assets/storage/files/employees/<?php echo $data_row->image;?>" alt="" class="img-d img-fluid">
						</div>
						<div class="card-overlay card-overlay-hover">
							<div class="card-header-d">
								<div class="card-title-d align-self-center">
									<h3 class="title-d">
										<a href="agent-single.html" class="link-two"><?php echo $data_row->first_name;?>
											<br> <?php echo $data_row->last_name;?></a>
									</h3>
								</div>
							</div>
							<div class="card-body-d">
								<p class="content-d color-text-a"><?php echo $data_row->description;?>.</p>
								<div class="info-agents color-a">
									<p><strong>Telefono: </strong> <?php echo $data_row->phone;?></p><p>
									<p><strong>Celular: </strong> <?php echo $data_row->mobile;?></p>
									<p><strong>Correo: </strong> <?php echo $data_row->email;?></p>
								</div>
							</div>
<!--							<div class="card-footer-d">-->
<!--								<div class="socials-footer d-flex justify-content-center">-->
<!--									<ul class="list-inline">-->
<!--										<li class="list-inline-item">-->
<!--											<a href="#" class="link-one">-->
<!--												<i class="fa fa-facebook" aria-hidden="true"></i>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li class="list-inline-item">-->
<!--											<a href="#" class="link-one">-->
<!--												<i class="fa fa-twitter" aria-hidden="true"></i>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li class="list-inline-item">-->
<!--											<a href="#" class="link-one">-->
<!--												<i class="fa fa-instagram" aria-hidden="true"></i>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li class="list-inline-item">-->
<!--											<a href="#" class="link-one">-->
<!--												<i class="fa fa-pinterest-p" aria-hidden="true"></i>-->
<!--											</a>-->
<!--										</li>-->
<!--										<li class="list-inline-item">-->
<!--											<a href="#" class="link-one">-->
<!--												<i class="fa fa-dribbble" aria-hidden="true"></i>-->
<!--											</a>-->
<!--										</li>-->
<!--									</ul>-->
<!--								</div>-->
<!--							</div>-->
						</div>
					</div>
				</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</section>
<!--/ Team End /-->
