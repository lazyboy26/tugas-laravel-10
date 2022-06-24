@extends('layouts.app')

@section('title', 'Friends')

@section('content')

    <a href="/friends/create" class="btn btn-primary mb-2 ml-3">Tambah Teman</a>
    <div class="mx-auto flex flex-wrap container">
        @foreach ($friends as $friend)
            <div class="card mt-2 mb-2 me-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title ">
                        <a href="/friends/{{ $friend['id'] }}" class="truncate ... no-underline">
                            {{ $friend['nama'] }}
                        </a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_tlpn'] }}</h6>
                    <p class="card-text">{{ $friend['alamat'] }}</p>
                    <hr>
                    <div class="flex items-center justify-center">
                        <a href="/friends/{{ $friend['id'] }}/edit" class="card-link btn btn-warning">Edit Teman</a>

                        <form action="/friends/{{ $friend['id'] }}" method="POST" class="card-link btn btn-danger">
                            @csrf
                            @method('delete')
                            <button>Delete Teman</button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="justify-center">{{ $friends->links() }}</div>
@endsection
