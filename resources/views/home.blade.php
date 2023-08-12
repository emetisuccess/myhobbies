@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card">
					<div class="card-header">{{ __('Dashboard') }}</div>

					<div class="card-body">
						<h2>Hello {{ Auth()->user()->name }}</h2>
						@if (session('status'))
							<div class="alert alert-success"
								role="alert">
								{{ session('status') }}
							</div>
						@endif
						@isset($hobbies)
							@if ($hobbies->count() > 0)
								<h2>Your Hobbies:</h2>
								<ul class="list-group">
									@foreach ($hobbies as $hobby)
										<li class="list-group-item">
											<a class="text-decoration-none"
												href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}
											</a>
											@auth
												<a class="btn btn-outline-primary btn-sm mx-1 my-1 border-0"
													href="/hobby/{{ $hobby->id }}/edit">
													<i class="fas fa-edit"></i>
													Edit
												</a>
											@endauth

											@auth
												<form action="{{ route('hobby.destroy', $hobby->id) }}"
													method="POST"
													style="float: right">
													@csrf @method('DELETE')
													<input class="btn btn-danger btn-sm mx-1 my-1"
														type="submit"
														value="Delete" />
												</form>
											@endauth
											<span style="float: right">
												{{ $hobby->created_at->diffForHumans() }}</span>
											<br />
											@foreach ($hobby->tags as $tag)
												<a href="/hobby/tag/{{ $tag->id }}"><span
														class="badge mx-1 
												{{ $tag->style == 'light' ? 'text-dark' : '' }}
												 bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
											@endforeach
										</li>
									@endforeach
								</ul>
							@endif
						@endisset
						<a href="/hobby/create"
							class="btn btn-success btn-sm text-decoration-none">
							<i class="fas fa-plus-circle"></i> Create New Hobby</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
