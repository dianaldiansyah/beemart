<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <title>Beemart - Dashboard</title>
        <meta name="description" content="" />
        
        @include('template.styles')
    </head>
    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">

                @include('template.aside')

                <!-- Layout container -->
                <div class="layout-page">
                    
                    @include('template.navbar')

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        @yield('content')
                        
                        @include('template.footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        @include('template.scripts')
    </body>
</html>