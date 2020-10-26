@extends('layouts.app', ['header' => 'Put here something'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>All Loans</h2>
                </div>
                <table class="table">
				  <thead>
				    <tr class="table-primary">
				      <th scope="col">#</th>
				      <th scope="col">Amount Required</th>
				      <th scope="col">Loan Term</th>
				      <th scope="col">Weekly Repayment</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
                	@foreach($loans as $index => $loan)
					<tr>
				      <th scope="row">{{$index+1}}</th>
				      <td>{{$loan->amount_reqd}}</td>
				      <td>{{$loan->terms}}</td>
				      <td>{{ $currency }} {{ number_format($loan->amount_reqd/$loan->terms,2,'.', ',') }}</td>
				      <td>
				      	<a class="btn btn-primary btn-sm" href="loan/{{$loan->loan_id}}" role="button">Repayments</a>
				      </td>
				    </tr>
                	@endforeach
				  </tbody>
				</table>
                
            </div>
        </div>
    </div>
@endsection