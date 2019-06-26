@extends('layouts.site')
@section('site-content')
<link href="{{ asset('site/userprofile.css') }}" rel="stylesheet">
<section class="hero_in general start_bg_zoom">
   <div class="wrapper">
      <div class="container">
         <h1 class="fadeInUp animated"><span></span>Owner Dashboard</h1>
      </div>
   </div>
</section>
<br> 
<div class="panel-body">
   @if (session('status'))
   <div class="alert alert-success">
      {{ session('status') }}
   </div>
   @endif
   
   <div class="row profile">
         
      {{-- 
      <div class="col-md-3">
         <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic text-center">
               <img src="{{ asset('site/userprofile.png') }}" class="img-responsive" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
               <div class="profile-usertitle-name">
                  {{Auth::user()->name}}
               </div>
               <div class="profile-usertitle-job">
                  Owner
               </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
               <button type="button" class="btn btn-success btn-sm">Follow</button>
               <button type="button" class="btn btn-danger btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <br>
            <ul class="nav flex-column">
               <li class="nav-item">
                  <a class="nav-link active" href="{{route('home')}}">Dashboard</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('property.index')}}">Properties</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('property.create')}}">Add Property</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
               </li>
            </ul>
         </div>
      </div>
      --}}
      <div class="col-md-12">
         <div class="profile-content">
            <h4 class="text-left text-capitalize" >Step 1: Enter Property form details</h4>
            <div class="message">
               @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
            </div>
            <form method="POST" class="repeater" data-parsley-validate=""  action="{{ route('property.store') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data" >
               {{ csrf_field() }}
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Property Title</label>
                        <input class="form-control" required data-parsley-trigger="change" type="text" id="title" name="title">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Per Night Rent*</label>
                        <input class="form-control" required data-parsley-trigger="change" data-parsley-type="digits" type="number" placeholder="$" id="per_night_rent" name="per_night_rent">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label>Property Description</label>
                  <textarea class="form-control" required data-parsley-trigger="change" id="description" name="description" style="height:150px;"></textarea>
               </div>
               <!-- /row -->
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Availability From</label>
                        <input class="form-control" required type="date" data-parsley-trigger="change" id="availability_from" name="availability_from">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Availability To</label>
                        <input class="form-control" required type="date"  data-parsley-trigger="change" id="availability_to" name="availability_to">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Property Thumbnail</label>
                        <input class="form-control" required type="file" id="thumbnail" name="thumbnail">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Property Address</label>
                        <textarea class="form-control" required id="address" name="address" style="height:100px;"></textarea>
                     </div>
                  </div>
               </div>
               <!-- /row -->
               <hr>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Type</label>
                        <div class="custom-select-form">
                           <select class="wide add_bottom_15" required data-parsley-trigger="change"  name="type" id="type" style="display: none;">
                              <option value="" selected="">Select your type</option>
                              <option value="House">House</option>
                              <option value="Apartment">Apartment</option>
                           </select>
                           <div class="nice-select wide add_bottom_15" tabindex="0">
                              <span class="current">House</span>
                              <ul class="list">
                                 <li data-value=""  selected="" class="option">Select your type</li>
                                 <li data-value="House" class="option">House</li>
                                 <li data-value="Apartment" class="option focus">Apartment</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Status</label>
                        <div class="custom-select-form">
                           <select class="wide add_bottom_15" required data-parsley-trigger="change"  name="status" id="status" style="display: none;">
                              <option value="" selected="">Select your Status</option>
                              <option value="Rent">Rent</option>
                              <option value="Sale">Sale</option>
                           </select>
                           <div class="nice-select wide add_bottom_15" tabindex="0">
                              <span class="current">Rent</span>
                              <ul class="list">
                                 <li data-value=""  selected="" class="option">Select your Status</li>
                                 <li data-value="Rent" class="option">Rent</li>
                                 <li data-value="Sale" class="option focus">Sale</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Loaction</label>
                        <input class="form-control" data-parsley-trigger="change" required type="text" id="location" name="location">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Bedrooms</label>
                        <input class="form-control" data-parsley-type="digits" data-parsley-trigger="change"  required type="number" id="bedroom" name="bedroom">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Bathrooms</label>
                        <input class="form-control" data-parsley-type="digits" data-parsley-trigger="change"  required type="number" id="bathroom" name="bathroom">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Floors</label>
                        <input class="form-control" data-parsley-type="digits" data-parsley-trigger="change"  required type="number" id="floor" name="floor">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Garages</label>
                        <input class="form-control" data-parsley-type="digits" data-parsley-trigger="change"  required type="number" id="garage" name="garage">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Area</label>
                        <input class="form-control" data-parsley-trigger="change"  required type="number" id="area" name="area" placeholder="sqft">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Size</label>
                        <input class="form-control" type="number" data-parsley-trigger="change"  required id="size" placeholder="sqft" name="size">
                     </div>
                  </div>
               </div>
               <hr>
               <h5>Property Features</h5>
               <hr>
               <div class="row">
                  @isset($features)
                  @foreach ($features as $feature)
                  <div class="col-md-3">
                     <div class="checkboxes float-left">
                        <label class="container_check">{{$feature->name}}
                        <input type="checkbox" name="feature[]" value="{{$feature->id}}" >
                        <span class="checkmark"></span>
                        </label>
                     </div>
                  </div>
                  @endforeach
                  @endisset
               </div>
               <hr>
               
               <h5>Multiple Occasion Rates </h5>
               <hr>
               <div data-repeater-list="group-a">
                  <div data-repeater-item>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Occasion</label>
                              <input required data-parsley-trigger="change"  class="form-control" placeholder="Occasion name" type="text" id="occasion_name" name="occasion_name">
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Availability From</label>
                              <input required data-parsley-trigger="change"  class="form-control" required type="date" id="occasion_availability_from" name="occasion_availability_from">
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Availability To</label>
                              <input required data-parsley-trigger="change"  class="form-control" required type="date" id="occasion_availability_to" name="occasion_availability_to">
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group">
                              <label>Per Night Rent*</label>
                              <input required data-parsley-trigger="change"  class="form-control" required type="number" placeholder="$" id="occasion_per_night_rent" name="occasion_per_night_rent">
                           </div>
                        </div>
                        <div class="col-md-2">
                              <div class="form-group" style="margin-top: 20px;">
                                 <input data-repeater-delete class="btn_1 rounded" type="button" value="Delete"/>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
               <input data-repeater-create type="button" class="btn_1 " value="Add"/>
               
               <p class="add_top_30">
                  <button type="submit" name="submit" value="Submit" class="btn_1 rounded" id="submit-contact">Next ></button>
               </p>
            </form>
         </div>
      </div>
   </div>
</div>
<br>
<script src="{{ asset('plugins/repeater/jquery-1.11.1.js') }}"></script>
<script src="{{asset('plugins/repeater/jquery.repeater.min.js')}}"></script>
<script>
   $(document).ready(function () {
       'use strict';
   
       $('.repeater').repeater({
           defaultValues: {
               'textarea-input': 'foo',
               'text-input': 'bar',
               'select-input': 'B',
               'checkbox-input': ['A', 'B'],
               'radio-input': 'B'
           },
           show: function () {
               $(this).slideDown();
           },
           hide: function (deleteElement) {
               if(confirm('Are you sure you want to delete this element?')) {
                   $(this).slideUp(deleteElement);
               }
           },
           ready: function (setIndexes) {
    
           }
       });
   
       
   });
</script>
@endsection