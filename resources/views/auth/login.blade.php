<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ config('app.settings.logo') }}" alt="" style="width:100px;">
                <a href="{{ route('login') }}" class="h1">{{ config('app.settings.name') }}</a>
            </div>
            <div class="card-body">


                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" placeholder="username@mail.com" required autofocus
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="input-group mb-3">
                        <x-input-label for="email" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            placeholder="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" />
                                <label for="remember"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-primary btn-block">
                                Sign In
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <p class="login-box-msg">Sign in to start your session</p>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</x-guest-layout>
