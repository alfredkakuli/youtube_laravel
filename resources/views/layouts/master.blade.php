<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LIDTA</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app_assets/css/lidta_app.css') }}">
    <style>


    </style>

</head>

<body>

    <!-- Example Code -->
 <div class="toast fade" id="toast" role="alert" aria-live="assertive" data-bs-autohide="false" aria-atomic="true" style="position:fixed; right:  2%; top: 5%; z-index: 1000!important; ">
        <div class="toast-header d-flex justify-content-between ">
            <i class="text-warning notification_bell" data-feather="bell"> </i>
            <strong class="me-auto toast_title "></strong>
            <small class="text-muted toast_time"></small>

            <i class="text-danger float-right btn-close mouse-pointer" data-bs-dismiss="toast" aria-label="Close" data-feather="delete"></i>

        </div>
        <div class="toast_body px-4 py-3">

        </div>
    </div>


{{--    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top:30%; left:50%; z-index: 1000!important; ">--}}
{{--        <div class="toast-body">--}}
{{--            <h5 class="text-danger">Are yoy sure?</h5>--}}
{{--            <p class="text-dark">The Employee will be deleted and all the data related to the enployee will also be deleted!</p>--}}
{{--            <div class="mt-2 pt-2 border-top  d-flex justify-content-between ">--}}
{{--                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Close</button>--}}
{{--                <button type="button" class="btn btn-danger btn-sm">DELETE</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div> --}}


    @include('layouts.sidebar')
    <section class="main_page_section" style="position: relative">
        @include('layouts.navbar')

        @yield('content')

        <div class=" d-none spinner-border text-primary general_spinner" role="status" style="position: absolute; top: 35%; left: 50%; z-index: 100; ">
            <span class="visually-hidden"></span>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{asset('app_assets/js/lidta_app.js')}}"></script>
    @stack('custom_scripts')

    <style>
        .text-custom-success {
            color: #28C76F !important;
        }

        .bg-custom-success {
            background-color: #28C76F !important;
        }

    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        feather.replace()


        $(document).ajaxStart(function() {
            $(".general_spinner").show();
        }).ajaxStop(function() {
            $(".general_spinner").hide();
        });



        $().ready(function() {


            //=================BROWSE PHOTO======================
            $("#browse_employee_photo").on('click', function(e) {
                $("#employee_photo").click();
            })
            $("#employee_photo").on('change', function(e) {
                showFile(this, '#showPhoto')
            })
            //================SHOW PHOTO=========================
            function showFile(fileInput, img, showName) {
                if (fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(img).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
                $(showName).text(fileInput.files[0].name)
            }
            //=============REMOVE PHOTO=========================
            $("#remove_employee_photo").on('click', function(e) {
                let employee_file = $(this).data('title');
                let employee_photo = $(this).data('id');
                removeFile(employee_file, employee_photo);
            })

            function removeFile(employee_file, employee_photo) {
                $("#" + employee_file).attr('src', '');
                $("#" + employee_photo).attr('src', '');
            }

            const title = "An Error Occurred";
            const body = "Lorem ipsum dolor sit ammet";
            // show_toast(title, body, "text-danger", 'bg-danger')
            // document.getElementById('toast').addEventListener('hidden.bs.toast', () => {
            //     // do something...
            // })

        });

    </script>

</body>
</html>
