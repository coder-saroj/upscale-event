@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<script type="text/javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
<div id="content">
    <div class="container">
        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
                <li> Add Organizer</li>
            </ul>
        </div>

        <div class="page-header"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header"><h4 class="height_div"><i class="fa fa-plus-square"></i> Add Organizer</h4> </div>
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

                            {{ Form::open(array('url' => 'add-organizer', 'role' => 'form', 'class' =>'form-horizontal row-border', 'name' => 'frm_organizer', 'id' => 'frm_cat_type','files'=>true, 'autocomplete' => 'off')) }}  


                            <div class="form-group col-md-8">
                                <label>Event Organizer Name*:</label> 
                                {!! Form::text('org_name','',array('id' => 'org_name','required','class'=>'form-control','placeholder'=>'')) !!}
                            </div>
                            <div class="form-group col-md-8">
                                <label>Event Organizer Description*:</label> 
                                {!! Form::textarea('org_descrp','',array('id' => 'org_descrp','required','class'=>'ckeditor','placeholder'=>'')) !!}
                                <script type="text/javascript">
CKEDITOR.replace('contents', {
    filebrowserUploadUrl: '{{ url("public/ckeditor/filemanager/connectors/php/upload.php")}}'
});
                                </script>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Phone No.*:</label> 
                                {!! Form::text('contact_no','',array('id' => 'contact_no','class'=>'form-control','placeholder'=>'','onKeyup'=>'ValidatePhone()')) !!}
                            </div>
                            <div class="form-group col-md-8">
                                <label>Email*:</label> 
                                {!! Form::email('email','',array('id' => 'email','type'=>'email','required','class'=>'form-control','placeholder'=>'')) !!}
                            </div>
                            <div class="form-group col-md-8">
                                <label>Facebook URL:</label> 
                                {!! Form::url('facebook_url','',array('id' => 'facebook_url','class'=>'form-control','placeholder'=>'')) !!}
                            </div>
                            <div class="form-group col-md-8">
                                <label>Twitter URL:</label> 
                                {!! Form::url('twitter_url','',array('id' => 'twitter_url','class'=>'form-control','placeholder'=>'')) !!}
                            </div>

                            <div class="clearfix"></div>



                            <div class="form-group col-md-12">
                                {{ Form::submit('Save', array('class' => 'btn btn-sm btn-success pull-left')) }}

                                &nbsp;&nbsp;

                                <a href="{{ URL::to('administrator/manage-organizer') }}" class="btn btn-sm btn-danger">&nbsp;&nbsp;Back to List&nbsp;&nbsp; <i class="icon-angle-right"></i></a>

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
<script type = "text/javascript">
    function ValidatePhone() { 
        var mobile = document.getElementById("contact_no").value;
        var pattern = /^\d{10}$/;
        if (pattern.test(mobile)) {
            alert("Your mobile number : " + mobile);
            return true;
        }
        alert("It is not valid mobile number.input 10 digits number!");
        return false;
    }
</script>

