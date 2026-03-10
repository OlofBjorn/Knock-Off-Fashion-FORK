<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-semibold">All Products</h2>
</x-slot>

<main class="p-6">
    @if(session('success'))
        <div role="status" aria-live="polite" class="mb-4 rounded bg-green-50 px-4 py-2 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Create New Product
        </a>
        <form method="GET" action="{{ route('products.index') }}" aria-label="Filter products" class="flex gap-3">
            <label for="filter-brand" class="sr-only">Brand</label>
            <input id="filter-brand" name="brand_name" type="text" placeholder="Brand" value="{{ request('brand_name') }}" class="rounded border px-3 py-2" />

            <label for="filter-category" class="sr-only">Category</label>
            <input id="filter-category" name="category" type="text" placeholder="Category" value="{{ request('category') }}" class="rounded border px-3 py-2" />

            <label for="filter-min-price" class="sr-only">Min price</label>
            <input id="filter-min-price" name="min_price" type="number" step="0.01" placeholder="Min" value="{{ request('min_price') }}" class="w-24 rounded border px-3 py-2" />

            <label for="filter-max-price" class="sr-only">Max price</label>
            <input id="filter-max-price" name="max_price" type="number" step="0.01" placeholder="Max" value="{{ request('max_price') }}" class="w-24 rounded border px-3 py-2" />

            <button type="submit" class="rounded bg-gray-800 px-3 py-2 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-700" aria-label="Apply filters">Filter</button>
        </form>
    </div>

    <section aria-labelledby="products-heading">
        <h2 id="products-heading" class="sr-only">Products list</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" role="table" aria-describedby="products-caption">
                <caption id="products-caption" class="sr-only">List of products matching your filters</caption>
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Brand</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Category</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Color</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stock</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->brand_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->description }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">${{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->category }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->color }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->stock }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('products.edit', $product) }}"
                                   class="mr-3 inline-flex rounded bg-indigo-100 px-3 py-1 text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-300"
                                   aria-label="Edit {{ $product->brand_name }}">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="inline" aria-label="Delete {{ $product->brand_name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex rounded bg-red-100 px-3 py-1 text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-300" aria-label="Delete {{ $product->brand_name }}">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-700" colspan="7">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>

</x-app-layout>