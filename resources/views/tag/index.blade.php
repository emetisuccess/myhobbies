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
						<ul class="my-2 list-unstyled list-group">
							@foreach ($tags as $tag)
								<li class="list-group-item ">
									<a href="#"
										style="font-size: 1rem"
										class="badge text-decoration-none bg-{{ $tag->style }}">{{ $tag->name }}</a>
									<a href="tag/{{ $tag->id }}/edit"
										class="btn btn-outline-primary btn-sm p-1 text-decoration-none mx-1 my-1 "><i class="fas fa-edit"></i>
										Edit</a>
									<form action="/tag/{{ $tag->id }}"
										method="post"
										style="float: right">
										@csrf
										@method('Delete')
										<button type="submit"
											class="btn btn-sm btn-danger p-1"><i class="fas fa-trash"></i>
											Delete</button>
									</form>
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
