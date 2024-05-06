@extends('instructor.instructorDashboard')
@section('instructor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profilep</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{ (!empty($profileData->photo))  ? url('upload/instructor_images/'.$profileData->photo)  : url('upload/avator.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4>{{ Auth::user()->name }}</h4>
												<p class="text-secondary mb-1">{{ Auth::user()->username }}</p>
												<p class="text-muted font-size-sm">{{ Auth::user()->email }}</p>
												<button class="btn btn-primary">Follow</button>
												<button class="btn btn-outline-primary">Message</button>
											</div>
										</div>
										<hr class="my-4" />
										<ul class="list-group list-group-flush">
											<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
												<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
												<span class="text-secondary">https://codervent.com</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
                                     <form method="POST"action="{{ route('instructroprofileupdate') }}"enctype="multipart/form-data">
                                        @csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name"  value="{{ Auth::user()->name }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" />
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">photo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control" name="photo" id="image"  />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
											</div>
											<div class="col-sm-9 text-secondary">
													<img id="showImage" src="{{ (!empty($profileData->photo))  ? url('upload/instructor_images/'.$profileData->photo)  : url('upload/avator.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>




<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>s


@endsection
