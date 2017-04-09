@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection
@section('content')
<div class="main" id="main">
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
		<lable id="createroom">Создать комнату: </lable>
		<input autofocus type="text" class="enter-room" name='name' id="addroom" onkeypress="Press(this.value, event)">
		<input class="enter-button" type="submit" value="Ввод" id="enter">
	</form>
	@foreach($rooms->reverse() as $one)
		
			<a href="{{asset('room/'.$one->id)}}">{{$one->name}}</a>
		
	@endforeach
</div>
</div>
@endsection