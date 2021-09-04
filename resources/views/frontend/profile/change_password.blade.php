@extends('frontend.main_master')
@section('content')

{{-- @php
    $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp --}}
    
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">

            </div>{{-- End col-md-2 --}}

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Change Password</span></h3>
                    <div class="card-body">
                     <form method="POST" action="{{ route('user.password.update') }}">
                      @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Current Password<span class="text-danger">*</span></label>
                            <input type="password" name="oldpassword" id="current_password" class="form-control unicase-form-control text-input">
                             @error('oldpassword')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">New Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control unicase-form-control text-input">
                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control unicase-form-control text-input">
                             @error('password_confirmation')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
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
