<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Loans
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Loan</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Amount Required</th>
                        <th class="px-4 py-2">Terms</th>
                            <th class="px-4 py-2">Action</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    <tr>
                        <td class="border px-4 py-2">{{ $loan->loan_id }}</td>
                        <td class="border px-4 py-2">{{ $loan->currency }} {{ number_format($loan->amount_reqd, 2, '.', ',') }}</td>
                        <td class="border px-4 py-2">{{ $loan->terms }}</td>
                        @if(auth()->user()->is_approver == true)
                            <td class="border px-4 py-2">   
                                <button wire:click="edit({{ $loan->loan_id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            </td>
                        @else 
                            <td class="border px-4 py-2">   
                                <button wire:click="sendRepayment({{ $loan->loan_id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send Repayment</button>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td class="border px-4 py-2" colspan=4">
                            @foreach($loan->repayments as $repayment)
                            <p>{{ $loan->currency }} {{ number_format($repayment->amount, 2, '.', ',') }} on {{ date('D F j, Y, g:i a', strtotime($repayment->payment_date)) }}</p>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>