<section>
    <div class="mb-4">
        <h2 class="h4">Update Password</h2>
        <p class="text-muted">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                Current Password
            </label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control"
                autocomplete="current-password"
            >
            @error('current_password', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">
                New Password
            </label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control"
                autocomplete="new-password"
            >
            @error('password', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">
                Confirm Password
            </label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control"
                autocomplete="new-password"
            >
            @error('password_confirmation', 'updatePassword')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-success">
                    Saved.
                </span>
            @endif
        </div>
    </form>
</section>