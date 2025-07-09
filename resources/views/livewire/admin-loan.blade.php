<div>
  <div class="p-6 bg-gray-900 text-white space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-blue-400 border-b border-gray-700 pb-2">Loan Requests</h2>

            <div>
                <label class="text-sm text-gray-300 mr-2">Filter by Status:</label>
                <select wire:model.live="statusFilter" class="bg-gray-800 border border-gray-600 text-white px-3 py-1 rounded">
                    <option value="All">All</option>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Paid">Paid</option>
                </select>

                <p class="text-xs text-gray-400">Debug: Status Filter = {{ $statusFilter }}</p>

            </div>
        </div>


            @forelse ($loans as $loan)
                @php
                    $statusColor = match ($loan->status) {
                        'Pending' => 'bg-yellow-900 border-yellow-600',
                        'Approved' => 'bg-green-900 border-green-600',
                        'Paid' => 'bg-gray-800 border-gray-600',
                        default => 'bg-gray-800 border-gray-700',
                    };
                @endphp

                <div class="border rounded-lg p-4 shadow {{ $statusColor }}">
                    <div class="flex justify-between">
                        <div>
                            <p><strong>Borrower:</strong> {{ $loan->borrower->name }} ({{ $loan->borrower->email }})</p>
                            <p><strong>Borrower:</strong> ({{ $loan->borrower->email }})</p>
                            <p><strong>Amount:</strong> ₱{{ number_format($loan->amount, 2) }}</p>
                            <p><strong>Term:</strong> {{ $loan->term_months }} months</p>
                            <p><strong>Interest Rate:</strong> {{ $loan->interest_rate ?? 'N/A' }}%</p>
                            <p><strong>Status:</strong>
                                <span class="font-semibold {{ $loan->status === 'Pending' ? 'text-yellow-300' : ($loan->status === 'Approved' ? 'text-green-300' : 'text-gray-300') }}">
                                    {{ $loan->status }}
                                </span>
                            </p>
                        </div>

                        <div class="space-x-2 self-start">
                            @if ($loan->status === 'Pending')
                                <button wire:click="approveLoan({{ $loan->id }})" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white">
                                    Approve
                                </button>
                            @elseif ($loan->status === 'Approved')
                                <button wire:click="markAsPaid({{ $loan->id }})" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">
                                    Mark as Paid
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-400">No loan requests found.</p>
            @endforelse
        </div>
</div>
