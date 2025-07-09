<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8">

    <!-- Search Input -->
    <div>

        <input
            type="text"
            wire:model.live.debounce.500ms="search"
            placeholder="Search by name..."
            class="w-full px-4 py-2 border border-gray-700 rounded-lg bg-gray-900 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 shadow"
        />
    </div>

    <div class="bg-gray-900 text-white p-6 rounded-xl shadow-lg border border-gray-800">
        <h2 class="text-xl font-semibold mb-4 text-blue-400 border-b border-gray-700 pb-2 flex justify-between">
            <span>Users</span>
            <span class="text-sm text-gray-400">({{ $userAccounts->count() }})</span>
        </h2>
        <div class="overflow-auto max-h-96 rounded">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs sticky top-0 z-10">
                    <tr>
                        <th class="py-3 px-4 bg-gray-800">#</th>
                        <th class="py-3 px-4 bg-gray-800">Name</th>
                        <th class="py-3 px-4 bg-gray-800">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($userAccounts as $index => $item)
                        <tr class="hover:bg-gray-800">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $item->user->name }}</td>
                            <td class="py-2 px-4">{{ $item->user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 px-4 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div class="bg-gray-900 text-white p-6 rounded-xl shadow-lg border border-gray-800">
        <h2 class="text-xl font-semibold mb-4 text-blue-400 border-b border-gray-700 pb-2 flex justify-between">
            <span>Admins</span>
            <span class="text-sm text-gray-400">({{ $adminAccounts->count() }})</span>
        </h2>
        <div class="overflow-auto max-h-96 rounded">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs sticky top-0 z-10">
                    <tr>
                        <th class="py-3 px-4 bg-gray-800">#</th>
                        <th class="py-3 px-4 bg-gray-800">Name</th>
                        <th class="py-3 px-4 bg-gray-800">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($adminAccounts as $index => $item)
                        <tr class="hover:bg-gray-800">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $item->user->name }}</td>
                            <td class="py-2 px-4">{{ $item->user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 px-4 text-center text-gray-500">No admins found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div class="bg-gray-900 text-white p-6 rounded-xl shadow-lg border border-gray-800">
        <h2 class="text-xl font-semibold mb-4 text-blue-400 border-b border-gray-700 pb-2 flex justify-between">
            <span>Staff</span>
            <span class="text-sm text-gray-400">({{ $staffAccounts->count() }})</span>
        </h2>
        <div class="overflow-auto max-h-96 rounded">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs sticky top-0 z-10">
                    <tr>
                        <th class="py-3 px-4 bg-gray-800">#</th>
                        <th class="py-3 px-4 bg-gray-800">Name</th>
                        <th class="py-3 px-4 bg-gray-800">Email</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($staffAccounts as $index => $item)
                        <tr class="hover:bg-gray-800">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $item->user->name }}</td>
                            <td class="py-2 px-4">{{ $item->user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 px-4 text-center text-gray-500">No staff found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
