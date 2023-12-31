@extends('layouts.app') @section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-11">
				<div class="card">
					@isset($filter)
						<div class="card-header">
							Filtered Hobbies by
							<span style="font-size: 130%"
								class="badge text-{{ $filter->style == 'light' ? 'dark' : '' }}  										bg-{{ $filter->style }}">{{ $filter->name }}</span>
							@if (session('success'))
								<span class="text-success">{{ session('success') }}</span>
							@endif
						</div>
					@else
						<div class="card-header">
							All the Hobbies' @if (session('success'))
								<span class="text-success">{{ session('success') }}</span>
							@endif
						</div>
					@endisset
					<div class="card-body">
						<ul class="list-group">
							@foreach ($hobbies as $hobby)
								<li class="list-group-item">
									<a class="text-decoration-none"
										href="/hobby/{{ $hobby->id }}">
										<img src="{{ asset('img/download.jpeg') }}"
											width="50"
											alt="">
										{{ $hobby->name }}
									</a>
									@auth
										<a class="btn btn-outline-primary btn-sm mx-1 my-1 border-0"
											href="/hobby/{{ $hobby->id }}/edit"
											style=""><i class="fas fa-edit"></i>
											Edit
										</a>
									@endauth
									<span class="mx-2">Posted by:
										<a href="/user/{{ $hobby->user->id }}">
											{{ $hobby->user->name }}(
											{{ $hobby->user->hobbies->count() }}
											Hobbies)
											<img src="{{ asset('img/istockphoto-152967792-612x612.jpg') }}"
												width="50"
												alt="">
										</a>
									</span>
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
										<a href="/hobby/tag/{{ $tag->id }}"><span class="badge mx-1 
												{{ $tag->style == 'light' ? 'text-dark' : '' }}
												 bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
									@endforeach
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="mt-3">
					{{ $hobbies->links() }}
				</div>
				@auth
					<div class="mt-2">
						<a class="btn btn-success btn-sm"
							href="/hobby/create">
							<i class="fas fa-plus-circle"></i> Create new Hobby
						</a>
					</div>
				@endauth
			</div>
		</div>
	</div>
@endsection
