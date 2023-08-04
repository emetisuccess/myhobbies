@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ $user->name }}</div>
					<div class="card-body">
						<b>My Motto: <br>{{ $user->motto }}</b>
						<p class="my-3">
							<b>About Me:</b> <br> {{ $user->about_me }}
						</p>
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
