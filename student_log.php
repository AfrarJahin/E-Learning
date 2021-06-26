<!-- start student LOgin form -->
<!-- Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form student Login -->

                <form id="stuLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope-square"></i><label for="stuLogemail"
                            class="pl-2 font weight bold">Email</label>
                        <input type="email" class="form-control" name="stuLogemail" id="stuLogemail"
                            placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="stuLogpass">Password</label>
                        <input type="password" class="form-control" name="stuLogpass" id="stuLogpass"
                            placeholder="Password">
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" class="btn btn-primary" id="stuLoginBtn"
                    onclick="checkStudentLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end form(student Login) -->