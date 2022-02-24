<div class="min-vh-100 d-flex justify-content-center align-items-center bg-info">
    <div class="p-3 card shadow-lg bg-rounded">
        <div class="card-body">
            <h3 class="text-center">Login User</h3>
            <hr>
            <form action="#" wire:submit.prevent='login'>
                <div class="mb-3">
                    <label class="form-login">Email :</label>
                    <input type="text" class="form-control" wire:model.lazy='data.email' placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-login">Password :</label>
                    <input type="text" class="form-control" wire:model.lazy='data.password' placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" wire:model.lazy='data.rememberme'>
                    <label class="form-check-label">
                        Remember Me
                    </label>
                </div>
                <div>
                    <button class="w-100 btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
