<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Employees;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $val)
    {
        $val->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        $newdata = new Employees;
        $newdata->firstname=$val->firstname;
        $newdata->lastname=$val->lastname;
        $newdata->email=$val->email;
        $newdata->phone=$val->phone;
        $newdata->company=$val->company;
        
        $newdata->save();
        return back()->with('success','empoly Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=Employees::paginate(10);
        return view('show',['datas'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Employees::find($id);
        return view('edit',['item'=>$data]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $val)
    {
        $val->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        $updata = [
            'firstname' => $val->firstname,
            'lastname' => $val->lastname,
            'email' => $val->email,
            'phone' => $val->phone,
            'company' => $val->company
        ];

        $affected = Employees::where('id', $val->id)->update($updata);
        return redirect('/data-list')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Employees::find($id);
        $data->delete();
        return back();
    }
}
