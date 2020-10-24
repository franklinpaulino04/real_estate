<div class="container">
	<div class="block-content block-content-small-padding">
		<div class="block-content-inner">
			<div class="row">
				<div class="col-sm-9">
					<h2><?php echo $row->name;?></h2>
					<div class="agency-detail">
						<div class="row">
							<div class="col-sm-3">
								<div class="agency-detail-picture">
									<img src="<?php echo base_url('assets/storage/files/services/'.$row->image)?>" alt="" class="img-responsive"></div>
								<!-- /.agent-detail-picture -->
							</div>
							<div class="col-sm-8">
								<p><?php echo $row->description;?></p>

								<ul class="social social-boxed">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								</ul>
								<!-- /.social-->
							</div>
						</div>
						<!-- /.row -->
					</div>
					<!-- /.agency-detail -->
					<h2>Contacto</h2>
					<form method="post" action="http://preview.byaviators.com/template/realocation/agency-detail.html?" class="box">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control">
								</div>
								<!-- /.form-group -->
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Correo</label>
									<input type="text" class="form-control">
								</div>
								<!-- /.form-group -->
							</div>
						</div>
						<!-- /.row -->

						<div class="form-group">
							<label>Mensaje</label>
							<textarea rows="8" class="form-control"></textarea>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<input type="submit" value="Enviar" class="btn btn-primary btn-inversed">
						</div>
						<!-- /.form-group -->
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.block-content-inner -->
	</div>
	<!-- /.block-content -->
</div>
<!-- /.container -->
