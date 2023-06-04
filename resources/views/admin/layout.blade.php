<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malik</title>
    <link rel="stylesheet" href=" {{ asset('admin') }}/css/all.min.css">
    <link rel="stylesheet" href=" {{ asset('admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/framework.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="page d-flex">
        @include('admin.sidebar')
                <!-- start content -->
        <div class="content w-full">
                <!-- start head  -->

            @include('admin.navbar')
                <div class=" d-grid g-20 mb-20">
                    @yield('content')
                </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/all.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
</body>

</html>
