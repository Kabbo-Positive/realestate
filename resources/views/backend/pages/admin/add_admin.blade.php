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
  
                                  <h6 class="card-title">Add Admin</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('store.admin') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin User Name</label>
                                        <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Admin User Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin Name</label>
                                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Admin Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin Email</label>
                                        <input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="Admin Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" autocomplete="off" placeholder="Admin Phone">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin Address</label>
                                        <input type="text" class="form-control" name="address" id="address" autocomplete="off" placeholder="Admin Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Admin Password</label>
                                        <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Admin Password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Roles Name </label>
                                        <select name="roles" id="roles" class="form-select">
                                            <option selected="" disabled="">Selected Roles</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach 
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
                username: {
                    required : true,
                },
                name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                phone: {
                    required : true,
                },
                address: {
                    required : true,
                },
                password: {
                    required : true,
                },
                roles: {
                    required : true,
                },
                 
                
            },
            messages :{
                username: {
                    required : 'Please Enter Admin User Name',
                },
                name: {
                    required : 'Please Enter Admin Name',
                },
                email: {
                    required : 'Please Enter Admin Email',
                },
                phone: {
                    required : 'Please Enter Admin Phone',
                },
                address: {
                    required : 'Please Enter Admin Address',
                },
                password: {
                    required : 'Please Enter Admin Password',
                }, 
                roles: {
                    required : 'Please Select Roles Name',
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