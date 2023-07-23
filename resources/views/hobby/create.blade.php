@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new Header') }}</div>
                    <div class="card-body">
                        <form action="/hobby" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Save Hobby">
                        </form>
                        <a href="/hobby" class="btn btn-primary float-right" style="float: right"><i
                                class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
