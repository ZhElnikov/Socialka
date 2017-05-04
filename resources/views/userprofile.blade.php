@extends ('layouts.base')
@section('title')
	{{$title}}
@endsection
@section('styles')
	@parent
	<link href="{{asset('/media/css/profilestyle.css')}}" type="text/css" rel="stylesheet">
@endsection
@section('content')
<div class="main" id="main-profile">
	<div>
	<div id="profile">
	<div id="user-avatar">
		<img src="" class="img-rounded">
	</div>

	<div id="userprofile">
		<div id="name">
			<div id="user-name">
				@if (isset($user->profiles))
					<b><span class="input-xlarge uneditable-input">{{$user->profiles->username}}</span></b>
				@endif
			</div>
			<div id="user-surname">
				@if (isset($user->profiles))
					<b><span class="input-xlarge uneditable-input">{{$user->profiles->usersurname}}</span></b>
				@endif
			</div>
		</div>

		<div id="user-alltext">
			<div id="user-sex">
				Пол:
				@if (isset($user->profiles))
					<i><span class="">{{$user->profiles->usersex}}</span></i>
				@endif
			</div>
			<div id="user-contacts">
				Контакт для связи:
				@if (isset($user->profiles))
					<span class="input-xlarge uneditable-input">{{$user->profiles->usercontact}}</span>
				@endif
			</div>
		</div>
	</div>
</div>
	<span class="about"> О себе:</span>
	<div id="user-info">
		@if (isset($user->profiles))
			<span class="input-xlarge uneditable-input">{{$user->profiles->userabout}}</span>
		@endif
	</div>
</div>
	<div class="buttons"><a href="{{ asset('addprivateroom/'.$user->id) }}" class="btn btn-default">Создать приватную комнату</a>
	<a href="{{ asset('addprivateroom/'.$user->id) }}" class="btn btn-default">Добавить в друзья</a></div>
</div>
@endsection
