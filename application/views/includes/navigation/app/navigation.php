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
                            <li class="<?php echo menu_active($this->fetch_class, 'agents/index');?>"><a href="<?php echo base_url();?>agents">aGENTS</a>
<!--                                <ul class="sub-menu">-->
<!--                                    <li><a href="agent.html">Agent</a></li>-->
<!--                                    <li><a href="single-agent.html">Single Agent</a></li>-->
<!--                                </ul>-->
                            </li>
<!--                            <li><a href="#">Pages</a>-->
<!--                                <div class="mega-menu">-->
<!--                                    <span>-->
<!--                                        <a href="404.html">404</a>-->
<!--                                        <a href="contact.html">contact Us</a>-->
<!--                                        <a href="agent.html">Team </a>-->
<!--                                        <a href="single-agent.html">Team Single Member</a>-->
<!--                                    </span>-->
<!--                                    <span>-->
<!--                                        <a href="property.html">property</a>-->
<!--                                        <a href="single-property.html">Single Property</a>-->
<!--                                    </span>-->
<!--                                    <span>-->
<!--                                        <a href="faq.html">FAQ</a>-->
<!--                                        <a href="blog-right.html">Blog left Sidebar</a>-->
<!--                                        <a href="single-post.html">single post</a>-->
<!--                                    </span>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li><a href="blog-left.html">blog</a>-->
<!--                                <ul class="sub-menu">-->
<!--                                    <li><a href="blog-right.html">Blog left Sidebar</a></li>-->
<!--                                    <li><a href="single-post.html">Single Blog Post</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li class="<?php echo menu_active($this->fetch_class, 'faqs/index');?>"><a href="<?php echo base_url();?>faqs">FAQs</a></li>
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
<!--                                <ul>-->
<!--                                    <li><a href="single-property.html">Single Property</a></li>-->
<!--                                </ul>-->
                            </li>
                            <li class="<?php echo menu_active($this->fetch_class, 'agents/index');?>"><a href="<?php echo base_url();?>agents">Agent</a>
<!--                                <ul>-->
<!--                                    <li><a href="agent.html">agent</a></li>-->
<!--                                    <li><a href="single-agent">Single Agent</a></li>-->
<!--                                </ul>-->
                            </li>
                            <li class="<?php echo menu_active($this->fetch_class, 'blogs/index');?>"><a href="<?php echo base_url();?>blogs">Blog</a>
<!--                                <ul>-->
<!--                                    <li><a href="blog-right.html">Blog Left</a></li>-->
<!--                                    <li><a href="single-post.html">Single Post</a></li>-->
<!--                                </ul>-->
                            </li>
                            <li class="<?php echo menu_active($this->fetch_class, 'faqs/index');?>"><a href="<?php echo base_url();?>faqs">FAQ</a></li>
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