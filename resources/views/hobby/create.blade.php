@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Create new Header') }}</div>
                    <div class="card-body px-3">
                        <form action="/hobby" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                    border-danger
                                @enderror"
                                    name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" value="{{ old('description') }}"
                                    class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}" cols="30" rows="5"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Save Hobby">
                        </form>
                        <a href="/hobby" class="btn btn-primary" style="float: right"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
