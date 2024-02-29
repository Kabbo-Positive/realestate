@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                                  <h6 class="card-title">Update Permission</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('update.permission', $permissions->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $permissions->id }}">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Permission Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $permissions->name }}" autocomplete="off" placeholder="Permission Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select name="group_name" id="group_name" class="form-select">
                                            <option selected="" disabled="">Selected Group</option>
                                            <option value="type" {{ $permissions->group_name == 'type' ? 'selected' : '' }}>Property Type</option>
                                            <option value="state" {{ $permissions->group_name == 'state' ? 'selected' : '' }}>Property State</option>
                                            <option value="amenities" {{ $permissions->group_name == 'amenities' ? 'selected' : '' }}>Amenities</option>
                                            <option value="property" {{ $permissions->group_name == 'property' ? 'selected' : '' }}>Property</option>
                                            <option value="package history" {{ $permissions->group_name == 'package history' ? 'selected' : '' }}>Package History</option>
                                            <option value="property message" {{ $permissions->group_name == 'property message' ? 'selected' : '' }}>Property Message</option>
                                            <option value="testimonials" {{ $permissions->group_name == 'testimonials' ? 'selected' : '' }}>Testimonials</option>
                                            <option value="manage agent" {{ $permissions->group_name == 'manage agent' ? 'selected' : '' }}>Manage Agent</option>
                                            <option value="blog category" {{ $permissions->group_name == 'blog category' ? 'selected' : '' }}>Blog Category</option>
                                            <option value="blog post" {{ $permissions->group_name == 'blog post' ? 'selected' : '' }}>Blog Post</option>
                                            <option value="blog comment" {{ $permissions->group_name == 'blog comment' ? 'selected' : '' }}>Blog Comment</option>
                                            <option value="smtp setting" {{ $permissions->group_name == 'smtp setting' ? 'selected' : '' }}>SMTP Setting</option>
                                            <option value="site setting" {{ $permissions->group_name == 'site setting' ? 'selected' : '' }}>Site Setting</option>
                                            <option value="role" {{ $permissions->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                          </select>
                                    </div>
                                    
                                      <button type="submit" class="btn btn-primary me-2">Save</button>
                                  </form>
  
                </div>
              </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
     
      <!-- right wrapper end -->
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                group_name: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Permission Name',
                }, 
                group_name: {
                    required : 'Please Enter Group Name',
                }, 
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection