@extends('admin.adminDashboard')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<div class="col-lg-12">
								<div class="card">
                                     <form method="POST"action=""enctype="multipart/form-data">
                                        @csrf
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control  @error('old_password') is-invalid    @enderror " name="category_name" id="category_name"  />
                                                @error('category_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" class="form-control  @error('new_password') is-invalid    @enderror " name="category_image" id="image"  />
                                                @error('category_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Category Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												 <img  id="showImage" src="{{ url('upload/avator.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
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
