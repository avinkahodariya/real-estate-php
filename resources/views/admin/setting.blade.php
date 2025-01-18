@extends('admin.layout')
@section('title')
    {{ __('Save Setting') }} | {{ __('message.Admin') }}
@stop
@section('meta-data')
@stop
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{ __('Save Setting') }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('admin/Setting') }}">{{ __('Settings') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Save Setting') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            @if (Session::has('message'))
                                    <div class="col-sm-12">
                                        <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                                            role="alert">{{ Session::get('message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ url('admin/save_setting') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>{{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control" required
                                                    value="{{ isset($data->main_title) ? $data->main_title : '' }}" required
                                                    placeholder="{{ __('Enter') }} {{ __('Title') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ isset($data->phone) ? $data->phone : '' }}" required
                                                    placeholder="Enter Phone">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" required
                                                    value="{{ isset($data->email) ? $data->email : '' }}" required
                                                    placeholder="Enter Email">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea name="address" rows="5" class="form-control">{{ isset($data->address) ? $data->address : '' }}</textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn custom-btn" type="submit"
                                            value="Submit">{{ __('message.Submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" id="siteurl" value="{{ url('/') }}">
    <script>
        function getsubcat(val) {
            $.ajax({
                url: $("#siteurl").val() + "/admin/getsubcat" + "/" + val,
                method: "get",
                success: function(data) {
                    var str = JSON.parse(data);
                    var options = '<option value="">select a subCategory</option>';
                    str.forEach(function(str) {
                        options += '<option value="' + str.id + '">' + str.name + '</option>';
                    });
                    $('#subcategory').html(options);
                }
            });
        }



        function getsubcat1(val) {
            $.ajax({
                url: $("#siteurl").val() + "/getsubcat" + "/" + val,
                method: "get",
                success: function(data) {
                    var str = JSON.parse(data);
                    var options = '<option value="">select a subCategory</option>';
                    str.forEach(function(str) {
                        options += '<option value="' + str.id + '">' + str.name + '</option>';
                    });
                    $('#subcategory1').html(options);
                }
            });
        }
    </script>

@stop
@section('footer')
@stop
