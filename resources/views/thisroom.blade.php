@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection

@section('styles')
	@parent
@endsection
@section('scripts')
	@parent
@endsection

@section('room')
	{{$room->name}}
@endsection

@section('content')

<div class="main" id="main">
@include ('templates.rooms')
	<div class="work-window" id="work-window">
		<div class="window" id="chat">
			@foreach($messages->reverse() as $one)
				<p><a>{{$one->users->name}}: </a>{{$one->body}}</p>
			@endforeach
		</div>
		<div class="list" "id="list-chat">
			<p>Пользователи:</p>
			@foreach($users as $one)
				<p><a href="{{asset('user/'.$one->id)}}">{{$one->name}}</a></p>
			@endforeach
		</div>
	</div>
	<form method='POST' action="{{asset('message/'.$id)}}"> 
	{{csrf_field()}}
	<div class="enter" "id="enter-chat">
		<input autofocus type="text" class="enter-text" name='body' id="area" onkeypress="Press(this.value, event)">
		<input class="enter-button" type="submit" value="Ввод" id="enter">
	</div>
	</form> 
	</div>
@endsection