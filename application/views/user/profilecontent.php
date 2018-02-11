<?php
    $prof_image     =   substr($user_data->USERS_FIRSTNAME, 0, 1) . substr($user_data->USERS_LASTNAME, 0, 1);
?>
<div class="bg-content">
    <div class="container padding-large no-padding-top bg-container">
        <div class="row">
            <div class="col-md-4 padding-top-large">
                <center>
                    <div class="profile-image">
                        <?php echo $prof_image; ?>
                    </div>
                </center>

                <div class="profile-box margin-top-large">
                    <div class="title">Information</div>
                    <div class="body">
                        <div class="label-name">Name</div>
                        <div class="name"><?php echo $user_data->USERS_FIRSTNAME . ' ' . $user_data->USERS_LASTNAME; ?></div>

                        <div class="label-name">Email Address</div>
                        <div class="name"><?php echo $user_data->USERS_EMAILADDRESS; ?></div>
                        
                        <div class="label-name">Address</div>
                        <div class="name"><?php echo $user_data->USERS_ADDRESS; ?></div>
                    </div>
                </div>

                <div class="profile-box margin-top-large">
                    <div class="title">Change Password</div>
                    <div class="body">
                        <input type="password" class="form-control margin-top-normal" id="txt_current_password" placeholder="Current Password" />
                        <input type="password" class="form-control" id="txt_new_password" placeholder="New Password" />
                        <input type="password" class="form-control" id="txt_confirm_password" placeholder="Confirm Password" />
                        <button class="btn btn-default" id="btn_change_password">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 padding-top-large">
                <div class="profile-reservation-list">Reservation List</div>

                <div class="row">
                    <?php
                        if (!empty($get_reservation_of_user)) {
                            foreach ( $get_reservation_of_user as $reservation ) {
                    ?>
                                <div class="col-md-6 padding-top-large">
                                    <div class="reservation-box">
                                        <div class="image-box">
                                            <center>
                                                <img class="image"  alt="<?php echo $reservation->RATES_NAME; ?>" src="<?php echo base_url(); ?>public/img/<?php echo $reservation->RATES_IMAGE?>" />
                                            </center>
                                        </div>
                                        <div class="body">
                                            <div class="title"><?php echo $reservation->RATES_NAME; ?></div>
                                            <div class="dateto">For <?php echo $reservation->RES_DATETO; ?></div>
                                            <div class="fee">₱ <?php echo $reservation->RES_TOTALPRICE; ?></div>
                                            <div class="description"><?php echo $reservation->RATES_DESCRIPTION; ?></div>
                                            <a data-toggle="modal" data-target="#modalcontent<?php echo $reservation->RES_NO; ?>">
                                                <div class="view">View</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>  

                                <div class="modal fade" id="modalcontent<?php echo $reservation->RES_NO; ?>" tabindex="-1" role="dialog" aria-labelledby="modal content" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="w-100"><?php echo $reservation->RATES_NAME; ?></div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-responsive w-100" src="<?php echo base_url(); ?>public/img/<?php echo $reservation->RATES_IMAGE?>" />
                                                
                                                <div>Paid:<span  class="reservation-paid"> ₱<?php echo $reservation->RES_TOTALPRICE; ?></span></div>
                                                <div>Date:<span  class="reservation-paid"> <?php echo $reservation->RES_DATETO; ?></span></div>
                                                <div class="modal-description"><?php echo $reservation->RATES_DESCRIPTION; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>