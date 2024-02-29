@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('export') }}" class="btn btn-inverse-info">Download XLsx</a>
        </ol>
    </nav>
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                                  <h6 class="card-title">Import Permission</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">XLsx File Import</label>
                                        <input type="file" class="form-control" name="import_fime" id="import_fime" autocomplete="off" placeholder="">
                                    </div>
                                      <button type="submit" class="btn btn-inverse-warning">Upload</button>
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
                import_fime: {
                    required : true,
                }, 
                
            },
            messages :{
                import_fime: {
                    required : 'Please Enter Import Permission',
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