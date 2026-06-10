<section>
    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="card-title mb-2">Profile Information</h4>
            <p class="text-muted mb-4">
                Update your account's profile information and email address.
            </p>

            <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required
                        autofocus
                        autocomplete="name">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                        required
                        autocomplete="username">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning">
                        <p class="mb-2">
                            Your email address is unverified.
                        </p>

                        <button
                            form="send-verification"
                            class="btn btn-sm btn-outline-primary"
                            type="submit">
                            Re-send Verification Email
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success mt-3 mb-0">
                                A new verification link has been sent to your email address.
                            </div>
                        @endif
                    </div>
                @endif

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>

                    @if (session('status') === 'profile-updated')
                        <span class="text-success">
                            ✓ Profile Updated Successfully
                        </span>
                    @endif
                </div>

            </form>

        </div>
    </div>
</section>