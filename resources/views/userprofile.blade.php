@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection
@section('content')
<div class="main" id="main">
<div id="userprofile">
		<div id="user-avatar">
			<p>Аватар</p>
		</div>
		<div id="user-alltext">
			<div id="user-name">
				<p>Имя</p>
				@if (isset($user->profiles))
					<p>{{$user->profiles->username}}</p>
				@endif
			</div>
			<div id="user-surname">
				<p>Фамилия</p>
				@if (isset($user->profiles))
				<p>{{$user->profiles->usersurname}}</p>
			@endif
			</div>
			<div id="user-contacts">
				<p>Контакты для связи</p>
				@if (isset($user->profiles))
				<p>{{$user->profiles->usercontacts}}</p>
			@endif
			</div>
			<div id="user-info">
				<p >О себе</p>
				@if (isset($user->profiles))
				<p>{{$user->profiles->userabout}}</p>
			@endif
			</div>
		</div>
		<div id="form-privateroom">
			<form action="{{asset('addprivateroom/'.$user->id)}}" method="post" id="form-addprivateroom">
				{{csrf_field()}}
				<lable id="createroom">Создать приватную комнату: </lable>
				<input autofocus type="text" class="enter-room" name='name' id="addprivateroom" onkeypress="Press(this.value, event)">
				<input class="button" type="submit" value="Создать" id="enter">
			</form>
		</div>
</div>
</div>
@endsection