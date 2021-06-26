<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form Admin Login -->

                <form id="adminLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope-square"></i><label for="adminLogemail"
                            class="pl-2 font weight bold">Email</label>
                        <input type="email" class="form-control" name="adminLogemail" id="adminLogemail"
                            placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="adminLogpass">Password</label>
                        <input type="password" class="form-control" name="adminLogpass" id="adminLogpass"
                            placeholder="Password">
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <small id="statusAdminLogMsg"></small>
                <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()"> Login
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>