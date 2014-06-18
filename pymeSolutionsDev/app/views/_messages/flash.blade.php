@if (isset($flash_msg))
	<br>
	<div class="alert alert-{{$flash_msg['type']}} alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{$flash_msg['title']}}</strong>{{$flash_msg['msg']}}
	</div>
@endif