 <!-- ROOMS LANDING PAGE -->
<div class="landing-image-parent">
    <div class="landing-image-child-we-are-waiting">
        <div class="landing-image-text">  
            <div class="landing-image-title no-padding">
                Reserve now
            </div>       
            <div class="padding-top-normal">
                <?php
                    $this->load->view('reservation_form');
                ?>
            </div>
        </div>
    </div>
</div>

<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="padding-left-medium padding-right-medium">
                <div class="reservation-note">
                    All cottage available in <?php echo $reservation_date . ' - ' . $reservation_slot; ?> timeslot
                </div>
            </div>
            <div class="row justify-content-md-center">
                <?php
                    if ( !empty($available_rates) ) {
                        foreach ( $available_rates as $rates ) {
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
                                <a href="<?php echo base_url(); ?>rates/reservation/<?php echo $rates->RATES_NO; ?>/<?php echo $encode_encrypt; ?>">
                                    <div class="rates-book">
                                        Reserve now
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>