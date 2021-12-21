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
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <!-- Validation Errors -->
                <x-backend.auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('admin.password.confirm') }}">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <x-backend.form.label for="password" :value="__('Password')" /> --}}
                        <x-backend.form.input id="password" class="form-control" type="password" name="password" :value="old('password')" required
                            autofocus placeholder="Password" />
                        <x-backend.form.input-append class="fas fa-lock" />
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <x-backend.form.button class="btn btn-primary btn-block">
                                {{ __('Confirm Password') }}
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
