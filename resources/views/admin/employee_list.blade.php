<?php
use Carbon\Carbon;
?>

@extends('layouts.master')
@section('content')

<style>
    img {
        object-fit: contain !important;
    }

</style>
{{-- MODALS  --}}




<!-- Modal -->
<div class="modal fade " data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="add_new_employee" tabindex="-1" aria-labelledby="add_new_employee" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold text-primary" id="exampleModalLabel">ADD NEW EMPLOYEE</h4>
                <i class="text-danger float-right btn-close mouse-pointer" data-bs-dismiss="modal" aria-label="Close" data-feather="delete"></i>
            </div>
            <div class="modal-body">

                <div class="row  ">
                    <div class="col-md-2" style=" ">
                        <img class="bg-transparent rounded-5 img-fluid " id="showPhoto" src="{{asset("images/logo/icon3.png")}}" alt="" width="400" height="450" style="border-radius: 15px; ">
                        <input type="file" value="{{asset("images/logo/icon3.png")}}" id="employee_photo" name="employee_photo" style="display: none">
                        <br>
                        <div class="d-flex mt-1 justify-content-between ">
                            <button class=" btn btn-outline-success shadow-none" id="browse_employee_photo"> <i data-id="change_profile" data-feather="edit"></i> Change Photo</button>
                            <button class=" btn btn-outline-danger shadow-none" id="remove_employee_photo" data-title="employee_photo" data-id="showPhoto"> <i data-id="remove_profile" data-feather="delete"></i> Remove Photo </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control shadow-none" id="name" value="" placeholder="Employee Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="employee_email">Employee Email</label>
                            <input type="email" class="form-control shadow-none" id="email" value="" placeholder="Employee Email">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_phone">Employee Phone</label>
                            <input type="" class="form-control shadow-none" id="phone" value="" placeholder="Employee Phone">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_gender">Employee Gender</label>
                            <select class="form-select shadow-none form-control " aria-label="Select Gender" id="employee_gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_gender">Employee Status</label>
                            <select class="form-select shadow-none form-control  " aria-label="Select Gender" id="employee_gender">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <div class="spinner-border text-primary save_employee_loader display_none" role="status" style="">
                    <span class="visually-hidden"></span>
                </div>
                <button type="button" class="btn btn-outline-primary  post_employee  ">Save changes</button>
            </div>
        </div>
    </div>
</div>









{{--date_to--}}
<section class="content_section">

    <div class="card p-1">
        <div class="card-body px-1 ">
            <div class="d-flex   justify-content-between">
                <div class="d-flex justify-content-start w-50 text-left ">
                    <div class="row w-100">
                        <div class=" col-12 col-sm  mb-1 col-md-2">
                            <div class="form-group">
                                <input type="date" value="{{\Illuminate\Support\Facades\Session::get('date_from')??\Carbon\Carbon::now()->startOfMonth()->todateString()}}" name="date_from" id="date_from" placeholder="25/06/2022" class="form-control shadow-none ">
                            </div>
                        </div>
                        <div class="col-12 col-sm mb-1 col-md-2">
                            <div class="form-group">
                                <input type="date" value="{{\Illuminate\Support\Facades\Session::get('date_to')??\Carbon\Carbon::now()->endOfMonth()->toDateString()}}" name="date_to" id="date_to" placeholder="25/06/2022" class="form-control shadow-none ">
                            </div>
                        </div>
                        <div class="col-12 col-sm mb-1 col-md-2">
                            <select name="per_page" id="per_page" class="form-control shadow-none ">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm mb-1 col-md-2">
                            <select name="employee_status" id="employee_status" class="form-control shadow-none ">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="all" selected>All</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm mb-1 col-md-2">
                            <select name="with_selected" id="with_selected" class="form-control shadow-none ">
                                <option value="0">With Selected</option>
                                <option value="deactivate">Deactivate</option>
                                <option value="activate">Activate</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>



                        <div class="col-12 col-sm mb-1 col-md-2">
                            <div class="form-group">
                                <input type="text" placeholder="Search" name="search" id="search" placeholder="25/05/2022" class="form-control shadow-none ">
                            </div>
                        </div>

                    </div>

                </div>


                <div class="d-flex justify-content-end w-50 text-right">
                    <div class="row w-100">
                        <!-- <div class="col-md-3">Ecxcel</div>
                        <div class="col-md-3">PDF</div>-->
                        {{-- <div class="col-md-3">PRINT</div> --}}

                        <div class=" text-right">

                            <button class="btn btn-outline-warning shadow-none ">
                                <i class="text-warning" data-id="status" data-feather="printer"></i> print
                            </button>

                            <button class="btn btn-outline-primary shadow-none ">
                                <i class="text-success" data-id="status" data-feather="file-text"></i>Excel
                            </button>

                            <button class="btn btn-outline-danger shadow-none ">
                                <i class="text-danger" data-id="status" data-feather="file"></i>PDF
                            </button>

                            <button class="btn btn-outline-info shadow-none " data-bs-toggle="modal" data-bs-target="#add_new_employee">
                                NEW EMPLOYEE
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class=" mt-1 table-hover table-bordered employees_table">

            </div>



        </div>
    </div>
    </div>
</section>

<input type="hidden" id="currentUrl" value="{{route('get_employees_ajax')}}">
<input type="hidden" id="selected_employee_id" value="">
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
@push('custom_scripts')
<script>
    feather.replace()

</script>
<script>
    $().ready(function() {
        getEmployeeList();

        function show_toast(title, body, color_class, bg_class) {
            const myToastEl = $($(".toast"));
            myToastEl.find(".toast_title").text(title);
            myToastEl.find(".toast_title").addClass(color_class);
            myToastEl.find(".toast_body").text(body);
            myToastEl.find(".toast_body").addClass(bg_class);
            myToastEl.find(".toast_body").addClass("text-white");
            $(".notification_bell").addClass(color_class);
            const toast_instance = new bootstrap.Toast(myToastEl);
            toast_instance.show();
        }

        //post employee
        $(".post_employee").on('click', function() {

            $(".error_message").empty();
            $("input").css('border', '2px solid #7367F0');

            let formData = new FormData();
            let employee_photo = document.getElementById('employee_photo').files[0];
            formData.append('name', $("#name").val());
            formData.append('email', $("#email").val());
            formData.append('phone', $("#phone").val());
            formData.append('employee_photo', employee_photo);

            $('.post_employee').addClass('display_none');
            $(".save_employee_loader").removeClass('display_none');

            $.ajax({
                url: '{{route('post_employee')}}'
                , type: 'POST'
                , processData: false
                , contentType: false
                , data: formData
                , success: function(response) {
                    $('.post_employee').removeClass('display_none');
                    $(".save_employee_loader").addClass('display_none');
                    show_toast("Employee Saved Successfully", "Employee Saved Successfully", "text-success", 'bg-success')
                    getEmployeeList();
                    $("#add_new_employee").modal('hide')
                }
                , error: function(response) {
                    $('.post_employee').removeClass('display_none');
                    $(".save_employee_loader").addClass('display_none');

                    $.each(response.responseJSON.errors, function(errorIndex, errorObject) {
                        let errorInput = $("#" + errorIndex);
                        errorInput.css('border', '2px solid red');
                        $.each(errorObject, function(errorIndexIndex, errorObjectInner) {
                            let errorArray = errorObjectInner.split(".")
                            $.each(errorArray, function(errorArrayIndex, error) {
                                let errorMessage = $(`<p class="text-danger m-0 error_message">` + error + `</p>`)
                                errorInput.after(errorMessage);
                            });

                        })

                    })
                }
            }).promise().done(function() {
                console.log("Request Ended");
            });
        })




        $('body').on('click', '.parent_class', function(e) {
            let employee_id = $(this).data("id");
            $("#selected_employee_id").val(employee_id.id);
            $(".child_row" + employee_id.id).empty();

            let detail_column = $(`
            <td colspan="9">

                <div class="row  ">
                    <div class="col-md-2" style="" >
                        Employee Image
                        <br>
                    <img class="bg-transparent rounded-5 " src="` + employee_id.employee_image + `" alt="" width="150" height="150" style="" >
                        <br>
                    <div class="text-left mt-1" style=""  >
                        <button  class=" btn btn-success shadow-none" > <i data-id="change_profile" data-feather="edit" ></i> Change</button>
                        <button  class=" btn btn-danger shadow-none" data-id="remove_profile" data-feather="delete">Remove</button>
                    </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control shadow-none" id="employee_name" value="` + employee_id.employee_name + `" placeholder="Employee Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="employee_email">Employee Email</label>
                            <input type="email" class="form-control shadow-none" id="employee_email" value="` + employee_id.employee_email + `" placeholder="Employee Email">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_phone">Employee Phone</label>
                            <input type="" class="form-control shadow-none" id="employee_phone" value="` + employee_id.employee_phone + `" placeholder="Employee Phone">
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_gender">Employee Gender</label>
                            <select class="form-select shadow-none form-control " aria-label="Select Gender" id="employee_gender" >
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="employee_gender">Employee Status</label>
                            <select class="form-select shadow-none form-control" aria-label="Select Gender" id="employee_gender" >
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-1 ">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-outline-danger shadow-none" >CANCEL</button>
                        <button class="btn btn-outline-success shadow-none" >SAVE CHANGES</button>
                    </div>
                </div>


                </td>

            `)

            $(".child_row" + employee_id.id).append(detail_column);

            $(".child_row" + employee_id.id).toggle();

        })

        $('body').on('click', '.order_header', function(e) {
            $(this).toggleClass('sorting');
            let sorting_column = $(this).data('sorting_column');
            let column_class = $(this).data('column_class');
            let direction = 'desc';
            if ($(this).hasClass("sorting")) {
                direction = "asc";
            }
            let url = '{{route("get_employees_ajax")}}';
            getEmployeeList($("#currentUrl").val(), sorting_column, direction, column_class);
        })


        $(".employee_menu").addClass('active');


        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $("#currentUrl").val(url)
            getEmployeeList(url);
            window.history.pushState("", "", url);
        });

        $("#per_page, #search,#date_from,#date_to,#employee_status").on('change', function() {
            getEmployeeList();
        });


        $("#search").on('keyup', function(e) {
            getEmployeeList();
        });





        function getEmployeeList(url = '{{route("get_employees_ajax")}}', sorting_column = 'created_at', direction = 'desc', colum_class = 'created_at') {
            console.log(direction)
            let date_from = $("#date_from").val();
            let date_to = $("#date_to").val();
            let newperPage = $("#per_page").val() || 10;
            let search = $("#search").val();
            $(".general_spinner").removeClass("d-none")

            $.ajax({
                url: url
                , data: {
                    url: url
                    , perPage: newperPage
                    , search: search
                    , date_from: date_from
                    , date_to: date_to
                    , sorting_column: sorting_column
                    , direction: direction
                    , colum_class: colum_class
                }
                , type: 'GET'
                , success: function(response) {
                    $(".employees_table").html(response);
                    $(".general_spinner").addClass("d-none")
                    if (direction === "asc") {
                        $("." + colum_class).addClass('sorting')
                        $("." + colum_class).find(".rotate").toggleClass("down");
                    }
                }
                , error: function(response) {
                    $(".general_spinner").addClass("d-none")
                }
            }).promise().done(function() {



            });
        }
    })

</script>
@endpush

@endsection
