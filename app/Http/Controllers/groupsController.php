<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\groups;
use Illuminate\Http\Request;

class groupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = groups::orderBy('id', 'desc')->paginate(8);


        // $countGroup = Friends::select(groups::raw('groups_id, count(id) as total'))->groupby('groups_id')->orderby('nama', 'asc')->get();

        return view('groups.index', compact('groups'), );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'nama_grup' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        $groups = new groups();

        $groups->nama_grup = $request->nama_grup;
        $groups->description = $request->description;

        $groups->save();

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = groups::where('id', $id,)->first();

        return view('groups.show', ['group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = groups::where('id', $id,)->first();

        return view('groups.edit', ['group' => $group]);
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
        $request->validate([
            'nama_grup' => 'required|unique:groups|max:255',
            'description' => 'required',
        ]);

        groups::find($id)->update([
            'nama_grup' => $request->nama_grup,
            'description' => $request->description,
        ]);

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        groups::find($id)->delete();
        return redirect('/groups');
    }

    public function createMember($id)
    {
        $group = groups::where('id', $id,)->first();
        $friend = Friends::where('groups_id', '=', 0)->get();
        return view('groups.createMember', ['group' => $group], ['friend' => $friend]);
    }

    public function createMemberUpdate(Request $request, $id)
    {
        $friend = Friends::where('id', $request->member,)->first();

        Friends::find($friend->id)->update([
            'groups_id' => $id
        ]);

        return redirect('/groups/createMember/' . $id);
    }
    public function createMemberDelete(Request $request, $id)
    {
        Friends::find($id)->update([
            'groups_id' => 0
        ]);

        $url = url()->previous();

        return redirect($url);
    }
}
