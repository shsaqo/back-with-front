<!DOCTYPE html>
<html lang="en">
@include('layouts.adminLayouts.head')

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.adminLayouts.header')
    @include('layouts.adminLayouts.bar')
    <div class="content-wrapper">
        @yield('admin-content')
    </div>
    @include('layouts.adminLayouts.footer')
</div>
</body>
</html>
