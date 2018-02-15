@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<div id="content">
    <div class="container">
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
                <li> Add Category Type</li>
            </ul>
        </div>

        <div class="page-header"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header"><h4 class="height_div"><i class="fa fa-plus-square"></i> Add Category Type</h4> </div>
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
                                <span style="color:#F00;">This category name already exist.</span>
                                @endif

                                @if (Session::has('invformat'))
                                <span style="color:#F00;">Please upload correct file format.</span>
                                @endif

                            </div>

                            {{ Form::open(array('url' => 'add-category-type', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_cat_type', 'id' => 'frm_cat_type','files'=>true, 'autocomplete' => 'off')) }}  

                            <div class="form-group col-md-8">
                                <label>Menu*:</label> 
                                {!! Form::select('menu_id', array(''=>'Please Select', '1' => 'Events', '2' => 'Eat & Drink','3'=>'Hot Now'),null,['class' => 'form-control','required'=>'required']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                <span style="color:#F00;">
                                    Note : For better quality photo  <strong>width = </strong> 190px &  <strong>Height =</strong> 100px<br>
                                    Upload only <strong>png,jpg,jpeg</strong> extension banner.
                                </span>
                            </div>

                            <div class="form-group col-md-8">
                                <label>Category Type*:</label> 
                                {!! Form::text('cat_type','',array('id' => 'cat_type','required','class'=>'form-control','placeholder'=>'')) !!}
                            </div>

                            <div class="form-group col-md-8">
                                <label>Photo1*:</label> 
                                {!! Form::file('cat_ph1', array('id' => 'cat_ph1','required', 'class'=>'','placeholder'=>'','onchange'=>'return fileValidation(cat_ph1)')) !!}
                            </div>
                            <div class="form-group col-md-8">
                                <label>Photo2*:</label> 
                                {!! Form::file('cat_ph2', array('id' => 'cat_ph2', 'class'=>'','onchange'=>'return fileValidation(cat_ph2)')) !!}                                
                            </div>
                            <div class="form-group col-md-8">
                                <label>Photo3*:</label> 
                                {!! Form::file('cat_ph3', array('id' => 'cat_ph3', 'class'=>'','onchange'=>'return fileValidation(cat_ph3)')) !!}                                
                            </div>
                            <div class="form-group col-md-8">
                                <label>Photo4*:</label> 
                                {!! Form::file('cat_ph4', array('id' => 'cat_ph4', 'class'=>'','onchange'=>'return fileValidation(cat_ph3)')) !!}                                
                            </div>
                            <div class="clearfix"></div>



                            <div class="form-group col-md-12">
                                {{ Form::submit('Save', array('class' => 'btn btn-sm btn-success pull-left')) }}

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

<script>

    function fileValidation(fileInput) {
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
            fileInput.value = '';
            return false;
        }
    }

</script>