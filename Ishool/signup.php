<!-- Modal -->
<div class="modal fade" id="RegistrationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="RegistrationModalLabel">
          Student Registration Form
        </h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
       </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="Registerform">
      <div class="mb-3">
          <strong>
          <i class="fas fa-user"></i>
          <label for="Name" class="form-label">Name</label>
          <small id="statusmsg1"></small>
          </strong>
          <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Name">
        </div>
        <div class="mb-3">
          <strong>
          <i class="fas fa-envelope"></i>
          <label for="Email" class="form-label">Email address</label>
          <small id="statusmsg2"></small>
          </strong>
          <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
      <div class="mb-3">
        <strong>
        <i class="fas fa-key"></i>
        <label for="Password" class="form-label">Password</label>
         <small id="statusmsg3"></small>
        </strong>
       <input type="password" class="form-control" id="stupassword" name="stupassword" placeholder="Password">
      </div>
      </div>
      <div class="modal-footer">
        <small id="successmsg"></small>
        <button type="button" id="btnsign" class="btn btn-primary" onclick="addstu()">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>