<div>
  <div class="card">
    <div class="card-body">
      <h5 class="mb-5">Hi {{auth()->user()->name}}, enter your new password below:</h5>

      <form wire:submit.prevent="save">
        <div class="mb-3 row">
          <label for="password" class="col-md-2 col-form-label">Password</label>
          <div class="col-md-5">
            <input class="form-control" type="password" id="password" wire:model="password">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="confirm-password" class="col-md-2 col-form-label">Confirm Password</label>
          <div class="col-md-5">
            <input class="form-control" type="password" id="confirm-password" wire:model="password_confirmation">
          </div>
        </div>

        <button class="btn btn-primary">Change Password</button>
      </form>
    </div>
  </div>
</div>
