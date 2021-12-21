<x-back-end.guest-layout>
    <x-backend.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-backend.application-logo />
            </a>
        </x-slot>
        <div class="card">
            <div class="card-body login-card-body">

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-backend.auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-backend.auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('admin.password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="email" :value="__('Email')" /> --}}
                        <x-backend.form.input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                            autofocus placeholder="Email" />
                        <x-backend.form.input-append class="fas fa-envelope" />
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <x-backend.form.button class="btn btn-primary btn-block">
                                {{ __('Email Password Reset Link') }}
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
