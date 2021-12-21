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
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-backend.auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('admin.verification.send') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="email" :value="__('Email')" /> --}}
                        <x-backend.form.input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus placeholder="Email" />
                        <x-backend.form.input-append class="fas fa-envelope" />
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <x-backend.form.button class="btn btn-primary btn-block">
                                {{ __('Resend Verification Email') }}
                            </x-backend.form.button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <button type="submit" class="mt-2 btn btn-warning">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>

    </x-auth-card>
</x-guest-layout>
