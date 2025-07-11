<div>
    <form wire:submit.prevent="submit" class="space-y-4 bg-gray-800 p-6 rounded-lg">
        <div>
            <label class="block text-white">Amount:</label>
            <input type="number" wire:model="amount" class="w-full p-2 rounded bg-gray-700 text-white">
            @error('amount') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-white">Interest Rate (%):</label>
            <input type="number" step="0.01" wire:model="interest_rate" class="w-full p-2 rounded bg-gray-700 text-white">
            @error('interest_rate') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-white">Term (months):</label>
            <input type="number" wire:model="term_months" class="w-full p-2 rounded bg-gray-700 text-white">
            @error('term_months') <span class="text-red-400">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Submit</button>

        @if (session()->has('message'))
            <p class="text-green-400 mt-2">{{ session('message') }}</p>
        @endif
    </form>

    <div class="mt-6 space-y-4">
        <h2 class="text-xl font-bold text-white">Your Loan Requests</h2>

        @forelse ($this->userLoans as $loan)
            <div class="p-4 rounded bg-gray-900 text-white border border-gray-700">
                <p><strong>Amount:</strong> ₱{{ number_format($loan->amount, 2) }}</p>
                <p><strong>Interest Rate:</strong> {{ $loan->interest_rate ?? 'N/A' }}%</p>
                <p><strong>Term:</strong> {{ $loan->term_months }} months</p>
                <p><strong>Status:</strong>
                    <span class="{{ $loan->status === 'Pending' ? 'text-yellow-400' : ($loan->status === 'Approved' ? 'text-green-400' : 'text-gray-400') }}">
                        {{ $loan->status }}
                    </span>
                </p>
            </div>
        @empty
            <p class="text-gray-400">You have no loan requests.</p>
        @endforelse
    </div>
</div>
