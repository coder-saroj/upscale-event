@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<script type="text/javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
<div id="content">
  <div class="container">
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
            <li> Add Product</li>
        </ul>
    </div>
    
    <div class="page-header"></div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header"><h4><i class="fa fa-plus-square"></i> Add Product</h4> </div>
                <div class="widget-content">
                    <div class="col-xs-12 col-sm-12">
                      <div style="height:20px;">
                        @if (Session::has('success'))
                            <span style="color:#090;">Records has been saved successfully.</span>
                        @endif
                        
                        @if (Session::has('blank'))
                            <span style="color:#F00;">Please enter all * marked controls values.</span>
                        @endif
                        
                        @if (Session::has('exist'))
                            <span style="color:#F00;">This product name already exist.</span>
                        @endif
                        
                        @if (Session::has('invformat'))
                            <span style="color:#F00;">Please upload correct file format.</span>
                        @endif
                        
                      </div>
                    
                      {{ Form::open(array('url' => 'add-product', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_product', 'id' => 'frm_product','files'=>true, 'autocomplete' => 'off')) }}  
                      
                      <div class="form-group col-md-8">
                      <label>Select Category*:</label> 
                      {!! Form::select('prd_cat_id',$cat_det,old('prd_cat_id'),array('id' => 'prd_cat_id','required','class'=>'form-control','default' => '')) !!}
                      </div>
                      
                      
                      <div class="form-group col-md-8">
                      <label>Product Name*:</label> 
                     {!! Form::text('product_name','',array('id' => 'product_name','required','class'=>'form-control','placeholder'=>'')) !!}
                      </div>
                      
                      <div class="form-group col-md-8">
                      <label>Product Price*:</label> 
                     {!! Form::text('product_price','',array('id' => 'product_price','required','class'=>'form-control','placeholder'=>'')) !!}
                      </div>
                     
                     
                     <div class="form-group col-md-8">
                      <label>Product Weight*: [In Kg.]</label> 
                     {!! Form::text('prd_weight','',array('id' => 'prd_weight','required','class'=>'form-control','placeholder'=>'')) !!}
                     </div>
                     
                      <div class="form-group col-md-8">
                        <label>Product  Photo*:</label> 
                        {!! Form::file('product_photo', array('id' => 'product_photo','required', 'class'=>'','placeholder'=>'')) !!}
                        <span style="color:#F00;">
                        Note : For better quality photo  <strong>width = </strong> 1000 &  <strong>Height =</strong> 1000<br>
                        Upload only <strong>png,jpg,jpeg</strong> extension banner.
                        </span>
                      </div>
                      <div class="clearfix"></div>
                      
                      <div class="form-group col-md-12">
                        <label>Product Specification & Description*:</label>
                        {!! Form::textarea('product_details','', array('id' => 'product_details','required', 'class'=>'ckeditor','placeholder'=>'')) !!}
                      </div>
                      
                      
                      <div class="form-group col-md-12">
                        <label>Meta Title*:</label>
                         {!! Form::text('prd_meta_title','',array('id' => 'prd_meta_title','','class'=>'form-control','placeholder'=>'')) !!}
                      </div>
                      
                      
                       <div class="form-group col-md-12">
                        <label>Meta Keywords*:</label>
                        {!! Form::textarea('prd_meta_keywords','',array('id' => 'prd_meta_keywords','', 'class'=>'form-control','size' => '30x5','placeholder'=>'')) !!}
                      </div>
                      
                      
                       <div class="form-group col-md-12">
                        <label>Meta Description*:</label>
                       {!! Form::textarea('prd_meta_descriptions','',array('id' => 'prd_meta_descriptions','', 'class'=>'form-control','size' => '30x5','placeholder'=>'')) !!}
                      </div>
                      
                    
                      <div class="clearfix"></div>
                     
                      
                      <div class="form-group col-md-12">
                      	{{ Form::submit('Save', array('class' => 'btn btn-sm btn-success pull-left')) }}
                        
                        &nbsp;&nbsp;
                        
                        <a href="{{ URL::to('administrator/manage-products') }}" class="btn btn-sm btn-danger">&nbsp;&nbsp;Back to List&nbsp;&nbsp; <i class="icon-angle-right"></i></a>
                        
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