@extends('frontend.main_master')
@section('content')
    
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">

            </div>{{-- End col-md-2 --}}

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi, &nbsp;</span><strong>{{ Auth::user()->name }}</strong>&nbsp;Update your Profile</h3>
                    <div class="card-body">
                     <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                      @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                             @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                             @error('phone')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Profile Image<span class="text-danger">*</span></label> 
                            <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input">
                         </div>

                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">Update</button>
                         </div>

                          
                        
                     </form>
                    </div>
                </div>
            </div>{{-- End col-md-6 --}}
        </div>{{-- End Row --}}
    </div>
</div>

@endsection
