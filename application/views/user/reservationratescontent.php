<?php
    $url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
?>

<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="main-title">Reservation</div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="reservation-form-title">Personal Information</div>
                        </div>
                        <div class="col-md-5">
                            <label><span class="form-required">*</span> First Name</label>
                            <input type="text" class="form-control" id="reservation_fname" placeholder="John" value="<?php echo $user_info->USERS_FIRSTNAME; ?>" />
                        </div>
                        <div class="col-md-2">
                            <label>M.I.</label>
                            <input type="text" class="form-control" id="reservation_mi" placeholder="X" />
                        </div>
                        <div class="col-md-5">
                            <label><span class="form-required">*</span> Last Name</label>
                            <input type="text" class="form-control" id="reservation_lname" placeholder="Doe" value="<?php echo $user_info->USERS_LASTNAME; ?>" />
                        </div>
                        <div class="col-md-12">
                            <label><span class="form-required">*</span> Current Address</label>
                            <input type="text" class="form-control" id="reservation_address" placeholder="1234 example St Caloocan City" />
                        </div>
                        <div class="col-md-6">
                            <label><span class="form-required">*</span> Email Address</label>
                            <input type="text" class="form-control" id="reservation_email" placeholder="johndoe@example.com" value="<?php echo $user_info->USERS_EMAILADDRESS; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label><span class="form-required">*</span> Contact Number</label>
                            <input type="text" class="form-control" id="reservation_contact" placeholder="09xxxxxxxxx" />
                        </div>

                        <div class="col-md-12 padding-top-large">
                            <div class="reservation-form-title">Reservation Details</div>
                        </div>
                        <div class="col-md-12">
                            <label><span class="form-required">*</span> Check-in date</label>
                            <input type="text" class="form-control" id="reservation_date" value="<?php echo $reservation_date; ?>" readonly />
                        </div>
                        <div class="col-md-8">
                            <label><span class="form-required">*</span> Name of cottage</label>
                            <input type="text" class="form-control" id="reservation_cottage" value="<?php echo $rates->RATES_NAME; ?>" readonly />
                        </div>
                        <div class="col-md-2">
                            <label><span class="form-required">*</span> Guest(s)</label>
                            <input type="number" class="form-control" id="reservation_noguests" min="0" placeholder="0" />
                        </div>
                        <div class="col-md-2">
                            <label><span class="form-required">*</span> Time</label>
                            <input type="text" class="form-control" id="reservation_slot" value="<?php echo $reservation_slot; ?>" readonly />
                        </div>
                        <div class="col-md-12">
                            <label>Remarks</label>
                            <textarea class="textarea-formcontrol" id="reservation_remarks" placeholder="Put you remarks here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?php echo base_url(); ?>public/img/<?php echo $rates->RATES_IMAGE; ?>" alt="<?php echo $rates->RATES_NAME; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-md-12 padding-top-large">

                            <?php
                                $tax    =   ( $rates->RATES_PRICE * 0.12 );
                                $half   =   ( $tax / 2 );
                            ?>
                            <div>Price: <span class="reservation-form-title">₱ <?php echo $rates->RATES_PRICE; ?></span></div>
                            <div>Reservation + TAX(12%): <span class="reservation-form-title">₱ <?php echo ( ($rates->RATES_PRICE / 2) + $tax); ?></span></div>
                        </div>
                        <div class="col-md-12 padding-top-large">
                            <div class="text-center padding-bottom-small">Pay 50% of the price and the other 50% at the resort</div>
                            <div class="text-center padding-bottom-small"><small>After payment, just click <b>print receipt</b> in PayPal and we send you another copy in your email.</small></div>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                                ">
                                <!-- <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> -->

                                <input type="hidden" name="business" value="antigoresortreservation@gmail.com">
                                <input type="hidden" name="custom" value="" id="custom_js_rts<?php echo $rates->RATES_NO; ?>">
                                <input type="hidden" name="item_name" value="<?php echo $rates->RATES_NAME; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="tax" value="<?php echo $tax; ?>">
                                <input type="hidden" name="currency_code" value="PHP">
                                <input type="hidden" name="amount"  id="item_price" value="<?php echo $half; ?>">
                                <input type="hidden" name="return" value="http://localhost/resortreservation/rates/reservation/3/4a616e756172792032382c20323031387c504d/success">
                                <input type='hidden' name='notify_url' value='http://localhost/resortreservation/rates/notify/3/4a616e756172792032382c20323031387c504d'>
                                <input type="hidden" name="cancel_return" value="http://localhost/resortreservation/rates/reservation/3/4a616e756172792032382c20323031387c504d/cancel">
                                <button type="submit" class="btn btn-default" name="btn_submit_rts<?php echo $rates->RATES_NO; ?>">Reserve now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>