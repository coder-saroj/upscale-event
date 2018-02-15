@extends('admin.includes.master')
@section('title') {{ 'Admin Panel' }} @stop
@section('content')
<div id="content">
    <div class="container">

        <div class="crumbs">
            <ul id="breadcrumbs" class="breadcrumb">
                <li> <i class="fa fa-home"></i> <a href="{{ URL::to('administrator/dashboard') }}">Dashboard</a> </li>
                <li> Manage Categories</li>
            </ul>

            <a href="{{ asset('administrator/add-category') }}" class="btn btn-primary pull-right" style="display:inline-block; margin:4px 8px 0 0;">Add Category</a>

        </div>

        <div class="page-header"></div>

        <div class="row">

            <div style="height:20px;">
                @if (Session::has('success'))
                <span style="color:#090;padding-left: 16px;">Records has been deleted successfully.</span>
                @endif


            </div>

            <div class="col-md-12 dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="tbl_content">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align:center;"> Sl. </th>
                            <th>Category Type Name</th>
                            <th>Category Name</th>                        
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $sl=1; @endphp
                        @foreach ($getCategories as $getCategory)
                        <tr>
                            <td class="text-center" style="vertical-align:middle;">{{ $sl }} </td>
                            <td style="vertical-align:middle;">{{ $getCategory->cat_type }}</td>
                            <td style="vertical-align:middle;">{{ $getCategory->cat_name }}</td>

                            <td class="text-center" style="vertical-align:middle;">

                                <a href="edit-category/{{ $getCategory->cat_id }}/edit"><img src="{{ asset('public/images/edit-icon.png') }}" alt="Edit" /></a>

                                &nbsp;

                                <a href="{{ URL::to('administrator') }}/manage-category/{{ $getCategory->cat_id }}/delete"  onClick="return confirm('Are you sure you want to delete this record ?')"><img src="{{ asset('public/images/delete-icon.png') }}" alt="Delete" /></a>
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
    $(document).ready(function () {
        $('#tbl_content').DataTable({
            responsive: true,
            /* Disable initial sort */
            "aaSorting": [],
            /*Stay in same page*/
            "stateSave": true,
            "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
            /* Disable sorting columns */
            'aoColumnDefs': [{'bSortable': true, 'aTargets': [1]}]
        });
    });
</script>


@stop