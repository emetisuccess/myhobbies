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
									<span class="badge me-2 text-decoration-none bg-{{ $tag->style }}"
										style="float: left; font-size:100%;">{{ $tag->name }}</span>
									<a class="btn btn-outline-primary btn-sm p-1 text-decoration-none mx-1 my-1 "
										href="tag/{{ $tag->id }}/edit"><i class="fas fa-edit"></i>
										Edit</a>
									<form action="/tag/{{ $tag->id }}"
										method="post"
										style="float: left">

										@csrf
										@method('Delete')
										<input class="btn btn-sm btn-outline-danger p-1"
											type="submit"
											value="Delete">
									</form>
									<a class="text-decoration-none"
										href="/hobby/tag/{{ $tag->id }}"
										style="float: right">Used
										{{ $tag->hobbies->count() }} times</a>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="mt-2">
					<a class="btn btn-success btn-sm"
						href="/tag/create"><i class="fas fa-plus-circle"></i> Create new
						Tag</a>
				</div>
			</div>
		</div>
	</div>
@endsection
