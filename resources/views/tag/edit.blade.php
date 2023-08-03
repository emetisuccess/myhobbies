@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">{{ __('Edit Tag') }}</div>
					<div class="card-body px-3">
						<form action="/tag/{{ $tag->id }}"
							method="POST">
							@csrf
							@method('PUT')
							<div class="form-group mb-3">
								<label for="name">Name</label>
								<input type="text"
									class="form-control @error('name')
                                    border-danger
                                @enderror"
									name="name"
									id="name"
									value="{{ $tag->name ?? old('name') }}">
								@error('name')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group mb-3">
								<label for="style">Style</label>
								<input type="text"
									class="form-control @error('style')
                                    border-danger
                                @enderror"
									name="style"
									id="style"
									value="{{ $tag->style ?? old('style') }}">
								@error('style')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>

							<input type="submit"
								class="btn btn-primary btn-sm mt-4"
								value="Update Tag">
						</form>
						<a href="/tag"
							class="btn btn-primary btn-sm"
							style="float: right"><i class="fas fa-arrow-circle-up"></i> Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
