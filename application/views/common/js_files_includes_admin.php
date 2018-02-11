<script src="<?php echo base_url(); ?>public/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>

<!-- PLUGINS -->
<script src="<?php echo base_url(); ?>public/js/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/sweetalert/sweetalert.all.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url();?>public/js/plugins/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo base_url(); ?>public/js/plugins/sweetalert/core.js"></script>

<!-- START CODING SCRIPT -->
<script>
    $(document).ready(function(){
        $('#admin_reservation_calendar').fullCalendar({
            header: {
                left: 'prev, next,  today',
                center: 'title',
                right: 'month, agendaDay, list'
            },
            defaultView:'month',
            defaultDate: $('#admin_reservation_calendar').fullCalendar('today'),
            events: <?php print_r($schedule_calendar); ?>,
            eventClick: function(event) {
                $.ajax ({
                    url: '<?php echo base_url(); ?>admin/dashboard/clicked_schedule',
                    method: "POST",
                    data: {
                        reserve_no   : event.reserve_no
                    },
                    success:function(data){
                        $('#modalcontent').modal('show'); 
                        $('#mdl_content').html(data);
                    },
                    error:function(){
                        ErrorAjax();
                    }
                });
            }
        });
    });
</script>