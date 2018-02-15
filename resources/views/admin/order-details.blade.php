@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')

<?php
$path = Request::path('');
$path = explode("/", $path);
$ID = $path[2];
?>   
<div id="content">
  <div class="container">
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
            <li> Order Details</li>
        </ul>
    </div>
    
    <div class="page-header"></div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header"><h4><i class="fa fa-pencil-square-o"></i> Order Details</h4> </div>
                <div class="widget-content">
                    <div class="form-group col-xs-12">
                          <div class="form-group col-xs-4">
                            <strong> Order Information</strong><br /><br />
                            <strong>Order Date :</strong> {{ date("jS M,Y",strtotime($order_info[0] -> order_date)) }} <br />
                            <strong>Order ID :</strong>  {{ $order_info[0] -> order_id }} <br />
                            <strong>Transaction ID :</strong> {{ $order_info[0] -> transaction_id }} <br /><br />
                            
                            <strong>Item Total :</strong> &pound;  {{ number_format($order_info[0] -> total_amount,2,'.','') }}<br />
                            <strong>Discount Price :</strong> &pound;  {{ number_format($order_info[0] -> discount_amount,2,'.','') }}<br />
                            <strong>Vat Price :</strong> &pound; {{ number_format($order_info[0] -> vat_amount,2,'.','') }} <br />
                            <strong>Shipping Price :</strong> &pound; {{ number_format($order_info[0] -> shipping_amount,2,'.','') }} <br />
                            <strong>Grand Total :</strong> &pound; {{ number_format($order_info[0] -> grand_total,2,'.','') }}<br />
                            
                          </div>
                         
                          <div class="form-group col-xs-4">
                          <strong> Billing information</strong><br /><br />
                          {{ $order_info[0]->bill_full_name }} <br />
                          {{ $order_info[0]->bill_address1 }} <br /> 
                          @if($order_info[0]->bill_address2!='') {{ $order_info[0]->bill_address2 }} <br /> @endif
                          
                          <strong>City :</strong> {{ $order_info[0]->bill_city }} 
                          <strong>Postcode : </strong>{{ $order_info[0]->bill_post_code }} <br />
                          
                          <strong>Country :</strong> {{ $order_info[0]->bill_country }} 
                          <strong>County :</strong> {{ $order_info[0]->bill_state }}  <br /> <br />
                          </div>
                          
                          <div class="form-group col-xs-4">
                          <strong> Shipping information</strong><br /><br />
                          {{ $order_info[0]->ship_full_name }} <br />
                          {{ $order_info[0]->ship_address1 }} <br /> 
                          @if($order_info[0]->ship_address2!='') {{ $order_info[0]->ship_address2 }} <br /> @endif
                          
                          <strong>City :</strong> {{ $order_info[0]->ship_city }} 
                          <strong>Postcode : </strong>{{ $order_info[0]->ship_post_code }} <br />
                          
                          <strong>Country :</strong> {{ $order_info[0]->ship_country }} 
                          <strong>County :</strong> {{ $order_info[0]->ship_state }}  <br />
                          <strong>Contact Number :</strong> {{ $order_info[0]->ship_phone_number }} <br /><br />
                          
                          
                          </div>
                          
                          <div class="clearfix"></div>
                          <div><strong>Special Notes :</strong> {{ $order_info[0] -> special_notes }}</div>
                          
                           @if($item_info)
                            <div class="clearfix"></div>
                            <div><h4>Item  Information</h4> </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($item_info as $item_det)
                                    <tr>
                                        <td>{{ $item_det -> product_name }}</td>
                                        <td>{{ $item_det -> qty }}</td>
                                        <td>&pound; {{ number_format($item_det -> unit_price,2,'.','') }}</td>
                                        <td>&pound; {{ number_format($item_det -> total_price,2,'.','') }}</td>
                                    </tr>
                                    @endforeach	  			  
                                </tbody>
                            </table>
                
                          @endif
          
          				  <br /><br />

                        {{ Form::open(array('url' => 'update-order-status', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_od', 'id' => 'frm_od','files'=>true, 'autocomplete' => 'off')) }} 
                        
                         {!! Form::hidden('reference_id',$ID, array('id' => 'reference_id','required', 'class'=>'','placeholder'=>'')) !!} 
                          
                          <div class="col-lg-12 row">
                              <label for="Order Status" class="col-sm-3 row">Change Order status : </label>
                              <div class="col-sm-6">
                              <select name="order_status" id="order_status" <?php if($order_info[0]->order_status=='Shipped'){ echo  'disabled'; } ?>>
                                <option value="Not yet shipped" @if($order_info[0] -> order_status =='Not yet shipped') {{ 'selected' }} @endif >Not yet shipped</option>
                                <option value="Shipped" @if($order_info[0] -> order_status =='Shipped') {{ 'selected' }} @endif >Shipped</option>
                              </select>
                              </div>
                              <div class="clearfix"></div>
                              
                              @if (Session::has('success'))
                                  <span style="color:#090;">Order status has been changed successfully.</span>
                              @endif
                              
                              @if (Session::has('cos'))
                                  <span style="color:#F00;">Please change order status.</span>
                              @endif



                          </div>
                          
                          
                          
                          <div class="col-lg-12 row"><br /><br /></div>
                          
                          <div class="col-sm-12 row">
                          @if($order_info[0] -> order_status =='Not yet shipped')
                          {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                          @endif
                          <a href="{{  URL::to('administrator/manage-orders') }}" class="btn btn-danger">Back to Manage Orders</a></div>
                          <div class="col-lg-12 row"><br /><br /></div>
                          
                          {{ Form::close() }}
          
                          
                          
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@stop