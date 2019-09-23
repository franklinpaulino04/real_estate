<!-- Header Area Start -->
<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Logo Start -->
                <div class="logo-wrap">
                    <a href="<?php echo base_url();?>home"><img src="<?php echo base_url();?>assets/img/logo.png" alt=""></a>
                </div>
                <!-- Logo End -->
            </div>
            <div class="col-md-9">
                <!-- Main Menu Start -->
                <div class="main-menu">
                    <nav>
                        <ul id="nav">
                            <li class="<?php echo menu_active($this->fetch_class, 'home/index');?>"><a href="<?php echo base_url();?>home">Home</a></li>
                            <li class="<?php echo menu_active($this->fetch_class, 'properties/index');?>"><a href="<?php echo base_url();?>properties">PROPERTIES</a></li>
                            <li class="<?php echo menu_active($this->fetch_class, 'categories/index');?>">
                                <a href="<?php echo base_url();?>categories">Categorias</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-right.html">Casa</a></li>
                                    <li><a href="single-post.html">Villa</a></li>
                                    <li><a href="single-post.html">Solar</a></li>
                                    <li><a href="single-post.html">Finca</a></li>
                                    <li><a href="single-post.html">Nave</a></li>
                                    <li><a href="single-post.html">Local Comercial</a></li>
                                    <li><a href="single-post.html">Edificio</a></li>
                                    <li><a href="single-post.html">Apartamento</a></li>
                                    <li><a href="single-post.html">Penthouse</a></li>
                                    <li><a href="single-post.html">Local de oficina</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo menu_active($this->fetch_class, 'services/index');?>"><a href="<?php echo base_url();?>services">Services</a></li>
                            <li class="<?php echo menu_active($this->fetch_class, 'contacts/index');?>"><a href="<?php echo base_url();?>contacts">contact</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Main Menu End -->
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->
<!-- mobile-menu-area start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <div class="logo">
                        <a href="index.html"><img src="<?php echo base_url();?>assets/img/logo2.jpg" alt="" /></a>
                    </div>
                    <nav id="mobile-menu">
                        <ul>
                            <li class="<?php echo menu_active($this->fetch_class, 'home/index');?>"><a href="<?php echo base_url();?>home">Home</a></li>
                            <li class="<?php echo menu_active($this->fetch_class, 'properties/index');?>"><a href="<?php echo base_url();?>properties">Property</a>
                            <li class="<?php echo menu_active($this->fetch_class, 'categories/index');?>">
                                <a href="<?php echo base_url();?>categories">Categorias</a>
                                <ul>
                                    <li><a href="blog-right.html">Casa</a></li>
                                    <li><a href="single-post.html">Villa</a></li>
                                    <li><a href="single-post.html">Solar</a></li>
                                    <li><a href="single-post.html">Finca</a></li>
                                    <li><a href="single-post.html">Nave</a></li>
                                    <li><a href="single-post.html">Local Comercial</a></li>
                                    <li><a href="single-post.html">Edificio</a></li>
                                    <li><a href="single-post.html">Apartamento</a></li>
                                    <li><a href="single-post.html">Penthouse</a></li>
                                    <li><a href="single-post.html">Local de oficina</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo menu_active($this->fetch_class, 'services/index');?>"><a href="<?php echo base_url();?>services">Services</a></li>
                            <li class="<?php echo menu_active($this->fetch_class, 'contacts/index');?>"><a href="<?php echo base_url();?>contacts">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area end -->