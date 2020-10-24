<!--/ Intro Single star /-->
<section class="intro-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="title-single-box">
					<h1 class="title-single"><?php echo $row->name;?></h1>
					<span class="color-text-a"><?php echo $row->address;?></span>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">Home</a>
						</li>
						<li class="breadcrumb-item">
							<a href="property-grid.html">Properties</a>
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
<!--/ Intro Single End /-->

<!--/ Property Single Star /-->
<section class="property-single nav-arrow-b">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
					<?php if(!empty($row_docs)):?>
						<?php foreach ($row_docs AS $key):?>
							<div class="carousel-item-b">
								<img src="<?php echo base_url('assets/storage/files/properties/'.$key->original_name);?>" alt="">
							</div>
						<?php endforeach;?>
					<?php endif;?>
				</div>
				<div class="row justify-content-between">
					<div class="col-md-5 col-lg-4">
						<div class="property-price d-flex justify-content-center foo">
							<div class="card-header-c d-flex">
								<div class="card-box-ico">
									<span class="ion-money">$</span>
								</div>
								<div class="card-title-c align-self-center">
									<h5 class="title-c">$<?php echo number_format($row->price,2);?></h5>
								</div>
							</div>
						</div>
						<div class="property-summary">
							<div class="row">
								<div class="col-sm-12">
									<div class="title-box-d section-t4">
										<h3 class="title-d">Sumario rápido</h3>
									</div>
								</div>
							</div>
							<div class="summary-list">
								<ul class="list">
									<li class="d-flex justify-content-between">
										<strong>ID de propiedad:</strong>
										<span><?php echo $row->number;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Ubicación:</strong>
										<span><?php echo $row->address;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Tipo de propiedad:</strong>
										<span><?php echo $row->category;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Estado:</strong>
										<span><?php echo $row->type;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Área:</strong>
										<span><?php echo $row->area;?>m
                        					<sup>2</sup>
                      					</span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Habitaciones:</strong>
										<span><?php echo $row->rooms;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Baños:</strong>
										<span><?php echo $row->bathrooms;?></span>
									</li>
									<li class="d-flex justify-content-between">
										<strong>Garage:</strong>
										<span><?php echo $row->garage;?></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-lg-7 section-md-t3">
						<div class="row">
							<div class="col-sm-12">
								<div class="title-box-d">
									<h3 class="title-d">Descripción de propiedad</h3>
								</div>
							</div>
						</div>
						<div class="property-description">
							<p class="description color-text-a">
								<?php echo $row->description;?>
							</p>
						</div>
						<div class="row section-t3">
							<div class="col-sm-12">
								<div class="title-box-d">
									<h3 class="title-d">Comodidades</h3>
								</div>
							</div>
						</div>
						<div class="amenities-list color-text-a">
							<ul class="list-a no-margin">
								<?php if(isset($row->amenities)):?>
									<?php foreach (explode(',', $row->amenities) AS $k ):?>
											<li><?php echo $k;?></li>
									<?php endforeach; ?>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10 offset-md-1">
				<ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
						   aria-selected="false">Ubication</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
						<?php echo $row->video;?>
					</div>
					<div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
						<?php echo $row->address_frame;?>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row section-t3">
					<div class="col-sm-12">
						<div class="title-box-d">
							<h3 class="title-d">Agente de contacto</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<img src="<?php echo base_url('assets/storage/files/avatars/'.$row_users->image);?>" alt="" class="img-fluid">
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="property-agent">
							<h4 class="title-agent"><?php echo $row_users->first_name.''.$row_users->last_name;?></h4>
							<ul class="list-unstyled">
								<li class="d-flex justify-content-between">
									<strong>Telefono:</strong>
									<span class="color-text-a"><?php echo $row_users->phone;?></span>
								</li>
								<li class="d-flex justify-content-between">
									<strong>Celular:</strong>
									<span class="color-text-a"><?php echo $row_users->mobile;?></span>
								</li>
								<li class="d-flex justify-content-between">
									<strong>Email:</strong>
									<span class="color-text-a"><?php echo $row_users->email;?></span>
								</li>
							</ul>
							<div class="socials-a">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<div class="property-contact">
							<form class="form-a" id="sent-mail" action="<?php echo base_url()?>properties/send_mail">
								<div class="response"></div>
								<div class="row">
									<div class="col-md-12 mb-1">
										<div class="form-group">
											<input type="text" name="to_name" class="form-control form-control-lg form-control-a" id="to_name" placeholder="Nombre *" required>
										</div>
									</div>
									<div class="col-md-12 mb-1">
										<div class="form-group">
											<input type="text" name="title" class="form-control form-control-lg form-control-a" id="title" placeholder="Asunto *" required>
										</div>
									</div>
									<div class="col-md-12 mb-1">
										<div class="form-group">
											<input type="email" name="to" class="form-control form-control-lg form-control-a" id="to" placeholder="Email *" required>
										</div>
									</div>
									<div class="col-md-12 mb-1">
										<div class="form-group">
                        					<textarea id="textMessage" class="form-control" placeholder="Mensaje *" name="message" cols="45" rows="8" required></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-a" id="submit">Send Message</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<!--/ Property Single End /-->
