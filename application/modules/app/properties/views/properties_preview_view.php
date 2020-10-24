<div class="container">
	<div class="block-content block-content-small-padding">
		<div class="block-content-inner">
			<div class="row">
				<div class="col-sm-9">
					<h2 class="property-detail-title"><?php echo $row->name;?></h2>
					<h3 class="property-detail-subtitle"><?php echo $row->address;?> <strong>$ <?php echo number_format($row->price,2);?></strong>
					</h3>
					<div class="property-detail-overview">
						<div class="property-detail-overview-inner clearfix">
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Price:</strong>
								<span>$ <?php echo number_format($row->price,2);?></span>
							</div>
							<!-- /.property-detail-overview-item -->
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Tipo:</strong>
								<span><?php echo $row->type;?></span>
							</div>
							<!-- /.property-detail-overview-item -->
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Area:</strong>
								<span><?php echo $row->area;?>m<sup>2</sup></span>
							</div>
							<!-- /.property-detail-overview-item -->
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Baños:</strong>
								<span><?php echo $row->bathrooms;?></span>
							</div>
							<!-- /.property-detail-overview-item -->
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Habitaciones:</strong>
								<span><?php echo $row->rooms;?></span>
							</div>
							<!-- /.property-detail-overview-item -->
							<div class="property-detail-overview-item col-sm-6 col-md-2">
								<strong>Garages:</strong>
								<span><?php echo $row->garage;?></span>
							</div>
							<!-- /.property-detail-overview-item -->
						</div>
						<!-- /.property-detail-overview-inner -->
					</div>
					<!-- /.property-detail-overview -->
					<div class="flexslider">
						<ul class="slides">
							<?php if(!empty($row_docs)):?>
								<?php foreach ($row_docs AS $key):?>
									<li data-thumb="<?php echo base_url('assets/storage/files/properties/'.$key->original_name);?>">
										<img src="<?php echo base_url('assets/storage/files/properties/'.$key->original_name);?>" alt="">
									</li>
								<?php endforeach;?>
							<?php endif;?>
						</ul>
						<!-- /.slides -->
					</div>
					<!-- /.flexslider -->
					<hr>
					<h2>Description</h2>
					<p><?php echo $row->description;?></p>
					<hr>
					<h2>Comodidades</h2>
					<div class="row">
						<ul class="property-detail-amenities">
							<li class="col-xs-6 col-sm-4"><i class="fa fa-check ok"></i>Comodidades</li>
							<?php if(isset($row->amenities)):?>
								<?php foreach (explode(',', $row->amenities) AS $k ):?>
									<li class="col-xs-6 col-sm-4"><i class="fa fa-check ok"></i> <?php echo $k;?></li>
								<?php endforeach; ?>
							<?php endif;?>
						</ul>
					</div>
					<!-- /.row -->
				</div>
				<div class="col-sm-3">
					<div class="sidebar">
						<div class="sidebar-inner">
							<div class="widget">
								<h3 class="widget-title">Redes Sociales</h3>
								<ul class="social social-boxed">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								</ul>
								<!-- /.social-->
							</div>
							<!-- /.widget -->
							<div class="widget">
								<h3 class="widget-title">Preguntar</h3>
								<div class="widget-content">
									<form method="post" action="http://preview.byaviators.com/template/realocation/property-detail.html?">
										<div class="form-group"><label>Correo</label><input type="text" value="" class="form-control"></div>
										<!-- /.form-group -->
										<div class="form-group"><label>Mensaje</label><textarea class="form-control"></textarea></div>
										<!-- /.form-group -->
										<div class="form-group"><input type="text" value="Contact" class="btn btn-block btn-primary btn-inversed"></div>
										<!-- /.form-group -->
									</form>
								</div>
								<!-- /.widget-content -->
							</div>
							<!-- /.widget -->
							<div class="widget">
								<h3 class="widget-title">Contactos</h3>
								<div class="agent-small">
									<div class="agent-small-top">
										<div class="clearfix">
											<div class="agent-small-picture col-sm-12">
												<div class="agent-small-picture-inner">
													<a href="#" class="agent-small-picture-inner ">
														<img src="<?php echo base_url('assets/storage/files/avatars/'.$row_users->image);?>" alt="">
													</a>
													<!-- /.agent-small-picture-target -->
												</div>
												<!-- /.agent-small-picture-inner -->
											</div>
											<!-- /.agent-small-picture -->
										</div>
										<!-- /.row -->
									</div>
									<!-- /.agent-small-top -->
									<div class="agent-small-bottom">
										<ul class="list-unstyled">
											<li><i class="fa fa-phone"></i> +1 <?php echo $row_users->phone;?></li>
											<li><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $row_users->email;?></a>
											</li>
										</ul>
									</div>
									<!-- /.agent-small-bottom -->
								</div>
							</div>
							<!-- /.widget -->
						</div>
						<!-- /.sidebar-inner -->
					</div>
					<!-- /.sidebar -->
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->
</div>
<!-- /.container -->
