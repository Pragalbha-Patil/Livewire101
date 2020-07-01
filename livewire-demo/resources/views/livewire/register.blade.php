<div class="container w-95">
    <div>
        @if($registered)
            <div>
                <h3>Registration successful. Yayy!</h3>
            </div>
            @else
            <h3 class="center-text">Registration form</h3>
        @endif
    </div>
    <hr>

    <form wire:submit.prevent="register">
        <div class="form-group">
            <label for="name">Name</label>
            <input wire:model="name" type="text" class="form-control" placeholder="Enter name">
{{--            <small class="form-text text-muted">Hello.. {{$name}}</small>--}}
            @error('name') <span> {{$message}} </span> @enderror
        </div>

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

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
