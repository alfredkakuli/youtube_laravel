<div class="table-responsive">
    <table class=" table-responsive table table-hover  ">

        <thead class="">
            <tr>
                <th widtth="5%" class="text-start">#</th>
                <th widtth="5%" class="text-center">
                    <div class="form-check">
                        <input class="form-check-input selectall" type="checkbox" value="" id="selectall" checked>
                    </div>
                </th>
                <th class="text-center">Image</th>
                <th class="text-left order_header employee_name_sort " data-column_class="employee_name_sort" data-sorting_column="employee_name">Name <i class=" float-right rotate sort_icon " data-id="name" data-feather="arrow-up"></i></th>
                <th class="text-left order_header employee_email_sort " data-column_class="employee_email_sort" data-sorting_column="employee_email">Email <i class=" float-right rotate sort_icon " data-id="email" data-feather="arrow-up"></i> </th>
                <th class="text-left order_header employee_phone_sort " data-column_class="employee_phone_sort" data-sorting_column="employee_phone">Phone <i class=" float-right rotate sort_icon " data-id="phone" data-feather="arrow-up"></i> </th>
                <th width="10%" class="text-center">Status <i class="text-dark float-right rotate sort_icon " data-id="staus" data-feather="arrow-up"></i> </th>
                <th width="5%" class="text-center">Edit</th>
                <th width="5%" class="text-right">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $key => $employee)
            <tr>
                <td width="5%" class="text-start">{{$key+1}}</td>
                <td width="5%" class="text-center">
                    <div class="form-check">
                        <input class="form-check-input check_boxes" type="checkbox" value="" id="select{{$employee->id}}" checked>
                        <label class="form-check-label" for="select{{$employee->id}}">
                        </label>
                    </div>

                </td>
                <td class="text-center"><img src="{{$employee->employee_image}}" width="30" height="30" alt=""></td>
                <td class="text-left">{{$employee->employee_name}}</td>
                <td class="text-left">{{$employee->employee_email}}</td>
                <td class="text-left">{{$employee->employee_phone}}</td>
                <td width="10" class="text-center"><i class="text-success " data-feather="toggle-left"></i> </td>
                <td width="5" class="text-center parent_class" id="expanded_employee{{$employee->id}}" data-id="{{$employee}}"><i class="text-info " data-feather="edit"></i> </td>
                <td width="5" class="text-right"> <i class="text-danger float-right " data-feather="delete"></i> </td>
            </tr>
            <tr class=" employee_details child_row{{$employee->id}}" style="display: none">

            </tr>
            @endforeach

        </tbody>
    </table>
</div>


<div class="float-right text-right">
    {{$employees->links()}}
</div>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()

</script>
