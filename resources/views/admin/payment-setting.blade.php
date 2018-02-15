@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<div id="content">
  <div class="container">
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
            <li> Payment Settings </li>
        </ul>
    </div>
    
    <div class="page-header"></div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header"><h4><i class="fa fa-money"></i> Payment Settings</h4> </div>
                    <div class="widget-content">
                        <div class="col-xs-12 col-sm-10">
                          <div style="height:20px;">
                            @if (Session::has('success'))
                                <span style="color:#090;">Records has been saved successfully.</span>
                            @endif
                            
                            @if (Session::has('blank'))
                                <span style="color:#F00;">Please enter all * marked controls values.</span>
                            @endif
                          </div>
                        	<?php 
							
							?>
                           {{ Form::open(array('url' => 'update-payment-setting', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_payment', 'id' => 'frm_payment', 'autocomplete' => 'off')) }}  
                             
                              <div class="form-group">
                                  <label class="col-md-3 control-label">Pay Pal Environment*:</label>
                                  <div class="col-md-9">
                                  <label>
                                     {!! Form::radio('paypal_environment','sandbox',$data[0]->paypal_environment=='sandbox',array('id' => 'paypal_environment','required', 'class'=>'','placeholder'=>'')) !!} Test</label>
                                     
                                     &nbsp;&nbsp;
                                     
                                      <label>
                                     {!! Form::radio('paypal_environment','live',$data[0]->paypal_environment=='live',array('id' => 'paypal_environment','required', 'class'=>'','placeholder'=>'')) !!} Live
                                     </label>
                                     
                                  </div>
                              </div>
                              
                              
                              <div class="form-group">
                                  <label class="col-md-3 control-label">Paypal ID*:</label>
                                  <div class="col-md-9">
                                     {!! Form::email('paypal_email',$data[0]->paypal_email,array('id' => 'paypal_email','required', 'class'=>'form-control','placeholder'=>'')) !!}
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <label class="col-md-3 control-label">Vat in % *:</label>
                                  <div class="col-md-9">
                                     {!! Form::text('vat_per',$data[0]->vat_per,array('id' => 'vat_per','required', 'class'=>'form-control','placeholder'=>'')) !!}
                                  </div>
                              </div>
                              
                              
                              <div class="form-group">
                                  <label class="col-md-3">&nbsp;</label>
                                  <div class="col-md-9">
                                      <span class="control-label" style="color:#090; font-size:14px;" >&nbsp;</span>
                                       {{ Form::submit('Update', array('class' => 'btn btn-sm btn-success pull-right')) }}
                                  </div>
                              </div>
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