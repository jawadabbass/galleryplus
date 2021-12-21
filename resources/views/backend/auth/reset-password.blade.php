<x-back-end.guest-layout>
    <x-backend.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-backend.application-logo />
            </a>
        </x-slot>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign up</p>
                <!-- Session Status -->
                <x-backend.auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-backend.auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('admin.password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('admin.token') }}">

                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="email" :value="__('Email')" /> --}}
                        <x-backend.form.input id="email" class="form-control" type="email" name="email"
                            :value="old('email', $request->email)" required autofocus />
                        <x-backend.form.input-append class="fas fa-envelope" />
                    </div>
                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="password" :value="__('Password')" /> --}}
                        <x-backend.form.input id="password" class="form-control" type="password" name="password"
                            :value="old('password')" required placeholder="Password" autocomplete="current-password" />
                        <x-backend.form.input-append class="fas fa-lock" />
                    </div>
                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="password_confirmation" :value="__('Confirm Password')" /> --}}
                        <x-backend.form.input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" :value="old('password_confirmation')" required
                            placeholder="Confirm Password" autocomplete="current-password" />
                        <x-backend.form.input-append class="fas fa-lock" />
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <x-backend.form.button class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </x-backend.form.button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>

    </x-auth-card>
</x-guest-layout>
