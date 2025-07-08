<div class="bg-gray-900 text-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-semibold mb-4">Create New Account</h2>

    <form wire:submit.prevent="submit" class="space-y-5">
        <div>
            <label for="account_type" class="block text-sm font-medium mb-1">Account Type</label>
            <select wire:model="account_type" id="account_type" class="w-full p-2 bg-gray-800 text-white rounded border border-gray-700 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Select Type</option>
                <option value="Savings">Savings</option>
                <option value="Checking">Checking</option>
                <option value="Salary">Salary</option>
                <option value="Joint">Joint</option>
                <option value="Student">Student</option>
            </select>
            @error('account_type') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="balance" class="block text-sm font-medium mb-1">Balance</label>
            <input type="number" wire:model="balance" id="balance" step="0.01" class="w-full p-2 bg-gray-800 text-white rounded border border-gray-700 focus:ring-blue-500 focus:border-blue-500" />
            @error('balance') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
                Create Account
            </button>
        </div>
    </form>
</div>
