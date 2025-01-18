@extends('admin.layout')
@section('title')
{{__("message.edit_profile")}} | {{__("message.admin")}}
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
                  <h4 class="mb-0">{{__("message.Admin")}} {{__("message.edit_profile")}}</h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">{{__("message.Admin")}} {{__("message.edit_profile")}}</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <div class="row" style="display: flex;justify-content: center;">
            <div class="col-md-12 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     @if(Session::has('message'))
                     <div class="col-sm-12">
                        <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">{{ Session::get('message') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                     </div>
                     @endif
                     <form action="{{url('admin/updateaccount')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                           <label for="formrow-firstname-input">{{__("message.Name")}}</label>
                           <input type="text" class="form-control" id="name" name="name" placeholder='{{__("message.enter_last_name")}}' value="{{$userdata->name}}" required>
                        </div>
                        <div class="form-group">
                           <label for="formrow-firstname-input">{{__("message.Email")}}</label>
                           <input type="email" class="form-control" id="email" name="email" placeholder='{{__("message.enter_email")}}' value="{{$userdata->email}}" required>
                        </div>
                        <div class="form-group">
                           <label for="formrow-firstname-input">{{__("message.Phone")}}</label>
                           <input type="text" class="form-control" id="phone" name="phone" placeholder='{{__("message.Enter Phone")}}' value="{{$userdata->phone}}" required>
                        </div>
                        <div class="form-group">
                           <label for="formrow-firstname-input">{{__("message.Image")}}</label>
                           <img src="{{asset('public/upload/profile/').'/'.$userdata->profile_pic}}" style="width: 150px;height: 150px" />
                           <input type="file" class="form-control" id="profile_pic" name="profile_pic" >
                        </div>
                        <div class="mt-4">
                            @if(Session::get("is_demo")=='0')
                              <button type="button" onclick="disablebtn()" class="btn custom-btn">{{__('message.Submit')}}</button>
                           @else
                               <button  class="btn custom-btn" type="submit" value="Submit">{{__("message.Submit")}}</button>
                           @endif
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
