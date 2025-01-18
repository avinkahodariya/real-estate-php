@extends('admin.layout')
@section('title')
    {{ __('Save Product') }} | {{ __('message.Admin') }}
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
                            <h4 class="mb-0">{{ __('Save Product') }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('admin/product') }}">{{ __('message.Products') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Save Product') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('admin/saveproduct') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('message.Products') }} {{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control" required
                                                    value="{{ isset($data->title) ? $data->title : '' }}" required
                                                    placeholder="{{ __('Enter') }} {{ __('message.Products') }} {{ __('Title') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select name="catrgory[]" id="" class="form-control" multiple>
                                                    @foreach ($category as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ isset($data->category) && in_array($cat->id, explode(',', $data->category)) ? 'selected' : '' }}>
                                                            {{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" name="price" class="form-control"
                                                    value="{{ isset($data->price) ? $data->price : '' }}" required
                                                    placeholder="Enter Price">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-6">
                                            <div class="form-group">
                                                <label>Original Price</label>
                                                <input type="number" name="originalprice" class="form-control" required
                                                    value="{{ isset($data->originalprice) ? $data->originalprice : '' }}"
                                                    required placeholder="Enter originalprice">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>{{ __('Uplode Image') }}</label>
                                                @if ($data)
                                                    <input type="file" class="form-control" id="image"
                                                        name="image">
                                                    <img src="{{ asset('public/upload/product') . '/' . $data->image }}"
                                                        style="width: 150px;height: 100px" />
                                                @else
                                                    <input type="file" class="form-control" required="" id="image"
                                                        name="image">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('message.description') }}</label>
                                                <textarea name="description" rows="5" class="form-control">{{ isset($data->description) ? $data->description : '' }}</textarea>

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
