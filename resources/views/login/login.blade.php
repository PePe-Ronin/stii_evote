<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dentrack is super flexible, powerful, clean & modern responsive tailwind admin template.">
    <meta name="keywords" content="admin template, dashboard template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>stii-evote - Login</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- CSS Assets -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('build/assets/app-BwtZ4dtr.css') }}">

    <!-- JS Assets -->
    <script src="{{ asset('build/assets/app-CLuV0Q01.js') }}" defer></script>

    <!-- Notification Toast Component -->
    <x-menu.notification-toast />
</head>
<body>
    <div class="relative h-screen lg:overflow-hidden bg-primary bg-noise xl:bg-background xl:bg-none">
        <div class="p-3 sm:px-8 relative h-full">
            <div class="container relative z-10 mx-auto sm:px-20">
                <div class="block grid-cols-2 gap-4 xl:grid">
                    <!-- Login Info -->
                    <div class="hidden min-h-screen flex-col xl:flex">
                        <a class="flex items-center pt-10" href="#">
                            @php
                                $loginTopLogo = \App\Models\system_settings::where('key', 'login_top_logo')
                                    ->where('type', 'image')
                                    ->where('module_id', 6)
                                    ->where('status', 'active')
                                    ->first();
                                $topLogoPath = $loginTopLogo ? asset('storage/' . $loginTopLogo->value) : asset('assets/dist/images/logo.svg');
                            @endphp
                            <img class="w-6" src="{{ $topLogoPath }}" alt="Login Logo">
                            <span class="ml-3 text-xl font-medium text-white">STII-Evote</span>
                        </a>
                        <div class="my-auto">
                            @php
                                $loginCenterLogo = \App\Models\system_settings::where('key', 'login_center_logo')
                                    ->where('type', 'image')
                                    ->where('module_id', 3)
                                    ->where('status', 'active')
                                    ->first();
                                $centerLogoPath = $loginCenterLogo ? asset('storage/' . $loginCenterLogo->value) : asset('assets/dist/images/illustration.svg');
                            @endphp
                            <img class="-mt-16 w-1/2" src="{{ $centerLogoPath }}" alt="Login Illustration">
                            <div class="mt-10 text-4xl font-medium leading-tight text-white">STII-Evote</div>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                        <div class="box relative p-5 mx-auto my-auto w-full px-5 py-8 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-24 xl:w-auto xl:p-0">
                            <h2 class="text-center text-2xl font-semibold xl:text-left xl:text-3xl">Sign In</h2>
                            <div class="mt-2 text-center opacity-70 xl:hidden">
                                Access your student portal and participate in voting
                            </div>
                            <form method="POST" action="{{ route('authenticate') }}" class="mt-8 flex flex-col gap-5">
                                @csrf
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
                                <input class="h-10 w-full rounded-md border bg-background placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 px-5 py-6" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                <input class="h-10 w-full rounded-md border bg-background placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 px-5 py-6" type="password" name="password" placeholder="Password" required>
                                <div class="flex text-xs sm:text-sm">
                                    <div class="flex gap-2.5 mr-auto flex-row items-center">
                                        <div class="bg-background border-foreground/70 relative size-4 rounded-sm border">
                                            <input class="peer relative z-10 size-full cursor-pointer opacity-0" type="checkbox" id="remember-me" name="remember">
                                            <div class="z-4 bg-foreground invisible absolute inset-0 flex items-center justify-center text-white peer-checked:visible">
                                                <i data-lucide="check" class="stroke-[1.5]"></i>
                                            </div>
                                        </div>
                                        <label class="font-medium leading-none opacity-70" for="remember-me">Remember me</label>
                                    </div>
                                    <a class="opacity-70" href="{{ route('forgot-password') }}">Forgot Password?</a>
                                </div>
                            </form>
                            <div class="mt-5 text-center xl:mt-10 xl:text-left">
                                <button type="submit" form="login-form" class="h-10 w-full bg-(--color-primary) rounded-lg login-button">Login</button>
                                <a class="mt-4 h-10 w-full border rounded-lg text-center flex items-center justify-center" href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Toast Notification Script -->
    <script>
        function triggerLoginToast() {
            if (window.showMenuToast) {
                window.showMenuToast({
                    type: 'success',
                    title: 'Welcome Back!',
                    message: 'You have successfully logged in to the system.',
                    autoHideMs: 10000
                });
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const loginSuccess = urlParams.get('login') === 'success';
            const successMessage = document.querySelector('.bg-green-100, .alert-success');
            if (loginSuccess || successMessage) {
                setTimeout(triggerLoginToast, 1000);
            }
        });
    </script>
</body>
</html>
