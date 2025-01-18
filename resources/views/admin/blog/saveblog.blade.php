@extends('admin.layout')
@section('title')
    {{ __('Save Blog') }} | {{ __('message.Admin') }}
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
                            <h4 class="mb-0">{{ __('Save Blog') }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('admin/Blog') }}">Blog</a></li>
                                    <li class="breadcrumb-item active">{{ __('Save Blog') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('admin/saveblog') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Blog {{ __('Title') }}</label>
                                                <input type="text" name="title" class="form-control" required
                                                    value="{{ isset($data->title) ? $data->title : '' }}" required
                                                    placeholder="{{ __('Enter') }} Blog {{ __('Title') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select name="catrgory[]" id="" class="form-control" multiple>
                                                    @foreach ($category as $cat)
                                                        <option value="{{$cat->id}}"  {{ isset($data->category) && in_array($cat->id, explode(',', $data->category)) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label>Cover Image</label>
                                                @if ($data)
                                                    <input type="file" class="form-control" id="cover_image"
                                                        name="cover_image">
                                                    <img src="{{ asset('public/upload/blog') . '/' . $data->image }}"
                                                        style="width: 150px;height: 100px" />
                                                @else
                                                    <input type="file" class="form-control" required="" id="cover_image"
                                                        name="cover_image">
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="form-group">
                                                <label>{{ __('message.description') }}</label>
                                                <textarea name="description" rows="5" class="form-control">{{ isset($data->description) ? $data->description : '' }}</textarea>

                                            </div>
                                        </div> --}}
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
