@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection
@section('styles')
	@parent
	<link href="{{asset('/media/css/editprofilestyle.css')}}" type="text/css" rel="stylesheet">
@endsection
@section('content')
<div class="main" id="main-profile">
<div id="profileform">
	<form method='POST' action="{{asset('profile')}}" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="form-group">
			<label>Аватар</label>
			<input type="file" id="exampleInputFile" name="useravatar1"> 
			<p class="help-block">Выберете файл JPEG или PNG.</p>
		</div>
		<div class="form-group">
			<label>Имя</label>
			<input type="text" class="form-control" name="username" value="{{$user->username}}">
		</div>
		<div class="form-group">
			<label>Фамилия</label>
			<input type="text" class="form-control" name="usersurname" value="{{$user->usersurname}}">
		</div>
		<div class="form-group">
			<select class="form-control" name="usersex" value="{{$user->usersex}}"><option>скрыт</option><option>мужской</option><option>женский</option></select><p>выбрано: {{$user->usersex}}</p>
		</div>
		<div class="form-group">
			<label>Контакт для связи</label>
			<input type="text" class="form-control" name="usercontact" value="{{$user->usercontact}}">
		</div>
		<div class="form-group">
			<label >О себе</label>
			<textarea type="text" class="form-control" name="userabout" value="{{$user->userabout}}">{{$user->userabout}}</textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="profilebutton">Сохранить изменения</button>
	</form>
</div>
</div>
@endsection
