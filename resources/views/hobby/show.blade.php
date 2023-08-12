@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Hobby Detail <span class="text-success">
							@if (session('success'))
								{{ session('success') }}
							@endif
						</span>
					</div>
					<div class="card-body">
						<b>{{ $hobby->name }}</b>
						<p>
							{{ $hobby->description }}
						</p>
						@if ($hobby->tags->count() > 0)
							<b>Used Tags:</b>(Click to Remove!)
							<p>
								@foreach ($hobby->tags as $tag)
									<a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/detach"><span
											class="badge mx-1 {{ $tag->style == 'light' ? 'text-dark' : '' }} bg-{{ $tag->style }}">{{ $tag->name }}
										</span></a>
								@endforeach
							</p>
						@endif
						@if ($availableTags->count() > 0)
							<b>Available Tags:</b>(Click to Add!)
							<p>
								@foreach ($availableTags as $tag)
									<a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/attach"><span
											class="badge mx-1 {{ $tag->style == 'light' ? 'text-dark' : '' }} bg-{{ $tag->style }}">{{ $tag->name }}</span></a>
								@endforeach
							</p>
						@endif
					</div>
				</div>
				{{-- <div class="mt-2">
					<a href="{{ URL::previous() }}"
						class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Back to
						Overview</a>
				</div> --}}
			</div>
		</div>
	</div>
@endsection
