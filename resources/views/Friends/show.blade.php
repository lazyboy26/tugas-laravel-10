@extends('layouts.app')

@section('title', 'Friends')

@section('content')
    <table class="table table-bordered table-hover table-responsive table-striped">
        <tr>
            <th>Nama</th>
            <th>No Telephone</th>
            <th>Alamat</th>
        </tr>
        <tr>
            <td>{{ $friend->nama }}</td>
            <td>{{ $friend->no_tlpn }}</td>
            <td>{{ $friend->alamat }}</td>
        </tr>
    </table>
@endsection
