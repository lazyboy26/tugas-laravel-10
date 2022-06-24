<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\groups;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index()
    {
        $friends = Friends::orderBy('id', 'desc')->paginate(8);
        return view('friends.index', compact('friends'));
    }

    public function create()
    {
        $groups = groups::all();
        $groups->toArray();
        return view('friends.create', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlpn' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $friends = new Friends();

        $friends->nama = $request->nama;
        $friends->groups_id = $request->grup;
        $friends->no_tlpn = $request->no_tlpn;
        $friends->alamat = $request->alamat;

        $friends->save();

        return redirect('/');
    }

    public function show($id)
    {
        $friend = Friends::where('id', $id,)->first();

        return view('friends.show', ['friend' => $friend]);
    }
    public function edit($id)
    {
        $friend = Friends::where('id', $id,)->first();

        return view('friends.edit', ['friend' => $friend]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlpn' => 'required|numeric',
            'alamat' => 'required',
        ]);

        Friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlpn' => $request->no_tlpn,
            'alamat' => $request->alamat,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Friends::find($id)->delete();
        return redirect('/');
    }
}
