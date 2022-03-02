<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\select;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::join('department','department.id','=','employee.department_id')->select([
            'employee.id as id',
            'employee.name',
            'employee.username',
            'employee.password',
            'employee.identity',
            'employee.address',
            'employee.phone',
            'employee.datesigned',
            'department.roles',
            'employee.role'
        ])->get();
        return response($employee, 200);
    }

    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check_manager = Employee::where([['department_id', $request->department_id], ['role', $request->role], ['role', '!=', 0]])->first();
        if($check_manager == ""){
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->username = $request->username;
            $employee->password = $request->password;
            $employee->identity = $request->identity;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->datesigned = $request->datesigned;
            $employee->department_id = $request->department_id;
            $employee->role = 1;
            if($employee->save()){
                return new EmployeeResource($employee);
            }
        }else{
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->username = $request->username;
            $employee->password = $request->password;
            $employee->identity = $request->identity;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->datesigned = $request->datesigned;
            $employee->department_id = $request->department_id;
            $employee->role = 0;
            if($employee->save()){
                return new EmployeeResource($employee);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check_manager = Employee::where([['department_id', $request->department_id], ['role', $request->role], ['role', '!=', 0]])->first();
        if($check_manager == ""){
            $employee = Employee::findOrFail($id);
            $employee->name = $request->name;
            $employee->username = $request->username;
            $employee->password = $request->password;
            $employee->identity = $request->identity;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->datesigned = $request->datesigned;
            $employee->department_id = $request->department_id;
            $employee->role = 1;
            if($employee->save()){
                return new EmployeeResource($employee);
            }
        }else{
            $employee = Employee::findOrFail($id);
            $employee->name = $request->name;
            $employee->username = $request->username;
            $employee->password = $request->password;
            $employee->identity = $request->identity;
            $employee->address = $request->address;
            $employee->phone = $request->phone;
            $employee->datesigned = $request->datesigned;
            $employee->department_id = $request->department_id;
            $employee->role = 0;
            if($employee->save()){
                return new EmployeeResource($employee);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if($employee->delete()){
            return new EmployeeResource($employee);
        }
    }
    public function search($name)
    {
        $result = Employee::join('department','department.id','=','employee.department_id')->select([
            'employee.id as id',
            'employee.name',
            'employee.username',
            'employee.password',
            'employee.identity',
            'employee.address',
            'employee.phone',
            'employee.datesigned',
            'department.roles',
            'employee.role'
        ])->where('name', 'LIKE', '%'. $name. '%')->get();
        if(count($result)){
            return Response()->json($result);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }
    public function filter(Request $request){
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');
         
        $get_all_employee = Employee::join('department','department.id','=','employee.department_id')->select([
            'employee.id as id',
            'employee.name',
            'employee.username',
            'employee.password',
            'employee.identity',
            'employee.address',
            'employee.phone',
            'employee.datesigned',
            'department.roles',
            'employee.role'
        ])->whereBetween('datesigned', [
            $start_date, $end_date
        ])->get();
        return response($get_all_employee, 200);
    }
    public function filterdep($departmentrole){
        $employee = Employee::join('department','department.id','=','employee.department_id')->select([
            'employee.id as id',
            'employee.name',
            'employee.username',
            'employee.password',
            'employee.identity',
            'employee.address',
            'employee.phone',
            'employee.datesigned',
            'department.roles',
            'employee.role'
        ])->where('roles', $departmentrole)->get();
        return response($employee, 200);
    }
}
