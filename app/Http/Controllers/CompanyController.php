<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Companies;

class CompanyController extends Controller
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
        return view('company/create');
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
            'name'=>'required',
            
        ]);

        $newdata = new Companies;
        if($val->file('logo')){
            $file= $val->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/logo'), $filename);
            $newdata['logo']= $filename;
        }
        $newdata->name=$val->name;
        $newdata->email=$val->email;
        // $newdata->logo=$val->logo;
        $newdata->website=$val->website;
        
        $newdata->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=Companies::paginate(10);
        return view('company/show',compact('data'),['datas'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Companies::find($id);
        return view('company/edit',['item'=>$data]); 
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
            'name'=>'required',
            
        ]);

        $updata = [
            'name' => $val->name,
            'email' => $val->email,
            'website' => $val->website,
        ];
        if($val->file('logo')){
            $file= $val->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/logo'), $filename);
            $updata['logo']= $filename;
        }

        $affected = Companies::where('id', $val->id)->update($updata);
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
        $data=Companies::find($id);
        $data->delete();
        return back();
    }
}
