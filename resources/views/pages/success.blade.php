@extends('layout')

@section('content')
	<div class="col-sm-9 padding-right">
		<?php
			$msg = Session::get('message');
			$total = Session::get('total');
			if($msg){
				echo "<h1>Total  = $total Taka</h1>";
				echo "<h1>$msg</h1>";
				Session::put('message',null);
				Session::put('total',null);
			}
		?>
		<h1>Success</h1>
	</div>
@endsection