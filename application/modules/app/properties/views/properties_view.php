<div class="container">
	<div class="block-content block-content-small-padding">
		<div class="block-content-inner">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="center">Todas las Propiedades</h2>
					<div class="row">
						<?php if(!empty($properties_rows)):?>
						<?php foreach ($properties_rows AS $row_properties): ?>
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
							<?php endforeach; ?>
						<?php endif;?>
					</div>
					<!-- /.row -->
					<div class="center">
						<ul class="pagination">
							<?php $page_result = ($segment == 1)? 1 : ($segment-1);?>
							<li <?php echo ($segment <= 1)? 'style="pointer-events: none;"' : '';?>>
								<a href="<?php echo base_url('properties/index/'.($page_result))?>" tabindex="-1">&laquo;</a>
							</li>

							<?php for ($i = 0; $i < $page; $i++): $for_count = ($i+1);?>
								<li class="active" <?php echo ($segment == $for_count)? 'active' : '';?>>
									<a href="<?php echo base_url('properties/index/'.$for_count)?>"><?php echo $for_count;?></a>
								</li>
							<?php endfor;?>

							<li <?php echo ($segment >= $page )? 'style="pointer-events: none;"' : '';?>>
								<a href="<?php echo base_url('properties/index/'.($segment+1))?>">&raquo;</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->
</div>
<!-- /.container -->
