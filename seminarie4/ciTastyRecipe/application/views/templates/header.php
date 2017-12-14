<html>
    <head>
        <title>ciTastyRecipe</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/reset.css">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/stylesheet.css">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/recipe.css">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/foods.css">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/calendar.css">
        <link rel="stylesheet" type="text/css" href ="<?php echo base_url(); ?>assets/css/registration.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body class ="body">
        <ul class="nav">
            <li><a href="<?php echo base_url(); ?>home "> Hem </a></li>
            <li><a href="<?php echo base_url(); ?>recipes "> Recept </a></li>
            <li><a href="<?php echo base_url(); ?>calendar "> Kalender </a></li>
            
            
            <?php if($this->session->userdata('logged_in')) : ?>
            <li><a href="<?php echo base_url(); ?>users/logout "> Logout </a></li>
            <?php endif; ?>
            
            <?php if(!$this->session->userdata('logged_in')) : ?>
                <li><a href="<?php echo base_url(); ?>users/register "> Registrera Användare </a></li>
                <li><a href="<?php echo base_url(); ?>users/login "> Login </a></li>
            <?php endif; ?>
            
            

            
        </ul>
        
    <div class= "container">
        <!-- Flash Messages -->
        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('user_registered').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('post_created')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('post_created').'</p>"'; ?>
        <?php endif; ?>
    
        <?php if($this->session->flashdata('post_updated')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('post_updated').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('category_created')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('category_created').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('post_deleted')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('post_deleted').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('login_failed')): ?>
            <?php echo '<p class="alert alert-danger>'.$this->session->flashdata('login_failed').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('user_loggedin')): ?>
            <?php echo '<p class="alert alert-success>'.$this->session->flashdata('user_loggedin').'</p>"'; ?>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('user_loggedout')): ?>
            <?php echo '<p class="alert alert-danger>'.$this->session->flashdata('user_loggedout').'</p>"'; ?>
        <?php endif; ?>

