@extends('master')

@section('content')
    <div class="card mx-auto w-50 text-center mt-3 p-2 text-marker">User Configuration</div>
    <div class="form-group card d-flex flex-column align-content-center mx-auto mb-3 mt-3 p-2 w-75" >
        <div class="card mx-auto mt-3 p-2 w-25 text-center">Logged as: <strong>{{Auth::user()->name}}</strong></div>
        <form class="d-flex flex-column mb-3 mx-auto w-50" action="{{route('updateUser')}}" method="POST">
            @csrf
            <span class="text-marker">New user name</span>
            <input class="form-control" type=" text" name="name" placeholder="Username" required>
            <span class="text-marker">Password</span>
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            <span>
                <span class="text-marker">Change password: </span>
                <input type="checkbox" name="changePassword">
            </span>
            
            <div class="newPassword">
                <span class="text-marker">New Password</span>
                <input class="form-control" type="password" name="newPassword" placeholder="New Password">
                <span class="text-marker">Confirm Password</span>
                <input class="form-control" type="password" name="newPasswordConfirm" placeholder="Confirm New Password">
            </div>
            <div id="buttons" class="d-flex flex-column align-content-between mt-2">
                {{-- Tip: podrías delegar el submit a una función de JS que valide los campos de los formularios --}}
                <input type="submit" class="btn btn-primary my-2" value="Update my account!">
            </div>
        </form>
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-marker" id="exampleModalLabel">Delete account?</h5>
                  
                </div>
                <div class="modal-body">
                  <span>Please enter your password to confirm your account's deletion.</span>
                  <form action="{{route('delete-account')}}" method="POST">
                    @csrf
                    <input type="password" class="form-control my-2" name="password" id="">
                    <div class="d-flex mt-1">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mx-2">Delete Account</button>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        <div id="buttons" class="d-flex flex-column mb-3 mx-auto w-50">
            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAccountModal">Delete Account</button>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(()=>{
        $(".changePassword").prop("checked", false);
        $(".newPassword").hide();
        let changePasswordCheck = $("[name=changePassword]");
        changePasswordCheck.change(()=>{
            if(changePasswordCheck.prop("checked")){
                $(".newPassword").show();
                $('[name="newPassword"]').attr('required', true);
                $('[name="newPasswordConfirm"]').attr('required', true);
            } else {
                $(".newPassword").hide();
                $('[name="newPassword"]').removeAttr('required');
                $('[name="newPasswordConfirm"]').removeAttr('required');
            }
        });
    })
</script>
@endsection