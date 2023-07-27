@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <ul class="my-2 list-unstyled list-group">
                            @foreach ($tags as $tag)
                                <li class="list-group-item ">
                                    <a href="#"
                                        class="badge text-decoration-none bg-{{ $tag->style }}">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
