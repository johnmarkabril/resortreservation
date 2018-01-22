 <!-- ratesS LANDING PAGE -->
<div class="landing-image-parent">
    <div class="landing-image-child-we-are-waiting">
        <div class="landing-image-text"> 
            <div class="landing-image-title">
                <?php echo $rates->RATES_NAME; ?>
            </div>   

        </div>
    </div>
</div>

<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="media">
                <img class="align-self-start margin-right-large" src="<?php echo base_url(); ?>public/img/<?php echo $rates->RATES_IMAGE; ?>" alt="<?php echo base_url(); ?>public/img/home/<?php echo $rates->RATES_NAME; ?>" >
                <div class="media-body">
                    <div class="rates-site-price">
                        ₱ <?php echo number_format($rates->RATES_PRICE, 2); ?>
                    </div>
                    <div class="rates-site-description"><?php echo $rates->RATES_DESCRIPTION; ?></div>

                    <!-- <div class="padding-top-large">
                        <a>
                            <div class="rates-book">
                                Reserve Me
                            </div>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>