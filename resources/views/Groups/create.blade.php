@extends('layouts.app')

@section('title', 'Groups')

@section('content')

    <form action="/groups" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_grup" class="form-label">Nama Grup</label>
            <input type="text" class="form-control" id="nama_grup" name="nama_grup">

            @error('nama_grup')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-info">Submit</button>
    </form>

@endsection
