<script src="<?php echo base_url(); ?>public/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>

<!-- PLUGINS -->
<script src="<?php echo base_url(); ?>public/js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/sweetalert/sweetalert.all.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/sweetalert/core.js"></script>

<!-- START CODING SCRIPT -->
<script>
    $(document).ready(function(){

        let InputError = function(element) {
            $(element).addClass('has-error');
        }

        let InputSuccess = function(element) {
            $(element).removeClass('has-error');
        }

        let IsEmpty = function(value) {
            return ( $.trim( value ) == '' );
        }

        let CheckSpecialCharacters = function(inputfield) {
            return /[~()`@!#$%\^&*\-\[\]\\;\/{}|\\"]/.test(inputfield);
        }

        let CheckName = function(inputfield) {
            return /^[a-zA-Z- ]*$/.test(inputfield);
        }

        let CheckMiddleInitial = function(inputfield) {
            return /^[a-zA-Z]*$/.test(inputfield);
        }

        let CheckEmailAddress = function(inputfield) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(inputfield);
        }

        let CheckPasswordLength = function(value) {
            if ( value.length >= 6 ) {
                return true;
            } else {
                return false;
            }
        }

        let CheckContactNo = function(inputfield) {
            return /^0(\[0-9]{1,5})?([7-9][0-9]{9})$/.test(inputfield);
        }

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        });

        // $('input[name="daterange"]').daterangepicker({
        //     locale              :   {
        //         format: 'MMMM DD, YYYY'
        //     },
        //     autoApply           :   true,
        //     opens               :   'center',
        //     endDate             :   '<?php echo tomorrow_date; ?>',
        //     minDate             :   '<?php echo tomorrow_date; ?>',
        // }, function(start, end){
        //     console.log(start.format('MMMM DD, YYYY') + ' - ' + end.format('MMMM DD, YYYY'));
        // });

        let dateToday = new Date(new Date().setDate(new Date().getDate() + 1)); 

        $('#reservation_datepicker').datepicker({
            minDate: dateToday,
            format: 'MM dd, yyyy',
            startDate: dateToday,
            orientation: 'bottom right'
        });

        <?php
            if ( $curpage == "Login" ) {
        ?>
                let LoginProcess =  function() {
                    let txt_email       =   $('#txt_email').val();
                    let txt_password    =   $('#txt_password').val();
                    let internet_thing  =   '';
                    let flag            =   0;

                    if ( !CheckEmailAddress(txt_email) ) {
                        InputError('#txt_email');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_email');
                    }

                    if ( !CheckPasswordLength(txt_password) ) {
                        InputError('#txt_password');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_password');
                    }

                    if ( flag == 0 ) {
                        $.ajax ({
                            url: '<?php echo base_url(); ?>login/process',
                            method: "POST",
                            data: {
                                txt_email       :   txt_email,
                                txt_password    :   txt_password
                            },
                            success:function(data){
                                let datas    =   data.split('|');

                                if ( datas[0] == 1 ) {
                                    if ( datas.length == 2 ) {
                                        location.href   =   datas[1];
                                    } else {
                                        location.href   =   "<?php echo base_url(); ?>";
                                    }
                                } else if ( datas[0] == 2 ) {
                                        location.href   =   "<?php echo base_url(); ?>admin";
                                } else if ( datas[0] == 101 ) {
                                    InputError('#txt_email');
                                    InputError('#txt_password');
                                }
                            },
                            error:function(){
                                console.log('ERROR: Please refresh the page!');
                            }
                        });
                    }
                }

                $('#txt_email').focus();

                $(document).on('click', '#btn_login', function(){
                    LoginProcess();
                });

                $('#txt_email, #txt_password').on('keypress', function (e) {
                    if ( e.which === 13 ) {
                        LoginProcess();
                    }
                });
        <?php
            } else if ( $curpage == "Reservation Submittion" ) {
        ?>
                $(document).on('click', '#btn-submit-reservation', function(){
                    let reservation_fname       =   $('#reservation_fname').val();
                    let reservation_lname       =   $('#reservation_lname').val();
                    let reservation_address     =   $('#reservation_address').val();
                    let reservation_email       =   $('#reservation_email').val();
                    let reservation_contact     =   $('#reservation_contact').val();
                    let reservation_date        =   $('#reservation_date').val();
                    let reservation_cottage     =   $('#reservation_cottage').val();
                    let reservation_noguests    =   $('#reservation_noguests').val();
                    let reservation_remarks     =   $('#reservation_remarks').val();
                    let flag                    =   0;

                    if ( IsEmpty(reservation_fname) ) {
                        InputError('#reservation_fname');
                        flag = 1;
                    } else {
                        if ( !CheckName(reservation_fname) ) {
                            InputError('#reservation_fname');
                            flag = 1;
                        } else {
                            InputSuccess('#reservation_fname');
                        }
                    }

                    if ( IsEmpty(reservation_lname) ) {
                        InputError('#reservation_lname');
                        flag = 1;
                    } else {
                        if ( !CheckName(reservation_lname) ) {
                            InputError('#reservation_lname');
                            flag = 1;
                        } else {
                            InputSuccess('#reservation_lname');
                        }
                    }

                    if ( IsEmpty(reservation_address) ) {
                        InputError('#reservation_address');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_address');
                    }

                    if ( !CheckEmailAddress(reservation_email) ) {
                        InputError('#reservation_email');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_email');
                    }

                    if ( !CheckContactNo(reservation_contact) ) {
                        InputError('#reservation_contact');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_contact');
                    }

                    if ( IsEmpty(reservation_cottage) ) {
                        InputError('#reservation_cottage');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_cottage');
                    }

                    if ( IsEmpty(reservation_noguests) ) {
                        InputError('#reservation_noguests');
                        flag = 1;
                    } else {
                        if ( reservation_noguests <= 0 ) {
                            InputError('#reservation_noguests');
                            flag = 1;
                        } else {
                            InputSuccess('#reservation_noguests');
                        }
                    }

                    if ( flag == 0 ) {
                        swal({
                            title: 'Proceed to payment?',
                            text: "You won't be able to undo this reservation.",
                            type: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Yes',
                            confirmButtonClass: 'btn btn-default',
                            buttonsStyling: false,
                            reverseButtons: true
                        }).then((result) => {
                            if (result.value) {
                                swal(
                                    'Payment',
                                    "Pay using PayPal then we'll send your receipt in your email address after you complete the payment.",
                                    'success'
                                );
                            }
                        });
                    }

                });
        <?php
            } else if ( $curpage == "Signup" ) {
        ?>
                $('#signup_two').hide();
                $('#signup_three').hide();

                let SignupProcess   =   function() {
                    let txt_fname           =   $('#txt_fname').val();
                    let txt_lname           =   $('#txt_lname').val();
                    let txt_email           =   $('#txt_email').val();
                    let txt_pword           =   $('#txt_pword').val();
                    let txt_confirm_pword   =   $('#txt_confirm_pword').val();
                    let txt_contact         =   $('#txt_contact').val();
                    let txt_address         =   $('#txt_address').val();
                    let flag                =   0;

                    if ( IsEmpty(txt_fname) ) {
                        InputError('#txt_fname');
                        flag = 1;
                    } else {
                        if ( CheckSpecialCharacters(txt_fname) ) {
                            InputError('#txt_fname');
                            flag = 1;
                        } else {
                            InputSuccess('#txt_fname');
                        }
                    }

                    if ( IsEmpty(txt_lname) ) {
                        InputError('#txt_lname');
                        flag = 1;
                    } else {
                        if ( CheckSpecialCharacters(txt_lname) ) {
                            InputError('#txt_lname');
                            flag = 1;
                        } else {
                            InputSuccess('#txt_lname');
                        }
                    }

                    if ( !CheckEmailAddress(txt_email) ) {
                        InputError('#txt_email');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_email');
                    }

                    if ( !CheckPasswordLength(txt_pword) ) {
                        InputError('#txt_pword');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_pword');
                    }

                    if ( !CheckPasswordLength(txt_confirm_pword) ) {
                        InputError('#txt_confirm_pword');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_confirm_pword');
                    }

                    if ( txt_pword != txt_confirm_pword ) {
                        InputError('#txt_confirm_pword');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_confirm_pword');
                    }

                    if ( !CheckContactNo(txt_contact) ) {
                        InputError('#txt_contact');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_contact');
                    }

                    if ( IsEmpty(txt_address) ) {
                        InputError('#txt_address');
                        flag = 1;
                    } else {
                        if ( CheckSpecialCharacters(txt_address) ) {
                            InputError('#txt_address');
                            flag = 1;
                        } else {
                            InputSuccess('#txt_address');
                        }
                    }

                    if ( flag == 0 ) {
                        $.ajax ({
                            url: '<?php echo base_url(); ?>signup/check_exist_email',
                            method: "POST",
                            data: {
                                txt_fname   :   txt_fname,
                                txt_lname   :   txt_lname,
                                txt_email   :   txt_email,
                                txt_pword   :   txt_pword,
                                txt_contact :   txt_contact,
                                txt_address :   txt_address
                            },
                            success:function(data){
                                if ( data == 0 ) {
                                    $('#signup_one').hide();
                                    $('#signup_two').show();
                                } else if ( data == 1 ) {
                                    InputError('#txt_email');
                                    $('#txt_email').val('');
                                }
                            },
                            error:function(){
                                console.log('ERROR: Please refresh the page!');
                            }
                        });
                    }
                }

                $(document).on('click', '#btn_signup', function(){
                    SignupProcess();
                });

                $(document).on('click', '#btn_submit_verification', function(){
                    let txt_verification    =   $('#txt_verification').val();
                    let txt_email           =   $('#txt_email').val();
                    let flag                =   0;

                    if ( IsEmpty(txt_verification) ) {
                        InputError('#txt_verification');
                        flag = 1;
                    } else {
                        InputSuccess('#txt_verification');
                    }

                    if ( flag == 0 ) {
                        $.ajax ({
                            url: '<?php echo base_url(); ?>signup/check_verification',
                            method: "POST",
                            data: {
                                txt_email           :   txt_email,
                                txt_verification    :   txt_verification
                            },
                            success:function(data){
                                if ( data == 0 ) {
                                    $('#signup_two').hide();
                                    $('#signup_three').show();
                                } else if ( data == 1 ) {
                                    InputError('#txt_verification');
                                    flag = 1;
                                }
                            },
                            error:function(){
                                console.log('ERROR: Please refresh the page!');
                            }
                        });
                    }
                });
        <?php
            } else if ( $curpage == "User Profile" ) {
        ?>
                $(document).on('click', '#btn_change_password', function(){
                    let txt_current_password        =   $('#txt_current_password').val();
                    let txt_new_password            =   $('#txt_new_password').val();
                    let txt_confirm_password        =   $('#txt_confirm_password').val();
                    let flag                        =   0;

                    if ( txt_current_password.length < 6 ) {
                        InputError('#txt_current_password');
                        flag =  1;
                    } else {
                        InputSuccess('#txt_current_password');
                    }

                    if ( txt_new_password.length < 6 ) {
                        InputError('#txt_new_password');
                        flag =  1;
                    } else {
                        InputSuccess('#txt_new_password');
                    }

                    if ( txt_confirm_password.length < 6 ) {
                        InputError('#txt_confirm_password');
                        flag =  1;
                    } else {
                        InputSuccess('#txt_confirm_password');
                    }

                    if ( txt_new_password != txt_confirm_password ) {
                        InputError('#txt_confirm_password');
                        flag =  1;
                    } else {
                        InputSuccess('#txt_confirm_password');
                    }

                    if ( flag == 0 ) {
                        $.ajax ({
                            url: '<?php echo base_url(); ?>user/change_password',
                            method: "POST",
                            data: {
                                txt_current_password    : txt_current_password,
                                txt_new_password        : txt_new_password,
                                txt_confirm_password    : txt_confirm_password
                            },
                            success:function(data){
                                if ( data == 0 ) {
                                    location.reload();
                                } else { 
                                    InputError('#txt_current_password');
                                }
                            },
                            error:function(){
                                console.log('ERROR: Please refresh the page!');
                            }
                        });
                    }

                });
        <?php
            }
        ?>

        <?php
            if ( $curpage == "Template" ) {
        ?>

                $(document).on('click', '#btn_reservation_check', function(){
                    let reservation_datepicker  =   $('#reservation_datepicker').val();
                    let flag                    =   0;

                    if ( IsEmpty(reservation_datepicker) ) {
                        InputError('#reservation_datepicker');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_datepicker');
                    }

                    if ( flag == 0 ) {
                        let concat_string   =   reservation_datepicker;
                        $.ajax ({
                            url: '<?php echo base_url(); ?>template/encryption_method',
                            method: "POST",
                            data: {
                                encode_encrypt  :   concat_string
                            },
                            success:function(data){
                                location.href   =   "<?php echo base_url(); ?>rates/cottage/" + data;
                            },
                            error:function(){
                                console.log('ERROR: Please refresh the page!');
                            }
                        });
                    }
                });
        <?php
            }
        ?>
    });

</script>