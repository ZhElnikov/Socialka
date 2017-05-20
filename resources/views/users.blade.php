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
		<p>Пользователи:</p>
		@foreach($users as $one)
			<p><a href="{{asset('user/'.$one->id)}}">{{$one->name}}</a></p>
		@endforeach
		<p>Друзья:</p>
		@foreach($friends as $one)
			<p><a href="{{asset('user/'.$one->friend_user_id)}}">{{$one->whoisfriend->name}}</a></p>
		@endforeach
	</div>
</div>
@endsection
