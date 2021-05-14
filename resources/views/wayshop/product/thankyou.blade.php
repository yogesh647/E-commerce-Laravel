@extends('wayshop.layout.master')
@section('content')



<!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            
                <div>
                    <div class="contact-form-right">
                        <h2>Thank you for Product Best of Luck for good Life</h2>
                        <p> your order ID = <?php echo Session::get('order_id');?> AND Grand Total = <?php echo Session::get('grand_total');?>
                    </div>
                </div>
           
        </div>
    </div>
    <!-- End Cart -->

<?php Session::forget('order_id');
      Session::forget('grand_total'); ?>
@endsection