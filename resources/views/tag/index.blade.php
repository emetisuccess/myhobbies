@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('All Tags') }}
						@if (session('success'))
							<span class="text-success"> {{ session('success') }}</span>
						@endif
					</div>
					<div class="card-body">
						<ul class="my-2 list-group">
							@foreach ($tags as $tag)
								<li class="list-group-item ">
									<span style="float: left; font-size:100%;"
										class="badge me-2 text-decoration-none bg-{{ $tag->style }}">{{ $tag->name }}</span>
									<a href="tag/{{ $tag->id }}/edit"
										class="btn btn-outline-primary btn-sm p-1 text-decoration-none mx-1 my-1 "><i class="fas fa-edit"></i>
										Edit</a>
									<form action="/tag/{{ $tag->id }}"
										method="post"
										style="float: left">

										@csrf
										@method('Delete')
										<input type="submit"
											class="btn btn-sm btn-outline-danger p-1"
											value="Delete">
									</form>
									<a href="/hobby/tag/{{ $tag->id }}"
										style="float: right"
										class="text-decoration-none">Used {{ $tag->hobbies->count() }} times</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="mt-2">
					<a href="/tag/create"
						class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Create new
						Tag</a>
				</div>
			</div>
		</div>
	</div>
@endsection
