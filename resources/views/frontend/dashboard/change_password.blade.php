@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}"/>
<div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                    <div class="setting-body">
                        <h3 class="fs-17 font-weight-semi-bold pb-4">Change Password</h3>
                    <form method="post" action="{{ route('user.password.changes') }}" class="row pt-40px">
                        @csrf
                           	<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Old Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control  @error('old_password') is-invalid    @enderror " name="old_password" id="old_password"  />
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control  @error('new_password') is-invalid    @enderror " name="new_password" id="new_password"  />
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Confirmation Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control  @error('new_password') is-invalid    @enderror " name="new_password_confirmation" id="new_password_confirmation"  />
                                                @error('new_password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>

										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-success"value="Save Changes">
											</div>
										</div>
									</div>
                        </form>
                    </div><!-- end setting-body -->
                </div><!-- end tab-pane -->



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>







@endsection



