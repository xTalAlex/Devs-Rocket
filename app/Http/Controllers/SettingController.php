<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function index()
    {
        return view(backpack_view('base.setting_fields'));
    }

    /*
        Gets the validation rules from config by Setting::getValidationRules(), 
        then it just loops over the request data and adds it in setting if a setting is defined in config file.

        Setting::add($key) method first checks if setting with the name already exists, 
        if yes it simply updates it otherwise it creates a new setting with given key.
    */
    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }
}
