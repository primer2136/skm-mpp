<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_admin' => 'required|max:35',
                'username' => 'required|max:35',
                'password' => 'required',
                'status' => 'required',
            ],
            [
                'nama_admin.required' => 'Harus diisi',
                'nama_admin.max' => 'Jangan melebihi 35 huruf',
                'username.required' => 'Harus diisi',
                'username.max' => 'Jangan melebihi 25 huruf',
                'password.required' => 'Harus diisi',
                'status.required' => 'Harus diisi',
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('admin')
            ->where('nama_admin', 'like', "%{$request->keyword}%")
            ->orWhere('username', 'like', "%{$request->keyword}%")
            ->orWhere('status', 'like', "%{$request->keyword}%")
            ->paginate(5);
        return view('admin/ds-admin.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/ds-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        $password = $request->password;
        DB::table('admin')->insert([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($password),
            'telp' => $request->telp,
            'status' => $request->level
        ]);
        return redirect('ds-admin')->with('message', 'Berhasil ditambahkan');
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
        $data = DB::table('admin')->where('id_admin', $id)->first();
        return view('admin/ds-admin.edit', ['data' => $data]);
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
        $this->_validation($request);
        $password = $request->password;
        DB::table('admin')->where('id_admin', $id)->update([
            'nama_admin' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($password),
            'telp' => $request->telp,
            'status' => $request->level
        ]);
        return redirect('admin')->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('admin')->where('id_admin', $id)->delete();
        return redirect()->back()->with('message', 'Berhasil dihapus');
    }
}
