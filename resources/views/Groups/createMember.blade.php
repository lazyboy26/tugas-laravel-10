@extends('layouts.app')

@section('title', 'Tambah Member')

@section('content')

    <form action="/groups/createMember/{{ $group->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <select class="form-select appearance-none block w-max px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
            aria-label="Default select example" name="member">
            <option selected>Pilih Anggota Yang Akan Di Tambahkan</option>
                @foreach ($friend as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>

            @error('nama_grup')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-info">Submit</button>
    </form>

@endsection
