<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama_admin' => 'required|max:35',
                'username' => 'required|max:35',
                'password' => 'required',
                'telp' => 'required',
                'role' => 'required',
            ],
            [
                'nama_admin.required' => 'Harus diisi',
                'nama_admin.max' => 'Jangan melebihi 35 huruf',
                'username.required' => 'Harus diisi',
                'username.max' => 'Jangan melebihi 25 huruf',
                'password.required' => 'Harus diisi',
                'telp.required' => 'Harus diisi',
                'role.required' => 'Harus diisi',
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
        $keyword = $request->input('keyword');

        $data = DB::table('users')
            ->where(function ($query) use ($keyword) {
                $query->where('nama_admin', 'like', "%{$keyword}%")
                    ->orWhere('username', 'like', "%{$keyword}%")
                    ->orWhere('password', 'like', "%{$keyword}%")
                    ->orWhere('telp', 'like', "%{$keyword}%")
                    ->orWhere('role', 'like', "%{$keyword}%");
            })
            ->paginate(5);

        return view('admin/ds-admin.index', compact('data'));
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
        DB::table('users')->insert([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => bcrypt($password),
            'telp' => $request->telp,
            'role' => $request->role,
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
        $data = DB::table('users')->where('id_admin', $id)->first();
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
        DB::table('users')->where('id_admin', $id)->update([
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => bcrypt($password),
            'telp' => $request->telp,
            'role' => $request->role,
        ]);
        return redirect('ds-admin')->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id_admin', $id)->delete();
        return redirect()->back()->with('message', 'Berhasil dihapus');
    }
}
