<div class="w-full">
    <table class="w-full border border-gray-300 text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-700 uppercase">
            <tr>
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Store Name</th>
                <th class="px-4 py-3">Owner</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Address</th>
                <th class="px-4 py-3">Created At</th>
                <th class="px-4 py-3">Updated At</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($stores as $index => $store)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 break-words">{{ $store->name }}</td>
                    <td class="px-4 py-2 break-words">{{ $store->owner_name }}</td>
                    <td class="px-4 py-2 break-words">{{ $store->email }}</td>
                    <td class="px-4 py-2 break-words">{{ $store->phone }}</td>
                    <td class="px-4 py-2 break-words">{{ $store->address }}</td>
                    <td class="px-4 py-2">{{ $store->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $store->updated_at->format('d M Y') }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded text-white {{ $store->status == 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ ucfirst($store->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-right whitespace-nowrap">
                        <a href="{{ route('stores.edit', $store->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="px-4 py-4 text-center text-gray-500">No stores found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
