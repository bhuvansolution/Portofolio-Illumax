<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <link href="/assets/images/illumax-icon.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
    <!-- BEGIN: Notification Content -->
    @include('dashboard.layouts.notification')
    <!-- END: Notification Content -->
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="/assets/images/logo.svg">
                    <span class="text-white text-lg ml-3"> Illumax </span>
                </a>
                <div class="my-auto">

                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Login
                    </h2>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="intro-x mt-8">
                            <input name="email" id="email" type="text"
                                class="intro-x login__input form-control py-3 px-4 block" placeholder="Username"
                                value="{{ old('email') }}">
                            <input name="password" name="password" type="password"
                                class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password"
                                value="{{ old('email') }}">
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" name="remember" type="checkbox"
                                    class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>

                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
    {{-- <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="login-light-login.html"
        class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div>
    <!-- END: Dark Mode Switcher--> --}}

    <!-- BEGIN: JS Assets-->
    <script src="/assets/js/app.js"></script>
    <script>
        window.onload = function() {
            @if (session()->has('success'))
                showSuccessNotification();
            @endif
            @if (session()->has('error'))
                showErrorNotification();
            @endif
        };
    </script>
    <!-- END: JS Assets-->
</body>

</html>
