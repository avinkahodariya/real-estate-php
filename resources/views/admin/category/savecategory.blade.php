@extends('admin.layout')
@section('title')
    {{ __('Save Category') }} | {{ __('message.Admin') }}
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
                            <h4 class="mb-0">Save Category</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('admin/product') }}">{{ __('message.Products') }}</a></li>
                                    <li class="breadcrumb-item active">Save Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('admin/savecategory') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="row">

                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>{{ __('Name') }}</label>
                                                <input type="text" name="name" class="form-control" required
                                                    value="{{ isset($data->name) ? $data->name : '' }}" required
                                                    placeholder="Enter Category Name">
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
@stop
@section('footer')
@stop
