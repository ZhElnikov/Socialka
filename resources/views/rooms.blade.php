@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection

@section('styles')
	@parent
	<link href="{{asset('/media/css/allroomstyles.css')}}" type="text/css" rel="stylesheet">
@endsection

@section('content')
<div class="main" id="main">
	<div class='spisok'>
		<p>Список комнат</p>
	</div>
<div class='scroll'>
	@if(count($errors))
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<div class="errors"> {{$error}} </div>
			@endforeach
		</div>
	@endif
	<form action='addroom' method='post' id="form-addroom">
	{{csrf_field()}}
		<p>
			Создать комнату:<span></span>
			<input autofocus type="text" class="enter-room" name='name' id="addroom" onkeypress="Press(this.value, event)">
			<input class="enter-button" type="submit" value="Ввод" id="enter">
		</p>
	</form>
	@foreach($rooms->reverse() as $one)
		<a href="{{asset('room/'.$one->id)}}">{{$one->name}}</a>
	@endforeach
	
</div>
</div>
@endsection