<div class="p-4 min-h-screen bg-[#0F172A] text-white font-sans">
    @if (session()->has('message'))
        <div class="bg-green-600 bg-opacity-20 text-green-300 p-3 rounded mb-4 border border-green-500">
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-xl mx-auto p-6 bg-[#1E293B] rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-5 text-white">Create New Transaction</h2>

        <form wire:submit.prevent="submit" class="space-y-5">
            <div>
                <label class="block text-sm mb-1 text-gray-300 font-medium">Account</label>
                <select wire:model="accounts_id" class="w-full bg-[#334155] text-white border border-[#475569] p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Account</option>
                    @foreach (auth()->user()->accounts as $account)
                        <option value="{{ $account->id }}">Account #{{ $account->id }}</option>
                    @endforeach
                </select>
                @error('accounts_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm mb-1 text-gray-300 font-medium">Type</label>
                <select wire:model="type" class="w-full bg-[#334155] text-white border border-[#475569] p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Type</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Withdraw">Withdraw</option>
                    <option value="Transfer">Transfer</option>
                </select>
                @error('type') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm mb-1 text-gray-300 font-medium">Amount</label>
                <input type="number" wire:model="amount" step="0.01" class="w-full bg-[#334155] text-white border border-[#475569] p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('amount') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm mb-1 text-gray-300 font-medium">Description</label>
                <textarea wire:model="description" rows="3" class="w-full bg-[#334155] text-white border border-[#475569] p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white py-2 rounded font-semibold transition">
                    Create Transaction
                </button>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="mt-10 max-w-5xl mx-auto">
        <h2 class="text-xl font-semibold mb-4 text-white">Transaction History</h2>

        <div class="overflow-x-auto rounded shadow border border-[#334155] bg-[#1E293B]">
            <table class="w-full text-left text-white">
                <thead class="bg-[#334155] text-gray-300 text-sm uppercase tracking-wide">
                    <tr>
                        <th class="px-4 py-2 border-b border-[#475569]">Type</th>
                        <th class="px-4 py-2 border-b border-[#475569]">Amount</th>
                        <th class="px-4 py-2 border-b border-[#475569]">Description</th>
                        <th class="px-4 py-2 border-b border-[#475569]">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#475569]">
                    @forelse ($accounts as $transaction)
                        <tr class="hover:bg-[#334155] transition">
                            <td class="px-4 py-2">{{ $transaction->type }}</td>
                            <td class="px-4 py-2">₱{{ number_format($transaction->amount, 2) }}</td>
                            <td class="px-4 py-2">{{ $transaction->description }}</td>
                            <td class="px-4 py-2">{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-blue-300 py-4">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
