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
  
                                  <h6 class="card-title">Add Permission</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('store.permission') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Permission Name</label>
                                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Permission Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select name="group_name" id="group_name" class="form-select">
                                            <option selected="" disabled="">Selected Group</option>
                                            <option value="type">Property Type</option>
                                            <option value="state">Property State</option>
                                            <option value="amenities">Amenities</option>
                                            <option value="property">Property</option>
                                            <option value="package history">Package History</option>
                                            <option value="property message">Property Message</option>
                                            <option value="manage agent">Manage Agent</option>
                                            <option value="blog category">Blog Category</option>
                                            <option value="blog post">Blog Post</option>
                                            <option value="blog comment">Blog Comment</option>
                                            <option value="smtp setting">SMTP Setting</option>
                                            <option value="site setting">Site Setting</option>
                                            <option value="role">Role & Permission</option>
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