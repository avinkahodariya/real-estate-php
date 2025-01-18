@extends('admin.layout')
@section('title')
    {{ __('message.Dashboard') }} | {{ __('message.Admin') }} {{ __('message.Dashboard') }}
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
                            <h4 class="mb-0">{{ __('message.Dashboard') }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{ __('message.Dashboard') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2" style="position: relative;">
                                    <div id="orders-chart" style="min-height: 45px;">
                                        <div id="apexcharts636a2b"
                                            class="apexcharts-canvas apexcharts636a2b apexcharts-theme-light"
                                            style="width: 45px; height: 45px;"><i class="uil-file"
                                                style="font-size: xx-large;"></i>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $category }}</span></h4>
                                    <p class="text-muted mb-0">Total Category</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2" style="position: relative;">
                                    <div id="orders-chart" style="min-height: 45px;">
                                        <div id="apexcharts636a2b"
                                            class="apexcharts-canvas apexcharts636a2b apexcharts-theme-light"
                                            style="width: 45px; height: 45px;"><i class="uil-file"
                                                style="font-size: xx-large;"></i>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $product }}</span></h4>
                                    <p class="text-muted mb-0">{{ __('message.Total Products') }}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2" style="position: relative;">
                                    <div id="orders-chart" style="min-height: 45px;">
                                        <div id="apexcharts636a2b"
                                            class="apexcharts-canvas apexcharts636a2b apexcharts-theme-light"
                                            style="width: 45px; height: 45px;"><i class="uil-image"
                                                style="font-size: xx-large;"></i>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $blog }}</span></h4>
                                    <p class="text-muted mb-0">Total Blog</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right mt-2" style="position: relative;">
                                    <div id="orders-chart" style="min-height: 45px;">
                                        <div id="apexcharts636a2b"
                                            class="apexcharts-canvas apexcharts636a2b apexcharts-theme-light"
                                            style="width: 45px; height: 45px;"><i class="uil-image"
                                                style="font-size: xx-large;"></i>
                                            <div class="apexcharts-legend"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $gallery }}</span></h4>
                                    <p class="text-muted mb-0">Total Gallery</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @stop
        @section('footer')
        @stop
