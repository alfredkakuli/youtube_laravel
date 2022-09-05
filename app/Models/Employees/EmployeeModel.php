<?php

namespace App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class EmployeeModel extends Model
{
    use HasFactory;


    protected $table="employees";
    public $fillable=[
        'employee_image',
        'employee_name',
        'employee_email',
        'employee_phone',
        'employee_status',
    ];

    public function getEmployeeImageAttribute($value): string
    {
        if (is_null($value)) {
            return request()->root() . '/upload/users/profile/test_user.png';
        }
        return request()->root() . '/upload/users/profile/' . $value;
    }

    public $status=true;
    public $message="";
    public $data=[];
    public $code=200;


    public function get_employees_ajax ($request){
        if ($request->date_from) {
        $date_from = Carbon::parse($request->date_from)->toDateString();
        $date_to = Carbon::parse($request->date_to)->toDateString();
        } elseif (session()->get('date_from')) {
            $date_from = session()->get('date_from');
            $date_to = session()->get('date_to');
        } else {
            $date_from = Carbon::now()->startOfMonth()->toDateString();
            $date_to = Carbon::now()->endOfMonth()->toDateString();
        }
        $perPage=$request->perPage;

        $sorting_column = 'created_at';
        if (isset($request->sorting_column)) {
            $sorting_column = $request->sorting_column;
        }

        $sorting_direction = 'desc';
        if (isset($request->direction)) {
            $sorting_direction = $request->direction;
        }

        if ($request->perPage == "all") {
            $perPage = $this->count();
        }

        Session::put('date_from', $date_from);
        Session::put('date_to', $date_to);

         return $this
         ->whereBetween($this->convert_column('DATE','created_at'),[$date_from, $date_to])
         ->when($request->search, function($query) use ($request) {
            $query->where('employee_name', "LIKE", '%'.$request->search.'%')
            ->orwhere('employee_email', "LIKE", '%'.$request->search.'%')
            ->orwhere('employee_phone', "LIKE", '%'.$request->search.'%');
         })
         ->orderBy($sorting_column, $sorting_direction)
         ->paginate($perPage) ;
    }


    public function post_employee($request)
    {
        try {
            $newEmployee=$this;
            $newEmployee->employee_image= $request->hasFile('employee_photo')?$this->image_upload($request->file('employee_photo')) :'test_user';
            $newEmployee->employee_name=$request->name;
            $newEmployee->employee_email=$request->email;
            $newEmployee->employee_phone=$request->phone;
            $newEmployee->save();
            $this->message='Employee Saved Successfully';
            $this->data=[$newEmployee];
            $this->returnResponse();
        }catch (\Exception $exception){
            $this->status=false;
            $this->code=$exception->getCode();
            $this->message= ['errors' => [$exception->getMessage()]] ;
            $this->returnResponse();
        }
    }

    public function returnResponse()
    {
        return response()->json(["status"=>$this->status,"message"=>$this->message,"data"=>$this->data,"status_code"=>$this->code]);
    }

    public function image_upload($employee_image)
    {
            $extension=$employee_image->getClientOriginalExtension();
            $profile_photo_name=Str::slug($employee_image->getClientOriginalName().".".date('d-m-Y').".".time()).".".$extension;
            $path='upload/users/profile';
            $employee_image->move($path,$profile_photo_name);
            return $profile_photo_name;
    }

    function convert_column($convert_to, $column)
{
    return DB::raw(''.$convert_to.'('.$column.')');
}
}
