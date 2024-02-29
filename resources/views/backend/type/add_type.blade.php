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
  
                                  <h6 class="card-title">Add Property Type</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('store.type') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="type_name" class="form-label">Type Name</label>
                                        <input type="text" class="form-control @error('type_name') is-invalid @enderror" name="type_name" id="type_name" autocomplete="off" placeholder="Type Name">
                                        @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type_icon" class="form-label">Type Icon</label>
                                        <input type="text" class="form-control @error('type_icon') is-invalid @enderror" name="type_icon" id="type_icon" autocomplete="off" placeholder="Type Icon">
                                        @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
            type_name: {
                  required : true,
              }, 
              type_icon: {
                  required : true,
              }, 
              
          },
          messages :{
            type_name: {
                  required : 'Please Enter Type Name',
              }, 
              type_icon: {
                  required : 'Please Enter Type Icon',
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