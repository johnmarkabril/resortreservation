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
                    let reservation_mi          =   $('#reservation_mi').val();
                    let reservation_lname       =   $('#reservation_lname').val();
                    let reservation_address     =   $('#reservation_address').val();
                    let reservation_email       =   $('#reservation_email').val();
                    let reservation_contact     =   $('#reservation_contact').val();
                    let reservation_date        =   $('#reservation_date').val();
                    let reservation_cottage     =   $('#reservation_cottage').val();
                    let reservation_noguests    =   $('#reservation_noguests').val();
                    let reservation_slot        =   $('#reservation_slot').val();
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

                    if ( !IsEmpty(reservation_mi) ) {
                        if ( !CheckMiddleInitial(reservation_mi) ) {
                            InputError('#reservation_mi');
                            flag = 1;
                        } else {
                            if ( reservation_mi.length > 2 ) {
                                InputError('#reservation_mi');
                                flag = 1;
                            } else {
                                InputSuccess('#reservation_mi');
                            }
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

                    // if ( flag == 0 ) {
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
                    // }

                });
        <?php
            }
        ?>

        <?php
            if ( $curpage == "Template" ) {
        ?>

                $(document).on('click', '#btn_reservation_check', function(){
                    let reservation_datepicker  =   $('#reservation_datepicker').val();
                    let reservation_timeslot    =   $('#reservation_timeslot').val();
                    let flag                    =   0;

                    if ( IsEmpty(reservation_datepicker) ) {
                        InputError('#reservation_datepicker');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_datepicker');
                    }

                    if ( IsEmpty(reservation_timeslot) ) {
                        InputError('#reservation_timeslot');
                        flag = 1;
                    } else {
                        InputSuccess('#reservation_timeslot');
                    }

                    if ( flag == 0 ) {
                        let concat_string   =   reservation_datepicker + '|' + reservation_timeslot;
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