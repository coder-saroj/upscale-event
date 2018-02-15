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
            <li> Edit Category Type</li>
        </ul>
    </div>
    
    <div class="page-header"></div>
            
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
              <div class="widget-header"><h4><i class="fa fa-pencil-square-o"></i> Edit Category Type</h4> </div>
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
                            <span style="color:#F00;">This category type already exist in selected menu.</span>
                        @endif
                        
                        @if (Session::has('invformat'))
                            <span style="color:#F00;">Please upload correct file format.</span>
                        @endif
                      </div>
                    
                      {{ Form::open(array('url' => 'update-category-type', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_cat_type', 'id' => 'frm_cat_type','files'=>true, 'autocomplete' => 'off')) }}  
                      
                      
                      {!! Form::hidden('reference_id',$ID, array('id' => 'reference_id','required', 'class'=>'','placeholder'=>'')) !!}

                      <div class="form-group col-md-8">
                          <label>Menu*:</label> 
                          {!! Form::select('menu_id', array(''=>'Please Select', '1' => 'Events', '2' => 'Eat & Drink','3'=>'Hot Now'),$data[0]->menu_id,['class' => 'form-control','required'=>'required']) !!}
                      </div>
                          
                      <div class="form-group col-md-8">
                        <label>Category Type*:</label> 
                        {!! Form::text('cat_type',$data[0]->cat_type,array('id' => 'cat_type','required','class'=>'form-control','placeholder'=>'')) !!}
                      </div>
                      
                      <div class="form-group col-md-8">
                          <label>Deafult Photo*:</label> 
                          {!! Form::select('dea_ph', array(''=>'Please Select', '1' => 'Photo1', '2' => 'Photo2','3'=>'Photo3','4'=>'Photo4'),$data[0]->dea_ph,['class' => 'form-control','required'=>'required']) !!}
                      </div>
                     
                     <div class="form-group col-md-12">
                     <span style="color:#F00;">
                        Note : For better quality photo  <strong>width = </strong> 1366 &  <strong>Height =</strong> 501<br>
                        Upload only <strong>png,jpg,jpeg</strong> extension banner.
                     </span>
                   </div>


                  <div class="form-group col-md-8">
                    <label>Photo1:</label> 
                    {!! Form::file('cat_ph1', array('id' => 'cat_ph1','', 'class'=>'','placeholder'=>'')) !!}
                  </div>
                  <div class="clearfix"></div>
                    
                    
                  <div class="form-group col-md-8">
                    @if($data[0]->cat_ph1)
                    <img src="{{ asset('public/category-type-photo/thumb/'.$data[0]->cat_ph1) }}" alt="" style="width:10%;"/>
                    @endif
                  </div>


                  <div class="form-group col-md-8">
                    <label>Photo2:</label> 
                    {!! Form::file('cat_ph2', array('id' => 'cat_ph2','', 'class'=>'','placeholder'=>'')) !!}
                  </div>
                  <div class="clearfix"></div>
                    
                    
                  <div class="form-group col-md-8">
                    @if($data[0]->cat_ph2)
                    <img src="{{ asset('public/category-type-photo/thumb/'.$data[0]->cat_ph2) }}" alt="" style="width:10%;"/>
                    @endif
                  </div>



                  <div class="form-group col-md-8">
                    <label>Photo3:</label> 
                    {!! Form::file('cat_ph3', array('id' => 'cat_ph3','', 'class'=>'','placeholder'=>'')) !!}
                  </div>
                  <div class="clearfix"></div>
                    
                    
                  <div class="form-group col-md-8">
                    @if($data[0]->cat_ph3)
                    <img src="{{ asset('public/category-type-photo/thumb/'.$data[0]->cat_ph3) }}" alt="" style="width:10%;"/>
                    @endif
                  </div>



                  <div class="form-group col-md-8">
                    <label>Photo4:</label> 
                    {!! Form::file('cat_ph4', array('id' => 'cat_ph4','', 'class'=>'','placeholder'=>'')) !!}
                  </div>
                  <div class="clearfix"></div>
                    
                    
                  <div class="form-group col-md-8">
                    @if($data[0]->cat_ph4)
                    <img src="{{ asset('public/category-type-photo/thumb/'.$data[0]->cat_ph4) }}" alt="" style="width:10%;"/>
                    @endif
                  </div>
                    
                  <div class="clearfix"></div>
                      
                      <div class="form-group col-md-12">
                      	{{ Form::submit('Update', array('class' => 'btn btn-sm btn-success pull-left')) }}
                        
                        &nbsp;&nbsp;
                        
                        <a href="{{ URL::to('administrator/manage-category-type') }}" class="btn btn-sm btn-danger">&nbsp;&nbsp;Back to List&nbsp;&nbsp; <i class="icon-angle-right"></i></a>
                        
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