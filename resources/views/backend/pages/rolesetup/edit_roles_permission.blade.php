@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
</style>


<div class="page-content">
    <div class="row profile-body">
      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                                  <h6 class="card-title">Update Roles Permission</h6>
  
                                  <form id="myForm" class="forms-sample" method="POST" action="{{ route('admin.update.roles', $roles->id) }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Roles Name </label>
                                        <h3>{{ $roles->name }}</h3>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="checkDefaultmain" id="checkDefaultmain">
                                        <label class="form-check-label" for="checkDefaultmain">Permission All</label>
                                    </div>

                                    <hr>
                                    @foreach ($permission_groups as $permission_group)
                                    <div class="row">
                                        <div class="col-3">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($permission_group->group_name);
                                            @endphp
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault" {{ 
                                                    App\Models\User::roleHasPermissions($roles, $permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkDefault">{{ $permission_group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            
                                            @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}" {{ 
                                                    $roles->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @endforeach
                                            <br>
                                        </div>
                                        {{-- <div class="col-9">
                                            
                                            @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkDefault" value="{{ $permission->id }}"
                                                @if(count())
                                                @endif>
                                                <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @endforeach
                                            <br>
                                        </div> --}}
                                    </div>
                                    @endforeach

                                    
                                    
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
    
    $('#checkDefaultmain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type= checkbox]').prop('checked',true);
        }else{
            $('input[type= checkbox]').prop('checked',false);
        }
    });  
    
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                role_id: {
                    required : true,
                },
                group_name: {
                    required : true,
                }, 
                
            },
            messages :{
                role_id: {
                    required : 'Please Select Role',
                }, 
                group_name: {
                    required : 'Please Click The CheckBox',
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