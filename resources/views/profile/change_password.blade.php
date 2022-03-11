<div id="changePasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            {!! Form::open(array('route'=>'pass.update','method'=>'PUT','name'=>'passsubmit')) !!}
            {{-- <form method="POST" id='changePasswordForm'> --}}
                <div class="" id="alertapass">
                </div>
                <div class="modal-body">
                    {{-- @if($errors->any())
                    <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los compo!</strong>
                        @foreach($errors->all() as $error)
                            <span class="badge badge-danger" >{{ $error }}</span>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="hayerror" name="hayerror" value="1">
                    
                    @endif --}}
                    {{-- <input type="hidden" id="hayerror" name="hayerror" value="0"> --}}
                    <div class="alert alert-danger d-none" id=""></div>
                    <input type="hidden" name="is_active" value="1">
                    <input type="hidden" name="user_id" id="editPasswordValidationErrorsBox">
                    {{csrf_field()}}
                    <div class="row">
                        {{-- <div class="form-group col-sm-12">
                            <label>Current Password:</label><span
                                    class="required confirm-pwd"></span><span class="required">*</span>
                            <div class="input-group">
                                <input class="form-control input-group__addon" id="pfCurrentPassword" type="password"
                                       name="password_current" required>
                                <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="icon-ban icons"></i>
                                </span>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group col-sm-12">
                            <label>New Password:</label><span
                                    class="required confirm-pwd"></span><span class="required">*</span>
                            <div class="input-group">
                                <input class="form-control input-group__addon" id="pfNewPassword" type="password"
                                       name="password" required>
                                <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="icon-ban icons"></i>
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Confirm Password:</label><span
                                    class="required confirm-pwd"></span><span class="required">*</span>
                            <div class="input-group">
                                <input class="form-control input-group__addon" id="pfNewConfirmPassword" type="password"
                                       name="password_confirmation" required>
                                <div class="input-group-append input-group__icon">
                                <span class="input-group-text changeType">
                                    <i class="icon-ban icons"></i>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" onclick="validar()" class="btn btn-primary" id="btnPrPasswordEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">
                            Save
                        </button>
                        <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            {{-- </form> --}}
            {!! form::close() !!}
        </div>
    </div>
</div>
{{-- <?php --}}
@section('scripts')
    <script>

        function validar(){
            clave = document.getElementById("pfNewPassword").value;
            validaclave = document.getElementById("pfNewConfirmPassword").value;
            
            // $( document ).ready(function() {
            //         $('#changePasswordModal').modal('toggle')
            //     });
            if(clave == validaclave){
                console.log("contrasñas iguales");
                 document.passsubmit.submit();
                 $( document ).ready(function() {
                    $('#changePasswordModal').modal('hide');
                });
               
            }else{
                console.log("contrasñas desiguales");
                $( document ).ready(function() {
                    $('#changePasswordModal').modal();
                });
                document.getElementById("alertapass").className = "alert alert-danger";
                document.getElementById("alertapass").innerHTML = "<strong>error!</strong>";
                    console.log("contrasñas gaa");
            
            }
            

        };

    // let error = document.getElementById('hayerror').value;
    // if (document.getElementById("hayerror") != null) {
    // let error = document.getElementById("hayerror").value;
    //     if(error==1){
    //         console.log("si hay error");
    //         $( document ).ready(function() {
    //             $('#changePasswordModal').modal();
    //         });
    //     }
    // }else{
    //     console.log("no hay error");
    // }
    
    // if(error != null) {
    //     console.log(error);
    // }else{
    //     error=null;
    //     console.log(error);
    // }
    
    // if (typeof error === 'undefined') { 
    //     console.log("no hay"); 
    // } 
    // else { 
    //     console.log(error);
    // }
    
    // if(error==1){
    //     console.log("gaaa");
    //     $( document ).ready(function() {
    //         $('#changePasswordModal').modal('toggle')
    //     });
    // }else{
    //     console.log("gaaaaaa0");
    // }
        
    </script>
@endsection
