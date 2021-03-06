<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user_role;

class mainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //manual select
        // $user_role = DB::select("select * from user_role");
        //with object
        $user_role = user_role::all();
        echo "<pre>";
        var_dump($user_role);

        // create
        //
        // $data = new user_role();
        // $data->role = 'role baru';
        // try {
        //   $data->save();
        //
        // } catch (\Exception $e) {
        //   return response()->json($e->getMessage(), 500);
        // }

        // update
        // $data = user_role::findOrFail(idnya);
        // $data->role = 'role baru';
        // try {
        //   $data->save();
        //
        // } catch (\Exception $e) {
        //   return response()->json($e->getMessage(), 500);
        // }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('edit')->cookie('groups', 'Administrator', 60); // dalam menit
      //echo $request->cookie('groups');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'role' => ['required', 'text'] // nullabel string
        ]);

        //DB:insert("INSERT INTO user_role VALUES(null, '".$request->input('role')."')");
        $data = new user_role();
        $data->role = $request->input('role'); // kali file $request->file('foto')->store('dir');
        $data->save();

        return redirect('crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit',[
          'data' => user_role::findOrFail($id)
        ]);
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
        //DB:insert("UPDATE user_role SET role ='".$request->input('role')."' WHERE role_id = $id");
        $data = user_role::findOrFail($id);
        $data->role = $request->input('role');
        $data->save();

        return redirect('crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB:delete("DELETE FROM user_role WHERE role_id = $id");
        $data = user_role::findOrFail($id);
        $data->delete();
        return redirect('crud');
    }
}
