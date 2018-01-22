 <!-- ROOMS LANDING PAGE -->
<div class="landing-image-parent">
    <div class="landing-image-child-we-are-waiting">
        <div class="landing-image-text"> 
            <div class="landing-image-title">
                Rates
            </div>           
        </div>
    </div>
</div>

<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="row justify-content-md-center">
                <?php
                    if ( !empty($get_all_rates) ) {
                        foreach ( $get_all_rates as $rates ) {
                            $md5_rates_no_name     =   md5($rates->RATES_NO . '-' . $rates->RATES_NAME);
                ?>
                            <div class="col-md-4 padding-top-large">
                                <div class="rates-image">
                                    <a href="<?php echo base_url(); ?>rates/details/<?php echo str_replace(' ', '-', strtolower($rates->RATES_NAME));?>/<?php echo $rates->RATES_NO; ?>">
                                        <img src="<?php echo base_url(); ?>public/img/<?php echo $rates->RATES_IMAGE; ?>" alt="<?php echo $rates->RATES_NAME; ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="rates-title">
                                    <a href="<?php echo base_url(); ?>rates/details/<?php echo str_replace(' ', '-', strtolower($rates->RATES_NAME));?>/<?php echo $rates->RATES_NO; ?>">
                                        <?php echo $rates->RATES_NAME; ?>
                                    </a>
                                </div>
                                <div class="rates-price">
                                    ₱ <?php echo number_format($rates->RATES_PRICE, 2); ?>
                                </div>
                               <!--  <a href="<?php echo base_url(); ?>rates/reservation/<?php echo $rates->RATES_NO; ?>/<?php echo $md5_rates_no_name; ?>">
                                    <div class="rates-book">
                                        Reserve now
                                    </div>
                                </a> -->
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>