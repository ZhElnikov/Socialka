@section('styles')
	@parent
	<link href="{{asset('/media/css/pagestyles.css')}}" type="text/css" rel="stylesheet">
@endsection
@section('scripts')
	@parent
@endsection

	<div class="head">
		<div class="currentroom">{{ $thoose->name }} </div>
		<ul class="nav nav-tabs">
			@foreach ($arr_rooms as $one)
				@if ($one->id == $thoose->id)<li class="active link"><a data-toggle="tab" class="thoose">{{ $one->name }}</a></li>
				@else <li class="link"><a class="exit" href="{{url('room/'.$thoose->id.'/exit/'.$one->id)}}">x</a><a data-toggle="tab" href="{{url('room/'.$one->id)}}">{{ $one->name }}</a></li>
				@endif
			@endforeach
		</ul>
	</div>
