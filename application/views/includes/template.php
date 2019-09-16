<?php
    $this->load->view('includes/header/'.$this->namespace.'/header.php');
    $this->load->view('includes/navigation/'.$this->namespace.'/navigation.php');
    $this->load->view($content);
    $this->load->view('includes/footer/'.$this->namespace.'/footer.php');