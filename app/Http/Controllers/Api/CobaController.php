<?php

namespace App\Http\Controllers\Api;

use App\Models\Friends;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(8);
        return response()->json(
            [
                // 'status' => 'success',
                // 'data' => $friends
                'success' => true,
                'message' => 'Daftar data teman',
                'data' => $friends
            ],
            200
        );
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
            'nama' => 'required|unique:friends|max:255',
            'no_tlpn' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $friends = Friends::create([
            'nama' => $request->nama,
            'no_tlpn' => $request->no_tlpn,
            'alamat' => $request->alamat,
            'groups_id' => $request->groups_id,
        ]);

        if ($friends) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data teman berhasil ditambahkan',
                    'data' => $friends
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false, // false
                    'message' => 'Data teman gagal ditambahkan', // error message
                    'data' => $friends // null
                ],
                400
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = Friends::where('id', $id)->first();

        return response()->json(
            [
                'success' => True, // True
                'message' => 'Detail Teman', // error message
                'data' => $friend // null
            ],
            400
        );
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
        $friend = Friends::find($id)->update(
            [
                'nama' => $request->nama,
                'no_tlpn' => $request->no_tlpn,
                'alamat' => $request->alamat,
            ],
        );

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dirubah!',
                'data' => $friend
            ],
            400
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friends::find($id)->delete();

        return response()->json(
            [
                'success' => True,
                'message' => 'Data Teman Berhasil Dihapus!',
                'data' => $friend
            ],
            400
        );
    }
}
