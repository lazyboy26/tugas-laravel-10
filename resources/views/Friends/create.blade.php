@extends('layouts.app')

@section('title', 'Friends')

@section('content')

    <form action="/friends" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">

            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_tlpn" class="form-label">Grup</label>
            <div class="flex justify-center">
                <select
                    class="form-select appearance-none block w-max px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label="Default select example" name="grup">
                    <option selected>Pilih Grup</option>
                    @foreach ($groups as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_grup }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="no_tlpn" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_tlpn" name="no_tlpn">

            @error('no_tlpn')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat">

            @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-info">Submit</button>
    </form>

@endsection
