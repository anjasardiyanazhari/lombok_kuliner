<!--================Food menu section start =================-->
<section class="section-margin">
    <div class="container">
        <div class="section-intro mb-75px">
            <h4 class="intro-title">Food Menu</h4>
            <h2>Lombok Kuliner</h2>
        </div>

        <div class="row">

            <?php
            foreach ($fasilitas_page as $fasilitas_page) :
            ?>
                <div class="col-lg-4">
                    <div class="featured-item">
                        <div class="featured-item">
                            <img class="card-img rounded-0" src="<?php echo base_url('assets/img/thumbnail/' . $fasilitas_page->foto) ?>">
                            <div class="food-card">
                                <a href="#">
                                    <h3><?php echo $fasilitas_page->nama ?></h3>
                                </a>
                                <p><?php echo $fasilitas_page->deskripsi ?></p>
                                <div class="d-flex justify-content-between">
                                    <ul class="rating-star">
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                    </ul>
                                    <h3 class="price-tag">
                                        RP <?php echo number_format($fasilitas_page->harga, '0', ',', '.') ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
            ?>
        </div>

        <div>
            <?php echo $pagin; ?>
        </div>
    </div>
</section>
<!--================Food menu section end=================-->