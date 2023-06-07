<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $settings = Setting::orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin.setting.index',[
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        Setting::create($request->validated() + [
            'logo' => $request->hasFile('logo') ? $request->file('logo')->store('setting', 'public') : '',
            'favicon' => $request->hasFile('favicon') ? $request->file('favicon')->store('setting', 'public') : ''
        ]);
        return redirect()->route('admin.setting.index')->with('success', 'Setting Added');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', [
            'setting' => $setting
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        if($request->hasFile('logo')) $this->deleteFile($setting->getRawOriginal('logo'));

        if($request->hasFile('favicon')) $this->deleteFile($setting->getRawOriginal('favicon'));
        
        $setting->update($request->validated() + [
            'logo' => $request->hasFile('logo') ? $request->file('logo')->store('setting', 'public') : $setting->getRawOriginal('logo'),
            'favicon' => $request->hasFile('favicon') ? $request->file('favicon')->store('setting', 'public') : $setting->getRawOriginal('favicon')
        ]);
        return redirect()->route('admin.setting.index')->with('success', 'Setting Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $logo = $setting->getRawOriginal('logo');
        if($logo) $this->deleteFile($logo);

        $favicon = $setting->getRawOriginal('favicon');
        if($favicon) $this->deleteFile($favicon);

        $setting->delete();
        return redirect()->route('admin.setting.index')->with('success', 'Setting Deleted');
    }

    private function deleteFile($file)
    {
        if(Storage::exists($file))
            Storage::delete($file);
    }
}
