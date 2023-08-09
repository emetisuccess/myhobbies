@extends('layouts.app') @section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">{{ __('Edit hobby') }}</div>
					<div class="card-body px-3">
						<form action="/hobby/{{ $hobby->id }}"
							method="POST">
							@csrf @method('PUT')
							<div class="form-group mb-3">
								<label for="name">Name</label>
								<input type="text"
									class="form-control @error('name') border-danger @enderror"
									name="name"
									id="name"
									value="{{ $hobby->name ?? old('name') }}" />
								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description"
								 id="description"
								 value="{{ $hobby->description ?? old('description') }}"
								 class="form-control 
                                 {{ $errors->has('description') ? 'border-danger' : '' }}"
								 cols="30"
								 rows="5"></textarea>
								@error('description')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<input type="submit"
								class="btn btn-primary btn-sm mt-4"
								value="Update Hobby" />
						</form>
					</div>
				</div>
				<div class="mt-2"
					style="float: right">
					<a href="/hobby"
						class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i>
						Back to Overview
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection
