@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>Repayments</h2>
                </div>
                <div class="card">
                    <div class="card-header">Loan Amount : {{ $currency }} {{ number_format($loan->amount_reqd,2, '.', ',') }}</div>
                    <div class="card-header">Weekly Repayment : {{ $currency }} {{ number_format($loan->amount_reqd/$loan->terms,2,'.', ',') }}</div>

                    <div class="card-body">
                        <table class="table">
                          <thead>
                            <tr class="table-primary">
                              <th scope="col">#</th>
                              <th scope="col">Payment Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($repayments as $index => $repayment)
                            <tr>
                              <th scope="row">{{$index+1}}</th>
                              <td> {{ date('D F j, Y, g:i a', strtotime($repayment->payment_date)) }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>

                        <form action="loan/submit" method="POST">
                            <input type="hidden" name="loan_id" value="{{$loan->loan_id}}">
                            <button type="submit" class="btn btn-primary btn-sm">Send repayment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection