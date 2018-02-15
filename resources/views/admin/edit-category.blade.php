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
                <li> Edit Category</li>
            </ul>
        </div>

        <div class="page-header"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header"><h4 class="height_div"><i class="fa fa-pencil-square-o"></i> Edit Category </h4> </div>
                    <div class="widget-content">
                        <div class="col-xs-12 col-sm-12">
                            <div style="height:20px;">
                                @if (Session::has('success'))
                                <span style="color:#090;">Records has been updated successfully.</span>
                                @endif

                                @if (Session::has('blank'))
                                <span style="color:#F00;">Please enter all * marked controls values.</span>
                                @endif

                                @if (Session::has('exist'))
                                <span style="color:#F00;">This category type already exist in selected menu.</span>
                                @endif
                            </div>

                            {{ Form::open(array('url' => 'update-category', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_cat_type', 'id' => 'frm_cat_type','files'=>true, 'autocomplete' => 'off')) }}  


                            {!! Form::hidden('reference_id',$ID, array('id' => 'reference_id','required', 'class'=>'','placeholder'=>'')) !!}

                            <div class="form-group col-md-8">
                                <label>Menu*:</label> 
                                <!--{!! Form::select('menu_id', array(''=>'Please Select', '1' => 'Events', '2' => 'Eat & Drink','3'=>'Hot Now'),null,['class' => 'form-control','required'=>'required','onchange'=>'getTypes(this.value);']) !!}-->
                                <select name="menu_id" class="form-control" onchange='getTypes(this.value);'>
                                    <option value="">Please Select</option>
                                    <option value="1" <?php if($getMenuName->menu_id == 1){echo "selected";}; ?>>Events</option>
                                    <option value="2" <?php if($getMenuName->menu_id == 2){echo "selected";}; ?>>Eat & Drink</option>
                                    <option value="3" <?php if($getMenuName->menu_id == 3){echo "selected";}; ?>>Hot Now</option>
                                </select>

                            </div>

                            <div class="form-group col-md-8">
                                <label>Category Type*:</label>                                
                                                                
                                <select name="cat_type_id" class="form-control" id="cat_type">
                                   @foreach($getCategoryTypes as $getCategoryType)
            <option value="{{ $getCategoryType->cat_type_id }}" {{ $getCategoryType->cat_type_id == $getEditCategoryData->cat_type_id ? 'selected="selected"' : '' }}>{{ $getCategoryType->cat_type }}</option>     
                                @endForeach
                                </select> 
                            
                            </div>                     

                            <div class="form-group col-md-8">
                                <label>Category Name*:</label> 
                                {!! Form::text('cat_name',$getEditCategoryData->cat_name,array('id' => 'cat_name','required','class'=>'form-control','placeholder'=>'')) !!}
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-md-12">
                                {{ Form::submit('Update', array('class' => 'btn btn-sm btn-success pull-left')) }}

                                &nbsp;&nbsp;

                                <a href="{{ URL::to('administrator/manage-category') }}" class="btn btn-sm btn-danger">&nbsp;&nbsp;Back to List&nbsp;&nbsp; <i class="icon-angle-right"></i></a>

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
    function getTypes(menu_id) {

        if (menu_id) {
            $.ajax({
                type: "POST",
                cache: false,
                url: "{{ url('getCategoryType') }}",
                data: {"menu_id": menu_id},
                success: function (data) {
                    $("#cat_type").html(data);
                }
            });
            return false;
        }


    }
</script>