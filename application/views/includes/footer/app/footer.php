<!--/ footer Star /-->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="nav-footer">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>home/index">Hogar</a>
						</li>
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>properties/index">Propiedades</a>
						</li>
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>blogs/index">Blogs</a>
						</li>
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>services/index">Servicios</a>
						</li>
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>abouts/index">Acerca de</a>
						</li>
						<li class="list-inline-item">
							<a href="<?php echo base_url()?>contacts/index">Contactos</a>
						</li>
					</ul>
				</nav>
				<div class="socials-a">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="#">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
				</div>
				<div class="copyright-footer">
					<p class="copyright color-text-a">
						&copy; Copyright
						<span class="color-a"><?php echo date('Y');?></span> All Rights Reserved.
					</p>
				</div>
				<div class="credits">
					Designed by <a href="mail:franklinpaulino04@gmail.com">franklinpaulino04@gmail.com</a>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="<?php echo base_url()?>assets/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/popper/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>assets/lib/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url()?>assets/js/sweetalert2@8.js"></script>

<!-- Contact Form JavaScript File -->
<script src="<?php echo base_url()?>assets/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="<?php echo base_url()?>assets/js/main.js"></script>
<script src="<?php echo base_url()?>assets/js/modules/app/<?php echo $this->router->fetch_class();?>/<?php echo $this->router->fetch_class();?>.js"></script>

</body>
</html>




