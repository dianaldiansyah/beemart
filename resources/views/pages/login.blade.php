<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <title>Beemart - Login</title>
        <meta name="description" content="" />
        
        @include('template.styles')
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    </head>
    <body>
        <!-- Content -->
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <a href="index.html" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">
                                        <img src="{{ asset('assets/img/favicon/beemart.png') }}" width="50" alt="BeeMart">
                                    </span>
                                    <span class="app-brand-text demo text-body fw-bolder mt-2">BeeMart</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Welcome to BeeMart! 👋</h4>
                            <p class="mb-4">Please sign-in to your account and start the adventure</p>
                            <div class="alert alert-login mb-3" style="display: none"></div>
                            <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus/>
                                    <div class="form-text form-text-username text-danger"></div>
                                </div>
                                <div class="mb-4 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <div class="form-text form-text-password text-danger"></div>
                                </div>
                                <div class="mb-3 btn-login-wrap">
                                    <button class="btn btn-primary d-grid w-100 btn-login" type="button">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>
        
        @include('template.scripts')
    </body>
</html>