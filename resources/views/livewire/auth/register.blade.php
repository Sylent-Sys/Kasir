<div class="min-vh-100 d-flex justify-content-center align-items-center bg-info">
    <div class="p-3 card shadow-lg bg-rounded">
        <div class="card-body">
            <h3 class="text-center">Register User</h3>
            <hr>
            <form action="#" wire:submit.prevent='register'>
                <div class="mb-3">
                    <label class="form-login">Name :</label>
                    <input type="text" class="form-control" wire:model.lazy='data.name' placeholder="Name">
                </div>
                <div class="mb-3">
                    <label class="form-login">Email :</label>
                    <input type="text" class="form-control" wire:model.lazy='data.email' placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-login">Password :</label>
                    <input type="text" class="form-control" wire:model.lazy='data.password' placeholder="Password">
                </div>
                <div class="mb-3 text-center">
                    <a href="{{ route('auth.login') }}" class="text-decoration-none">Sudah Punya Akun?</a>
                </div>
                <div>
                    <button class="w-100 btn btn-primary" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
