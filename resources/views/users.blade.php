@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection
@section('content')
@section('styles')
	@parent
	<link href="{{asset('/media/css/userstyles.css')}}" type="text/css" rel="stylesheet">
@endsection
<div class="main" id="main">
	<div class="listofusers" id="list-chat">
		<ul class="nav nav-tabs">
			@if ($flag == 'friends')
				<li class="active-link"><a data-toggle="tab" href="{{asset('friends')}}">Список друзей</a></li>
				<li class="link"><a data-toggle="tab" href="{{asset('users')}}">Все пользователи</a></li>
			@else
				<li class="link"><a data-toggle="tab" href="{{asset('friends')}}">Список друзей</a></li>
				<li class="active-link"><a data-toggle="tab" href="{{asset('users')}}">Все пользователи</a></li>
			@endif
			
		</ul>
		<div class="list">
		    @if ($flag == 'users')
		        @foreach($users as $one)
				<div class="user">
					<div id="user-avatar">
						@if (isset($one->profiles->useravatar))
							<img src="{{asset('/media/photos/'.$one->profiles->useravatar)}}" >
						@else
							<img src="{{asset('/media/photos/1.jpg')}}" >
						@endif
					</div>
			        <p><a href="{{asset('user/'.$one->id)}}">{{$one->name}}</a></p>
				</div>
		        @endforeach
	        @endif
		    @if ($flag == 'friends')

		        @foreach($friends as $one)
				<div class="user">
					<div id="user-avatar">
						@if (isset($one->whoisfriend->profiles->useravatar))
							<img src="{{asset('/media/photos/'.$one->whoisfriend->profiles->useravatar)}}" >
						@else
							<img src="{{asset('/media/photos/1.jpg')}}" >
						@endif
					</div>
			        <p><a href="{{asset('user/'.$one->friend_user_id)}}">{{$one->whoisfriend->name}}</a></p>
		        </div>
				@endforeach
		    @endif
		</div>
	</div>
</div>
@endsection
