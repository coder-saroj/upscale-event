@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<div id="content">
    <div class="container">
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
                <li> Add Category</li>
            </ul>
        </div>

        <div class="page-header"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header"><h4 class="height_div"><i class="fa fa-plus-square"></i> Add Category</h4> </div>
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

                            {{ Form::open(array('url' => 'add-category', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_cat_type', 'id' => 'frm_cat_type','files'=>true, 'autocomplete' => 'off')) }}  


                            <div class="form-group col-md-8">
                                <label>Menu*:</label> 
                                {!! Form::select('menu_id', array(''=>'Please Select', '1' => 'Events', '2' => 'Eat & Drink','3'=>'Hot Now'),null,['class' => 'form-control','required'=>'required','onchange'=>'getTypes(this.value);']) !!}
                            </div>

                            <div class="form-group col-md-8">
                                <label>Category Type*:</label>                                 
                                <!-- {!! Form::select('menu_id', array(''=>'Please Select', '1' => 'Event', '2' => 'Eat & Drink','3'=>'Hot Now'),null,['class' => 'form-control','required'=>'required']) !!}-->

<!--                                <select class="form-control" name="cat_type_id" id="cat_type"> 
                                    @foreach($data as $data)
                                    <option value="{{ $data->cat_type_id }}">{{$data->cat_type}}</option>
                                    @endforeach
                                </select>-->
                                <select class="form-control" name="cat_type_id" id="cat_type" required=""> 
                                    <option value="">Select Type</option>
                                </select>

                            </div>


                            <div class="form-group col-md-8">
                                <label>Category Name*:</label> 
                                {!! Form::text('cat_name','',array('id' => 'cat_name','required','class'=>'form-control','placeholder'=>'')) !!}
                            </div>

                            <div class="clearfix"></div>



                            <div class="form-group col-md-12">
                                {{ Form::submit('Save', array('class' => 'btn btn-sm btn-success pull-left')) }}

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
