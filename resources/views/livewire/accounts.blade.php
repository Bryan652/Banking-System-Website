<div>
    <div class="h-40 bg-gray-900 w-full flex items-center mb-5">
        <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="" class="rounded-full ml-10 mr-10">
        <x-mary-header title="Welcome {{ $user->name }}" subtitle="Banks money Banks money Banks money Banks money Banks" class="mt-10"/>

        <balance class="ml-auto mr-40 flex flex-col justify-center items-center">
            <div>Total Balance</div>
            <div class="text-3xl font-bold">{{ number_format($total, 2) }}</div>
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
                <th class="text-left py-2 px-4">Account #</th>
                <th class="text-left py-2 px-4">Account type</th>
                <th class="text-left py-2 px-4">Balance</th>
                <th class="text-left py-2 px-4">Status</th>
                <th class="py-2 px-4 text-right"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-800">

        @foreach ($account->take(5) ?? [] as $acc)
            <tr class="hover:bg-gray-800">
                <td class="py-2 px-4">{{ $acc->account_number }}</td>
                <td class="py-2 px-4">{{ $acc->account_type }}</td>
                <td class="py-2 px-4">{{ $acc->balance }}</td>
                <td class="py-2 px-4">{{ $acc->status }}</td>
                <td class="py-2 px-4 text-right"></td>
            </tr>
        @endforeach

        @foreach ($account->skip(5) ?? [] as $acc)
            <tr class="hover:bg-gray-800" x-show="showAll" x-cloak>
                <td class="py-2 px-4">{{ $acc->account_number }}</td>
                <td class="py-2 px-4">{{ $acc->account_type }}</td>
                <td class="py-2 px-4">{{ $acc->balance }}</td>
                <td class="py-2 px-4">{{ $acc->status }}</td>
                <td class="py-2 px-4 text-right"></td>
            </tr>
        @endforeach
    </tbody>

    </table>
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
        <div class="flex flex-col flex-1 bg-gray-900 rounded-lg p-4">
            <div class="text-white text-lg font-semibold mb-2">Transaction</div>

            <div class="overflow-y-auto max-h-[10.5rem]">
                <table class="min-w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-800 text-gray-200 sticky top-0">
                        <tr>
                            <th class="py-3 px-4">Account ID</th>
                            <th class="py-3 px-4">Type</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Description</th>
                            <th class="py-3 px-4">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-gray-900">
                        @foreach ($transaction ?? [] as $item)
                            <tr class="hover:bg-gray-800">
                                <td class="py-3 px-4">{{ $item->accounts_id }}</td>
                                <td class="py-3 px-4">{{ $item->type }}</td>
                                <td class="py-3 px-4">{{ number_format($item->amount, 2) }}</td>
                                <td class="py-3 px-4">{{ $item->description }}</td>
                                <td class="py-3 px-4">{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col flex-1 bg-gray-900 rounded-lg p-4">
            <div class="text-white text-lg font-semibold mb-2">Loans</div>

            <div class="overflow-y-auto max-h-[10.5rem]">
                <table class="min-w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-800 text-gray-200 sticky top-0">
                        <tr>
                            <th class="py-3 px-4">Borrower ID</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Interest Rate</th>
                            <th class="py-3 px-4">Term Months</th>
                            <th class="py-3 px-4">status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-gray-900">
                        @foreach ($loans ?? [] as $item)
                            <tr class="hover:bg-gray-800">
                                <td class="py-3 px-4">{{ $item->borrower->id }}</td>
                                <td class="py-3 px-4">{{ number_format($item->amount, 2) }}</td>
                                <td class="py-3 px-4">{{ $item->interest_rate }}</td>
                                <td class="py-3 px-4">{{ $item->term_months }}</td>

                                @php
                                    $statusStyles = [
                                        'Approved'  => 'bg-green-500/20 text-green-300',
                                        'Pending'   => 'bg-yellow-500/20 text-yellow-300',
                                        'Paid'      => 'bg-blue-500/20 text-blue-300',
                                        'Suspended' => 'bg-red-500/20 text-red-300',
                                    ];

                                    $style = $statusStyles[$item->status] ?? 'bg-gray-500/20 text-gray-300';
                                @endphp

                                <td class="py-3 px-4">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $style }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
