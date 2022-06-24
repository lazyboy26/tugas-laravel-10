@extends('layouts.app')

@section('title', 'Friends')

@section('content')

    <form action="/friends/{{ $friend['id'] }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $friend->nama }}">
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_tlpn" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="{{ $friend->no_tlpn }}">
            @error('no_tlpn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $friend->alamat }}">
            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-info">Submit</button>
    </form>

@endsection
