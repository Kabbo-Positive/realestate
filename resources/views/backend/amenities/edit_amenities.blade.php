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
  
                                  <h6 class="card-title">Update Amenities</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('update.amenities', $amenities->id) }}">
                                    @csrf
                                    <input type="hidden" name="" value="{{ $amenities->id }}">
                                    <div class="mb-3">
                                        <label for="amenities_name" class="form-label">Type Name</label>
                                        <input type="text" class="form-control @error('amenities_name') is-invalid @enderror" name="amenities_name" value="{{ $amenities->amenities_name }}" id="amenities_name" autocomplete="off" placeholder="Amenities Name">
                                        @error('amenity_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                      <button type="submit" class="btn btn-primary me-2">Update</button>
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
                amenities_name: {
                    required : true,
                }, 
                
            },
            messages :{
                amenities_name: {
                    required : 'Please Enter Amenities Name',
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