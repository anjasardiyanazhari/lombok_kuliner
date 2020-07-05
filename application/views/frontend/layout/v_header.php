  <!--================ Header Menu Area start =================-->
  <header class="header_area">
      <div class="main_menu">
          <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container box_1620">
                  <a class="navbar-brand logo_h" href="<?php echo base_url('frontend/Home/index') ?>"><img src="<?php echo base_url() ?>assets/frontend/img/Untidtled.png" alt=""></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>

                  <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                      <ul class="nav navbar-nav menu_nav justify-content-end">
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('frontend/Home/index') ?>">Home</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('frontend/data_master/Menu/index') ?>">Menu Makanan</a>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('frontend/Home/about') ?>">About</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('frontend/Home/chef') ?>">Chef</a>
                          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('frontend/Home/contact') ?>">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </nav>
      </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Hero Banner Section start =================-->
  <section class="hero-banner">
      <div class="hero-wrapper">
          <?php
            $this->load->view($halaman);
            ?>
      </div>
  </section>
  <!--================Hero Banner Section end =================-->