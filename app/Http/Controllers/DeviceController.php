<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    public function addData(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|unique:todos|min:3',
        ]);
        $this->validate($req, [
            'member_id' => 'required',
        ]);
        $device = new Device;
        $device->name = $req('name');
        $device->member_id = $req('member_id');
        $device->save();
        /* if($result)
        {
        return ["Result"=> "Data has been successfully saved"];
        }
        else
        {
        return ["Result"=> "Operation Failed"];
        }*/
        return redirect('/device');
    }

    public function updateData(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if ($result) {
            return ["Result" => "Data has been successfully updated"];
        } else {
            return ["Result" => "Operation Failed"];
        }

    }

    public function showData()
    {
        return Device::all();
    }

    public function deleteData($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["Result" => "Data has been deleted" . $id];
        } else {
            return ["Result" => "Operation Failed"];
        }

    }

    public function searchData($name)
    {

        return Device::where("name", "like", "%" . $name . "%")->get();

    }

    ///New Code
    public function index()
    {

        $device = Device::all();
        return view('index', ['devices' => $device]);

    }

    public function store()
    {
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'member_id' => ['required'],
            ]);
        } catch (ValidationException $e) {
        }
        $data = request()->all();
        $device = new Device();
        //On the left is the field name in DB and on the right is field name in Form/view
        $device->name = $data['name'];
        $device->member_id = $data['member_id'];
        $device->save();
        session()->flash('success', 'Device created succesfully');
        return redirect('show');

    }

    public function create()
    {
        return view('device');
    }

    public function details(Device $device)
    {

        return view('details', ['devices' => $device]);

    }
    public function edit($id)
    {$device = Device::find($id);

        return view('edit', ['devices' => $device]);

    }

    public function update(Request $req, Device $device)
    {
        // print_r($req->all());
        // exit;
        //we will write codes for updating a todo here
        try {

            $this->validate(request(), [
                'name' => ['required'],
                'member_id' => ['required'],
            ]);
        } catch (ValidationException $e) {
        }
        $data = request()->all();
        $device->name = $data['name'];
        $device->member_id = $data['member_id'];
        $device->save();
        session()->flash('success', 'Device created succesfully');
        return redirect('show');

    }
    public function delete(Device $device)
    {
        $device->delete();
        return redirect('show');
    }

}
