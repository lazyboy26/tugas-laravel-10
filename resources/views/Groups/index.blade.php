@extends('layouts.app')

@section('title', 'Groups')

@section('content')

    <a href="/groups/create" class="btn btn-primary mb-2 ml-3">Tambah Group</a>
    <div class="mx-auto flex flex-wrap container">
        @foreach ($groups as $group)
            <div class="card mt-2 mb-2 me-3 overflow-hidden" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title ">
                        <a href="/groups/{{ $group['id'] }}" class=" no-underline">
                            <p class="truncate ...">
                                {{ $group['nama_grup'] }}
                            </p>
                        </a>
                    </h5>
                    <span class="card-text">{{ $group['description'] }}</span>
                    <p class="card-text">Jumlah Anggota :
                        {{ $group->friends->count('pivot.groups_id') }}
                    </p>
                    <hr>
                    <div class="flex items-center justify-center">
                        <a href="/groups/{{ $group['id'] }}/edit" class=" btn btn-warning card-link ">Edit Group</a>
                        <form action="/groups/{{ $group['id'] }}" method="POST" class="card-link btn btn-danger">
                            @csrf
                            @method('delete')
                            <button class="">Delete Group</button>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="justify-center">{{ $groups->links() }}</div>
@endsection
