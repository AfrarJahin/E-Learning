    <!-- Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form student reg -->

                    <form id="stuRegForm">
                        <div class="form-group">
                            <i class="fas fa-user"></i><label for="stuname"
                                class="pl-2 font weight bold">Name</label><small id='statusMsg1'></small>
                            <input type="text" class="form-control" name="stuname" id="stuname"
                                placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-envelope-square"></i><label for="stuemail"
                                class="pl-2 font weight bold">Email</label><small id='statusMsg2'></small>
                            <input type="email" class="form-control" name="stuemail" id="stuemail"
                                placeholder="Enter your email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="stupass">Password</label><small
                                id='statusMsg3'></small>
                            <input type="password" class="form-control" name="stupass" id="stupass"
                                placeholder="Password">
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button type="button" class="btn btn-primary" id="stuAdd">Sign up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>