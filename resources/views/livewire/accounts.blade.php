<div>
    <div class="h-40 bg-gray-900 w-full flex items-center mb-5">
        <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="" class="rounded-full ml-10 mr-10">
        <x-mary-header title="Welcome {{ $user->name }}" subtitle="Banks money Banks money Banks money Banks money Banks" class="mt-10"/>

        <balance class="ml-auto mr-40 flex flex-col justify-center items-center">
            <div>Total Balance</div>
            <div class="text-3xl font-bold">PHP 12,000</div>
        </balance>
    </div>

    <div>
        <div class="bg-gray-900 text-white p-6 rounded-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-xl font-semibold">Users</h2>
                    <p class="text-sm text-gray-400">
                        A list of all your accounts.
                    </p>
                </div>
                <button class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
                    Add account
                </button>
            </div>
    <div x-data="{ showAll: false }">
    <table class="min-w-full text-sm">
        <thead class="border-b border-gray-700 text-gray-300">
            <tr>
                <th class="text-left py-2 px-4">Name</th>
                <th class="text-left py-2 px-4">Account #</th>
                <th class="text-left py-2 px-4">Account type</th>
                <th class="text-left py-2 px-4">Balance</th>
                <th class="text-left py-2 px-4">Status</th>
                <th class="py-2 px-4 text-right"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-800">
    {{-- First 5 items --}}
    @foreach ($account->take(5) as $acc)
        <tr class="hover:bg-gray-800">
            <td class="py-2 px-4 font-medium">{{ $acc->user_id }}</td>
            <td class="py-2 px-4">{{ $acc->account_number }}</td>
            <td class="py-2 px-4">{{ $acc->account_type }}</td>
            <td class="py-2 px-4">{{ $acc->balance }}</td>
            <td class="py-2 px-4">{{ $acc->status }}</td>
            <td class="py-2 px-4 text-right"></td>
        </tr>
    @endforeach

    {{-- Remaining items --}}
    @foreach ($account->skip(5) as $acc)
        <tr class="hover:bg-gray-800" x-show="showAll" x-cloak>
            <td class="py-2 px-4 font-medium">{{ $acc->user_id }}</td>
            <td class="py-2 px-4">{{ $acc->account_number }}</td>
            <td class="py-2 px-4">{{ $acc->account_type }}</td>
            <td class="py-2 px-4">{{ $acc->balance }}</td>
            <td class="py-2 px-4">{{ $acc->status }}</td>
            <td class="py-2 px-4 text-right"></td>
        </tr>
    @endforeach
</tbody>

    </table>

        {{-- Toggle button --}}
            @if ($account->count() > 5)
                <div class="mt-4 text-center">
                    <button
                        @click="showAll = !showAll"
                        class="text-blue-400 hover:underline"
                    >
                        <span x-show="!showAll">▼ Show more</span>
                        <span x-show="showAll">▲ Show less</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="flex mt-5 gap-4">
    <div class="flex flex-1 justify-start bg-gray-900 h-40 items-start rounded-lg p-4">
        <div class="text-white text-lg font-semibold">
            Transactions
        </div>
    </div>

    <div class="flex flex-1 justify-start bg-gray-900 h-40 items-start rounded-lg p-4">
        <div class="text-white text-lg font-semibold">
            Loans
        </div>
    </div>
</div>


</div>
