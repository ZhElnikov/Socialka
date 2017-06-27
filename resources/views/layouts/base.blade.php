<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	@section('styles')
		<link rel="stylesheet" href="{{asset('media/bootstrap/css/bootstrap.min.css')}}">
		<link href="{{asset('/media/css/mainstyle.css')}}" type="text/css" rel="stylesheet">
	@show
	<meta name="keywords" content="социальная,сеть, соц, вк, фейсбук, social, network">
	<meta name="description" content="Новая социальная сеть">
	   
</head>
<body>
  <div class="body" id="site-window">
	<div class="main" id="top">
	<div class="left-menu" id="left-menu">
			<a class="navbar-brand" href="{{url('/')}}" style="height: 52px; margin: -9px 0 0 0;">
	  <img src="/public/media/img/logo.png" alt="Speakers">
        </a>
			<a href="{{url('profile')}}" class="choise" "id="profile-menu">
				<p>Профиль</p>
			</a>
			<a href="{{url('rooms')}}" class="choise" "id="room-menu">
				<p>Комнаты</p>
			</a>
			<a href="{{url('friends')}}" class="choise" "id="search-menu">
				<p>Пользователи</p>
			</a>
		</div>
		<div class="right-menu" id="right-menu">
			<a href="{{ route('login') }}" class="choise" "id="exit-menu">
				<p>Выйти</p>
			</a>
		</div>
	</div>
	<div class="center" id="center">
		
		
			@yield('content')
		
	</div>
	<div class="main" id="foot">
		<p>©Created by Elnikov E., Lutak V., Kulikovskaya A., Korzun A.</p>
	</div>
  </div>
  @section('scripts')
  <script type="text/javascript">
		var block=document.getElementById("chat");
		block.scrollTop = block.scrollHeight;
   </script>
   <script type="text/javascript">
		function Press(your_text, your_event){
			if (your_text != "" && your_event.keyCode == 13)
				document.getElementById("enter").submit.click();
		}
   </script>
   @show
</body>
</html>