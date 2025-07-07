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

    <div class="overflow-x-auto">
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
                @foreach ($account as $acc)
                    <tr class="hover:bg-gray-800">
                        <td class="py-2 px-4 font-medium">{{ $acc->user_id }}</td>
                        <td class="py-2 px-4">{{ $acc->account_number }}</td>
                        <td class="py-2 px-4">{{ $acc->account_type }}</td>
                        <td class="py-2 px-4">{{ $acc->balance }}</td>
                        <td class="py-2 px-4">{{ $acc->status }}</td>
                        <td class="py-2 px-4 text-right">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</div>
