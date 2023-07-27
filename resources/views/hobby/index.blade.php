@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('All the Hobbies') }}
                        @if (session('success'))
                            <span class="text-success">{{ session('success') }}</span>
                        @endif
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($hobbies as $hobby)
                                <li class="list-group-item">
                                    <a href="/hobby/{{ $hobby->id }}" class="text-decoration-none">{{ $hobby->name }}
                                    </a>
                                    <form action="{{ route('hobby.destroy', $hobby->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/hobby/{{ $hobby->id }}/edit" class="btn btn-primary btn-sm mx-1 my-1"
                                            style="float: right"><i class="fas fa-edit"></i>
                                            Edit</a>

                                        <input type="submit" class="btn btn-danger btn-sm mx-1 my-1" value="Delete"
                                            style="float: right">

                                    </form>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="/hobby/create" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Create new
                        Hobby</a>
                </div>
            </div>
        </div>
    </div>
@endsection
