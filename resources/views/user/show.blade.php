@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header"
						style="font-size: 150%">{{ $user->name }}</div>
					<div class="card-body">
						<img src="{{ asset('img/istockphoto-152967792-612x612.jpg') }}"
							width="100"
							style="float: right"
							alt="">
						<b>My Motto: <br>{{ $user->motto }}</b>
						<p class="my-3">
							<b>About Me:</b> <br> {{ $user->about_me }}
						</p>
						@isset($user->hobbies)
							@if ($user->hobbies->count() > 0)
								<h5>Hobbies of {{ $user->name }}</h5>
								<ul class="list-group">
									@foreach ($user->hobbies as $hobby)
										<li class="list-group-item">
											<a class="text-decoration-none"
												href="/hobby/{{ $hobby->id }}">
												<img src="{{ asset('img/download.jpeg') }}"
													width="50"
													alt="">
												{{ $hobby->name }}
											</a>
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
							@else
								<p>
									{{ $user->name }} has not created any hobbies yet!
								</p>
							@endif
						@endisset
					</div>
				</div>
				<div class="mt-2">
					<a href="{{ URL::previous() }}"
						class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Back to
						Overview</a>
				</div>
			</div>
		</div>
	</div>
@endsection
