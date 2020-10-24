<div class="container">
	<!-- ISOTOPE GRID -->
	<div class="block-content block-content-small-padding">
		<div class="block-content-inner">
			<h2 class="center">Todas las Propiedades</h2>

			<ul class="properties-filter">
				<li class="selected"><a href="#" data-filter="*"><span>Todos</span></a></li>
				<li><a href="#" data-filter=".property-featured"><span>Destacadas</span></a></li>
				<li><a href="#" data-filter=".property-rent"><span>Retas</span></a></li>
				<li><a href="#" data-filter=".property-sale"><span>Ventas</span></a></li>
			</ul>
			<!-- /.property-filter -->

			<div class="properties-items">
				<div class="row">
					<?php if(!empty($properties_rows)):?>
						<?php foreach ($properties_rows AS $row_properties): ?>
							<?php
							switch ($row_properties->typeId)
							{
								case 1: ?>
									<div class="property-item property-sale col-sm-6 col-md-3">
										<div class="property-box">
											<div class="property-box-inner">
												<h3 class="property-box-title"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->address;?></a></h3>
												<h4 class="property-box-subtitle"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->name;?></a></h4>
												<div class="property-box-label property-box-label-primary"><?php echo $row_properties->type;?></div>
												<!-- /.property-box-label -->
												<div class="property-box-picture">
													<div class="property-box-price">$ <?php echo number_format($row_properties->price,2);?></div>
													<!-- /.property-box-price -->
													<div class="property-box-picture-inner">
														<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank" class="property-box-picture-target">
															<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" width="255px" height="245px" alt="">
														</a><!-- /.property-box-picture-target -->
													</div>
													<!-- /.property-picture-inner -->
												</div>
												<!-- /.property-picture -->
												<div class="property-box-meta">
													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->bathrooms;?></strong>
														<span>Baños</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->rooms;?></strong>
														<span>Habitaciones</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong>277</strong>
														<span>Area</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->garage;?></strong>
														<span>Garages</span>
													</div>
													<!-- /.col-sm-3 -->
												</div>
												<!-- /.property-box-meta -->
											</div>
											<!-- /.property-box-inner -->
										</div>
										<!-- /.property-box -->
									</div>
									<!-- /.property-item -->
								<?php break;

								case 2: ?>
									<div class="property-item property-rent col-sm-6 col-md-3">
										<div class="property-box">
											<div class="property-box-inner">
												<h3 class="property-box-title"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->address;?></a></h3>
												<h4 class="property-box-subtitle"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->name;?></a></h4>
												<div class="property-box-label property-box-label-primary"><?php echo $row_properties->type;?></div>
												<!-- /.property-box-label -->
												<div class="property-box-picture">
													<div class="property-box-price">$ <?php echo number_format($row_properties->price,2);?></div>
													<!-- /.property-box-price -->
													<div class="property-box-picture-inner">
														<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank" class="property-box-picture-target">
															<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" width="255px" height="245px" alt="">
														</a><!-- /.property-box-picture-target -->
													</div>
													<!-- /.property-picture-inner -->
												</div>
												<!-- /.property-picture -->
												<div class="property-box-meta">
													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->bathrooms;?></strong>
														<span>Baños</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->rooms;?></strong>
														<span>Habitaciones</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong>277</strong>
														<span>Area</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->garage;?></strong>
														<span>Garages</span>
													</div>
													<!-- /.col-sm-3 -->
												</div>
												<!-- /.property-box-meta -->
											</div>
											<!-- /.property-box-inner -->
										</div>
										<!-- /.property-box -->
									</div>
									<!-- /.property-item -->
									<?php break;

								case 3: ?>
									<div class="property-item property-featured col-sm-6 col-md-3">
										<div class="property-box">
											<div class="property-box-inner">
												<h3 class="property-box-title"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->address;?></a></h3>
												<h4 class="property-box-subtitle"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->name;?></a></h4>
												<div class="property-box-label property-box-label-primary"><?php echo $row_properties->type;?></div>
												<!-- /.property-box-label -->
												<div class="property-box-picture">
													<div class="property-box-price">$ <?php echo number_format($row_properties->price,2);?></div>
													<!-- /.property-box-price -->
													<div class="property-box-picture-inner">
														<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank" class="property-box-picture-target">
															<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" width="255px" height="245px" alt="">
														</a><!-- /.property-box-picture-target -->
													</div>
													<!-- /.property-picture-inner -->
												</div>
												<!-- /.property-picture -->
												<div class="property-box-meta">
													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->bathrooms;?></strong>
														<span>Baños</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->rooms;?></strong>
														<span>Habitaciones</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong>277</strong>
														<span>Area</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->garage;?></strong>
														<span>Garages</span>
													</div>
													<!-- /.col-sm-3 -->
												</div>
												<!-- /.property-box-meta -->
											</div>
											<!-- /.property-box-inner -->
										</div>
										<!-- /.property-box -->
									</div>
									<!-- /.property-item -->
									<?php break;

								case 4: ?>
									<div class="property-item col-sm-6 col-md-3">
										<div class="property-box">
											<div class="property-box-inner">
												<h3 class="property-box-title"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->address;?></a></h3>
												<h4 class="property-box-subtitle"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->name;?></a></h4>
												<div class="property-box-label property-box-label-primary"><?php echo $row_properties->type;?></div>
												<!-- /.property-box-label -->
												<div class="property-box-picture">
													<div class="property-box-price">$ <?php echo number_format($row_properties->price,2);?></div>
													<!-- /.property-box-price -->
													<div class="property-box-picture-inner">
														<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank" class="property-box-picture-target">
															<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" width="255px" height="245px" alt="">
														</a>
														<!-- /.property-box-picture-target -->
													</div>
													<!-- /.property-picture-inner -->
												</div>
												<!-- /.property-picture -->
												<div class="property-box-meta">
													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->bathrooms;?></strong>
														<span>Baños</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->rooms;?></strong>
														<span>Habitaciones</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong>277</strong>
														<span>Area</span>
													</div>
													<!-- /.col-sm-3 -->

													<div class="property-box-meta-item col-xs-3 col-sm-3">
														<strong><?php echo $row_properties->garage;?></strong>
														<span>Garages</span>
													</div>
													<!-- /.col-sm-3 -->
												</div>
												<!-- /.property-box-meta -->
											</div>
											<!-- /.property-box-inner -->
										</div>
										<!-- /.property-box -->
									</div>
									<!-- /.property-item -->
									<?php break;

								default:
									break;
							}?>
						<?php endforeach; ?>
					<?php endif;?>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.properties-items -->

		</div>
		<!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->

	<!-- CAROUSEL -->
	<div class="block-content background-secondary background-map fullwidth">
		<div class="block-content-inner">
			<ul class="bxslider clearfix">
				<?php if(!empty($properties_rows)):?>
				<?php foreach ($properties_rows AS $row_properties): ?>
						<li>
							<div class="property-box no-border small">
								<div class="property-box-inner">
									<h3 class="property-box-title"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->address;?></a></h3>
									<h4 class="property-box-subtitle"><a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank"><?php echo $row_properties->name;?></a></h4>
									<div class="property-box-label property-box-label-primary"><?php echo $row_properties->type;?></div>
									<!-- /.property-box-label -->

									<div class="property-box-picture">
										<div class="property-box-price">$ <?php echo number_format($row_properties->price,2);?></div>
										<!-- /.property-box-price -->
										<div class="property-box-picture-inner">
											<a href="<?php echo base_url('properties/preview/'.$row_properties->propertyId)?>" target="_blank" class="property-box-picture-target">
												<img src="<?php echo base_url('assets/storage/files/properties/'.$row_properties->original_name);?>" width="170px" height="163px" alt="">
											</a><!-- /.property-box-picture-target -->
										</div><!-- /.property-picture-inner -->
									</div><!-- /.property-picture -->
								</div><!-- /.property-box-inner -->
							</div><!-- /.property-box -->
						</li>
						<!-- /.property-item -->
					<?php endforeach; ?>
				<?php endif;?>
			</ul>
		</div><!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->

	<!-- HEXS -->
	<div class="block-content fullwidth background-primary background-map clearfix">
		<div class="block-content-inner row">
			<?php if(!empty($services_rows)):?>
			<?php foreach ($services_rows AS $row_service): ?>
					<div class="hex-wrapper col-sm-4 center">
						<div class="clearfix">
							<div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
								<div class="hex-inner">
									<img src="<?php echo base_url('assets/storage/files/services/'.$row_service->image)?>" width="209px" height="236px" alt="" class="hex-image img-circle">
									<div class="hex-content"><i class="fa fa-group"></i></div>
									<!-- /.hex-content -->
								</div>
								<!-- /.hex-inner -->
							</div>
							<!-- /.hex -->
						</div>
						<!-- /.clearfix -->
						<h3><?php echo $row_service->name;?></h3>
						<p><?php echo $row_service->description;?></p>
						<a class="btn btn-white" href="<?php echo base_url('services/preview/'.$row_service->serviceId)?>" target="_blank">Leer mas</a>
					</div>
				<?php endforeach; ?>
			<?php endif;?>
		</div>
		<!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->
</div>
<!-- /.container -->
