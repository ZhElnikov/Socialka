@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection

@section('styles')
	@parent
	<link href="{{asset('/media/css/roomstyles.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('scripts')
	@parent
@endsection

@section('room')
	{{$room->name}}
@endsection

@section('content')

<div class="content" id="main">
@include ('templates.rooms')
	<div class="work-window" id="work-window">
		<div class="window" id="chat">
			@foreach($messages->reverse() as $one)
				<p>
					@if ($one->users == $user)<a class="auth" href="{{asset('user/'.$one->users->id)}}">{{$one->users->name}}:</a>
					@else<a href="{{asset('user/'.$one->users->id)}}">{{$one->users->name}}:</a>
					@endif
					{{$one->body}}
				</p>
			@endforeach
		</div>
		<div class="list" "id="list-chat">
			<p>Пользователи:</p>
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
		</div>
	</div>
	<form method='POST' action="{{asset('message/'.$id)}}">
	{{ csrf_field() }}
	<div class="enter" "id="enter-chat">
		<input autofocus type="text" class="enter-text" name='body' id="area" onkeypress="Press(this.value, event)">
		<input class="enter-button" type="submit" value="Ввод" id="enter">
	</div>
	</form>
	</div>

@endsection
