<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;

use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Requests\CreateValidationRequest;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Response;
use File;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }
    //Import Excel filecode write here

    public function fileImport(Request $request)
    {
        $file = $request->file('file')->store('import');

        $import = new UsersImport;
        $import->import($file);
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return back()->withStatus(' import Successfully.');
    }


    // public function fileImport(Request $request)
    // {
    //     Excel::import(new UsersImport, $request->file('file'));
    //     return back()->withStatus('Import Excel Successfully!');
    // }

    //Export code
    public function fileExport(Request $request)
    {
        return Excel::download(new UsersExport, 'user-list.xlsx');
    }
    //for sample download
    public function sampleDownload()
    {

        $path = public_path('sample.xlsx');
        return Response::download($path);

        // if (file_exists(public_path('sample.xlsx'))) {
        //     //dd('File exists.');
        //     return Response::download($path);
        // } else {
        //     dd('File not exists.');
        // }


        // $headers = ['Content-Type: application/jpg'];
        // $fileName = time() . '.jpg';
        // return response()->download($path, $fileName, $headers);
    }

    // public function create()
    // {
    //     return view('user-create');
    // }

    // public function store(Request $request)
    // {
    //     if ($_POST) {

    //         // dd($request);
    //         $request->validate([
    //             'name' => 'required',
    //             'email' => 'required|email|unique:users-infos',
    //             'mobile' => 'required|mobile|unique:users-infos',
    //             'password' => 'required|min:6',
    //             'paragraph' => 'required',
    //             'states' => 'required',
    //         ]);

    //         $user = new User;
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->mobile = $request->mobile;
    //         $user->password = $request->password;
    //         $user->paragraph = $request->paragraph;
    //         $user->states = $request->states;
    //         $user->save();
    //         //  return redirect("user-info")->withSuccess('You have registered sucessfully');
    //     }
    //     return view('user-create');
    // }


    // public function show(UserInfo $userInfo)
    // {
    //     //
    // }
    // public function edit(UserInfo $userInfo)
    // {
    //     //
    // }
    // public function update(Request $request, UserInfo $userInfo)
    // {
    //     //
    // }
    // public function destroy(UserInfo $userInfo)
    // {
    //     //
    // }
}
