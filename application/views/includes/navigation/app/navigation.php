<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
	<div class="container">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
				aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<a class="navbar-brand text-brand" href="<?php echo base_url()?>home/index">Estate<span class="color-b">Agency</span></a>
		<button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
				data-target="#navbarTogglerDemo01" aria-expanded="false">
			<span class="fa fa-search" aria-hidden="true"></span>
		</button>
		<div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'home/index');?>" href="<?php echo base_url()?>home/index">Hogar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'properties/index');?>" href="<?php echo base_url()?>properties/index">Propiedades</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'blogs/index');?>" href="<?php echo base_url()?>blogs/index">Blogs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'services/index');?>" href="<?php echo base_url()?>services/index">Servicios</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'abouts/index');?>" href="<?php echo base_url()?>abouts/index">Acerca de</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo menu_active($this->fetch_class, 'contacts/index');?>" href="<?php echo base_url()?>contacts/index">Contactos</a>
				</li>
			</ul>
		</div>
		<button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
				data-target="#navbarTogglerDemo01" aria-expanded="false">
			<span class="fa fa-search" aria-hidden="true"></span>
		</button>
	</div>
</nav>
<!--/ Nav End /-->
