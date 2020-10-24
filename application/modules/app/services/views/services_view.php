<div class="container">
	<div class="block-content block-content-small-padding">
		<div class="block-content-inner">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="center">Todos los Servicios</h2>
					<div class="row">
						<?php if(!empty($services_rows)):?>
							<?php foreach ($services_rows AS $row_service): ?>
								<div class="hex-wrapper col-sm-4 center">
									<div class="clearfix">
										<div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
											<div class="hex-inner">
												<img src="<?php echo base_url('assets/storage/files/services/'.$row_service->image)?>" width="209px" height="236px" alt="" class="hex-image img-circle">
												<div class="hex-content"></div>
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
					<!-- /.row -->
					<div class="center">
						<ul class="pagination">
							<?php $page_result = ($segment == 1)? 1 : ($segment-1);?>
							<li <?php echo ($segment <= 1)? 'style="pointer-events: none;"' : '';?>>
								<a href="<?php echo base_url('services/index/'.($page_result))?>" tabindex="-1">&laquo;</a>
							</li>

							<?php for ($i = 0; $i < $page; $i++): $for_count = ($i+1);?>
								<li class="active" <?php echo ($segment == $for_count)? 'active' : '';?>>
									<a href="<?php echo base_url('services/index/'.$for_count)?>"><?php echo $for_count;?></a>
								</li>
							<?php endfor;?>

							<li <?php echo ($segment >= $page )? 'style="pointer-events: none;"' : '';?>>
								<a href="<?php echo base_url('services/index/'.($segment+1))?>">&raquo;</a>
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
