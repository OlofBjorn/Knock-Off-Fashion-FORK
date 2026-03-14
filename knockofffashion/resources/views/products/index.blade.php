<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-semibold">All Products - Knock Off Fashion</h2>
</x-slot>

<main class="p-6">
    @if(session('success'))
        <div role="status" aria-live="polite" class="mb-4 rounded bg-green-50 px-4 py-2 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Create New Product
        </a>
        <form method="GET" action="{{ route('products.index') }}" aria-label="Filter products" class="flex flex-col sm:flex-row gap-3">
            <label for="filter-brand" class="sr-only">Brand</label>
            <input id="filter-brand" name="brand_name" type="text" placeholder="Brand" value="{{ request('brand_name') }}" class="rounded border px-3 py-2" />

            <form method="GET" action="{{ route('products.index') }}" aria-label="Filter products" class="flex flex-col sm:flex-row gap-3">
            <label for="filter-product-name" class="sr-only">Product name</label>
            <input id="filter-product-name" name="product_name" type="text" placeholder="Product name" value="{{ request('product_name') }}" class="rounded border px-3 py-2" />

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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Product name</th>
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 max-w-xs relative group">
                                <span class="truncate block">
                                    {{ Str::limit($product->product_name, 30) }}
                                </span>

                                <div class="absolute left-0 top-full mt-1 hidden group-hover:block bg-gray-900 text-white text-sm px-3 py-2 rounded shadow-lg z-50 max-w-xs">
                                    {{ $product->product_name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">SEK {{ number_format($product->price, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->category }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->color }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $product->stock }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('products.edit', $product) }}"
                                   class="mr-3 inline-flex rounded bg-indigo-100 px-3 py-1 text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-300"
                                   aria-label="Edit {{ $product->brand_name }}">
                                    Edit
                                </a>

                               <div x-data="{ open: false }" class="inline">
                            <button
                                type="button"
                                @click="open = true"
                                class="inline-flex rounded bg-red-100 px-3 py-1 text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-300"
                                aria-label="Delete {{ $product->brand_name }}">
                                    Delete
                            </button>

                            <div
                                x-show="open"
                                x-cloak
                                @click.self="open = false"
                                @keydown.escape.window="open = false"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
                                <div role="dialog" aria-modal="true" class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
                                    <h3 class="text-lg font-semibold mb-2">Delete product</h3>

                                        <p class="text-sm text-gray-600 mb-4">
                                            Are you sure you want to delete
                                            <strong>{{ $product->brand_name }}</strong>?
                                                This action cannot be undone.
                                        </p>

                                    <div class="flex justify-end gap-3">
                                        <button
                                            type="button"
                                            @click="open = false"
                                            class="rounded border px-4 py-2 hover:bg-gray-100">
                                                Cancel
                                        </button>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700">
                                                    Yes, delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</main>

</x-app-layout>