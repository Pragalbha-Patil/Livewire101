<div class="container w-95">

    <div>
        <h3>Login</h3>
        <hr>
    </div>
    <form wire:submit.prevent="check" class="mt-5">
        <div class="form-group">
            <label for="email">Email address</label>
            <input wire:model="email" type="email" class="form-control"
                   placeholder="Enter email">
            @error('email') <span> {{$message}} </span> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input wire:model="password" type="password" class="form-control" placeholder="Password">
            @error('password') <span> {{$message}} </span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <span class="float-right">
            or <a href="/register">Create new account</a>
        </span>
    </form>

</div>
