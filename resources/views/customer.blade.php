@extends('welcome')
@section('content')
	<div class="container">
		<section class="header section-padding">
			<div class="background">&nbsp;</div>
		</section>
	
		<section class="section-padding">
			<div class="jumbotron">
				<div>
					{!! FORM::open(array('method' =>'GET')) !!}
						{!! Form::label('status', 'Last Order Status'); !!}
						{!! Form::select('status', array('K' => 'Completed/Finished', 'S' => 'Shipped', 'X' => 'Cancelled'), $request->get("status")) !!}
						{!! Form::label('last_order_date', 'Last Order Date') !!}
						{!! Form::text('last_order_date', $request->get("last_order_date") , array('id' => 'datepicker')) !!}
						{!! FORM::submit('Search', array('class' => 'btn')) !!}
					{!! FORM::close() !!}
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Customer List</h3></div>
						@if (count($customers) <= 0)
							<p> Currently, there is no Customer!</p>
						@else
							<table class="table table-hover">
								<thead>
									<tr>
										<td>{!! Form::checkbox('all', null, null, ['id' => 'select_all']) !!}</th>
										<th>Name</th>
										<th>City</th>
										<th>Phone</th>
									</tr>
								</thead>
								<tbody>
									@foreach($customers as $customer)
										<tr>
										 <td>{!! Form::checkbox('customer_id', $customer->virtuemart_user_id, null, ['onclick' => 'addCustomerId(this);']) !!}</td>
										 <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
										 <td>{{ $customer->city }}</td>
										 <td>{{ $customer->phone_1}}</td>
										 </tr>
									@endforeach
								</tbody>
							</table>
						@endif
						<?php
							if (count($customers) > 0) {
								echo str_replace('/?', '?', $customers->appends(Request::input())->render());
							}
						?>
				</div>
				
				<div>
					<button type="button" class="btn btn-link" id="queue_notification" onclick="queueNotifications()">Send Notifications</button>
					<script>
						var customerIds = [];
						function addCustomerId(e) {
							if (e.checked === true) {
								customerIds.push(e.value);
							} else {
								var index = customerIds.indexOf(e.value);
								if (index > -1) {
									customerIds.splice(index, 1);
								}
							}
						}
						function queueNotifications(){
							customerIds = encodeURI(customerIds);
							window.location="notifications/queue?customer_ids=" + customerIds;
						}
					</script>
				</div>

			</div>
		</section>
	</div>
@endsection