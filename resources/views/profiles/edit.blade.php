<x-app>
    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" required
                value="{{ $user->name }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required
                value="{{ $user->username }}">
            @error('username')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required
                value="{{ $user->email }}">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" class="form-control-file" name="avatar" placeholder="Avatar">
            @error('avatar')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" rows="5" placeholder="Description"
                required>{{ $user->attrs->description }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="wallpaper">Wallpaper</label>
            <input type="file" class="form-control-file" name="wallpaper" placeholder="Wallpaper">
            @error('wallpaper')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password</label>
            <input type="password" class="form-control" name="password_confirmation"
                placeholder="Password Confirmation">
            @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-outline-primary">Cancel</button>
    </form>
</x-app>