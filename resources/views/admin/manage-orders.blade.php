@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<div id="content">
  <div class="container">
      
      <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
            <li> Manage Orders</li>
        </ul>
        
        <!--<a href="{{ asset('administrator/add-coupon-code') }}" class="btn btn-primary pull-right" style="display:inline-block; margin:4px 8px 0 0;">Add Coupon Code</a>-->
        
      </div>
      
      <div class="page-header"></div>
      
      <div class="row">
          <div class="col-md-12 dataTable_wrapper">
              <table class="table table-striped table-bordered table-hover" id="tbl_content">
                <thead>
                    <tr>
                        <th width="5%" style="text-align:center;"> Sl. </th>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Order Status</th>
                        <th>Transaction ID</th>
                        <th>Total</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php $sl=1; @endphp
                    @foreach ($data as $res)
                    <tr>
                        <td class="text-center" style="vertical-align:middle;">{{ $sl }} </td>
                         <td style="vertical-align:middle;">{{ $res->order_id }}</td>
                         <td style="vertical-align:middle;">{{ date("jS M,Y",strtotime($res->order_date)) }}</td>
                         <td style="vertical-align:middle;">{{ $res->bill_full_name }}</td>
                         <td style="vertical-align:middle;">
                          @if($res->order_status=='Shipped')
                            <span class="btn btn-success btn-xs">{{ $res->order_status }}</span>
                          @else
                          {{ $res->order_status }}
                          @endif
                         </td>
                         <td style="vertical-align:middle;">{{ $res->transaction_id }}</td>
                         <td style="vertical-align:middle;">&pound; {{ number_format($res->grand_total,2,'.','') }}</td>
                         <td class="text-center" style="vertical-align:middle;">
                         <a href="order-details/{{ $res->order_id }}/details"><img src="{{ asset('public/images/view.png') }}" alt="Edit" /></a>
                         
                        &nbsp;
                        <a href="{{ URL::to('administrator') }}/manage-orders/{{ $res->order_id }}/delete"  onClick="return confirm('Are you sure you want to delete this record ?')"><img src="{{ asset('public/images/delete-icon.png') }}" alt="Delete" /></a>
                        </td>
                    </tr>
                    @php $sl+=1; @endphp
                    @endforeach
                </tbody>
              </table>
          </div>
      </div>
      
  </div>
</div>

<script>
$(document).ready(function() {
    $('#tbl_content').DataTable({
        responsive: true,
        /* Disable initial sort */
        "aaSorting": [],
        /*Stay in same page*/
        "stateSave": true,
		"lengthMenu": [[25, 50,100, -1], [25, 50,100, "All"]],
        /* Disable sorting columns */
        'aoColumnDefs': [{'bSortable': true,'aTargets': [1]}]
    });
});
</script>


@stop