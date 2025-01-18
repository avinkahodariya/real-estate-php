@extends('admin.layout')
@section('title')
    {{ __('Gallery') }} | {{ __('message.Admin') }} {{ __('Gallery') }}
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
                            <h4 class="mb-0">{{ __('Gallery') }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{ __('Gallery') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                <h4 class="card-title">{{ __('Gallery') }} {{ __('message.List') }}</h4>
                                <p><a class="btn custom-btn" href="{{ url('admin/addgallery/0') }}">{{ __('message.Add') }}
                                        {{ __('Gallery') }}</a></p>
                                <div style="overflow-x: auto;">
                                    <table id="table" class="table table-bordered dt-responsive tablels"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>{{ __('message.Id') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('message.Image') }}</th>
                                                <th>{{ __('message.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gallery as $gallery)
                                                <tr>
                                                    <td>{{ $gallery->id }}</td>
                                                    <td>{{ $gallery->name }}</td>
                                                    <td><img src="{{ asset('public/upload/gallery') . '/' . $gallery->image }}"
                                                            style="width: 60px;height: 60px" /></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-xl-4 col-md-12">
                                                                <a href="{{ url('admin/addgallery', $gallery->id) }}"
                                                                    class="text-primary"><i
                                                                        class="uil uil-pen font-size-18"></i></a>

                                                                <a href="{{ url('admin/deletegallery', $gallery->id) }}"
                                                                    class="text-danger"><i
                                                                        class="uil uil-trash-alt font-size-18"></i></a>

                                                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
