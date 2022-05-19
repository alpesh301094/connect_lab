<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skill::pluck('name','id');
        if($request->ajax()){
            $employees = User::get();
            return Datatables::of($employees)
            ->editColumn('dob',function($employee){
                return Carbon::parse($employee->dob)->format('d-m-Y');
            })
            ->editColumn('interview_date',function($employee){
                return Carbon::parse($employee->interview_date)->format('d-m-Y');
            })
            ->editColumn('created_at',function($employee){
                return Carbon::parse($employee->created_at)->format('d-m-Y h:i A');
            })
            ->addColumn('profile_path',function($employee){
                if($employee->profile){
                    // return Storage::url($employee->profile);
                    $path = url('storage/app/'.$employee->profile);
                    return str_replace('public','',$path);
                }else{
                    return "";
                }
            })
            ->make(true);
        }
        return view('form')->with(['skills'=>$skills]);
    }
    
    public function add(Request $request)
    {
        $employee = new User();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->mobile_number = $request->mobile_number;
        $employee->dob = Carbon::parse($request->dob);
        $employee->company_name = $request->company_name;
        $employee->company_site = $request->company_site;
        $employee->company_description = $request->company_description;
        $employee->designation = $request->designation;
        $employee->interview_type = $request->interview_type;
        $employee->interview_date = Carbon::parse($request->interview_date);
        $employee->skill = isset($request->skill) ? implode(', ',$request->skill) : NULL;

        if($request->hasFile('profile')){
            $employee->profile = Storage::putFile('profile', $request->file('profile'));
        }

        if(!$employee->save()){
            return response()->json(['status' => false, 'message' => "Error occurs, Try again."]);
        }
        return response()->json(['status' => true, 'message' => "Record added."]);
    }
}
