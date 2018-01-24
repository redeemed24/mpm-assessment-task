@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<h1>My Plan Manager</h1>
		
		<br><br>
		
		@if(count($companies))

			<div class="panel panel-default hidden download">
				<div class="panel-body text-center">
					CSV File ready to download
					<a class="btn btn-danger pull-right download-btn" href="">Download CSV</a>
				</div>
			</div>

			<a class="btn btn-success pull-right export">Export to CSV</a> <br><br>

			<table class="table table-bordered table-striped">
				<br>

				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Number of Employees</th>
					<th>Created</th>
				</thead>
				<tbody>
					@foreach($companies as $c)
						<tr>
							<td>{{$c->id}}</td>
							<td>{{$c->name}}</td>
							<td>{{$c->employees->count()}}</td>
							<td>{{date("M d, Y", strtotime($c->created_at))}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<h3>No results found.</h3>
		@endif
	</div>

@endsection

@push('scripts')
	<script src="{{asset('js/companies.js')}}"></script>
@endpush