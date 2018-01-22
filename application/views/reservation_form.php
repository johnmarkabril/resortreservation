<?php 
    $reservation_date   =   ( !empty($reservation_date) ? $reservation_date : '' );
    $reservation_slot   =   ( !empty($reservation_slot) ? $reservation_slot : '' );

    $button_value       =   ( !empty($reservation_date) && !empty($reservation_slot) ? 'Check new date' : 'Check now' );
?>
<div class="container">
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 offset-sm-4">
            <input type="text" class="form-control text-center" id="reservation_datepicker" placeholder="Select a date" value="<?php echo $reservation_date; ?>" />
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="reservation_timeslot">
                <option value="" <?php echo ( $reservation_slot == '' ? 'selected' : '' ); ?> >Select timeslot</option>
                <option value="AM" <?php echo ( $reservation_slot == 'AM' ? 'selected' : '' ); ?> >AM</option>
                <option value="PM" <?php echo ( $reservation_slot == 'PM' ? 'selected' : '' ); ?> >PM</option>
            </select>
        </div>
    </div>
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 offset-sm-4">
            <button class="btn btn-default" id="btn_reservation_check"><?php echo $button_value; ?></button>
        </div>
    </div>
</div>