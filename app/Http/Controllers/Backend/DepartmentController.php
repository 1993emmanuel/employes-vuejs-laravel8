<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Http\Requests\DepartmentStoreRequest;

class DepartmentController extends Controller
{
    
    public function index(Request $request){
        $departments = Department::all();
        if($request->has('search')){
            $departments = Department::where('name','like',"%{$request->search}%")->get();
        }
        return view('departments.index',compact('departments'));
    }

    public function create(){
        return view('departments.create');
    }

    public function store(DepartmentStoreRequest $request){
        Department::create($request->validated());
        return redirect()->route('departments.index')->with('message','Department created successfully!!');
    }

    public function edit(Department $department){
        return view('departments.edit',compact('department'));
    }

    public function update(DepartmentStoreRequest $request, Department $department){
        $department->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('departments.index')->with('message','Department edited Successfully!!!!');
    }

    public function destroy(Department $department){
        $department->delete();
        return redirect()->route('departments.index')->with('message','Department Deleted Successfully!!!!!!!!!!');
    }

}
