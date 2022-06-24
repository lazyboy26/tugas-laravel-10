@extends('layouts.app')

@section('title', 'Groups Detail')

@section('content')
    <a href="/groups/createMember/{{ $group['id'] }}" class="btn btn-primary mb-2">Tambah Anggota Group</a>
    <table class="table table-bordered table-hover table-responsive table-striped">
        <tr>

            <th>Nama Grup</th>
            <th>Description</th>
            <th>Anggota</th>
        </tr>
        <tr>
            {{-- @dd($groups) --}}
            <td>{{ $group->nama_grup }}</td>
            <td>{{ $group->description }}</td>
            <td>
                @foreach ($group->friends as $friend)
                        <h6 class="text-base font-medium leading-tight text-gray-800 flex">
                            {{ $friend->nama }}
                            <form action="/groups/createMemberDelete/{{ $friend->id }}" method="POST" class="">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="text-danger ml-2 font-bold">X</button>
                            </form>
                    </div>
                @endforeach
            </td>
        </tr>
    </table>
@endsection
