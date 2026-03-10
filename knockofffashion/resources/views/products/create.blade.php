<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl font-semibold">Create a new product</h2>
</x-slot>

<main>
    <section aria-labelledby="create-product-heading">
        <h3 id="create-product-heading" class="text-lg font-medium mb-4">Create Product</h3>

        @if ($errors->any())
            <div role="alert" aria-labelledby="form-error-heading" class="mb-4 bg-yellow-50 dark:bg-yellow-900 p-3 rounded">
                <h4 id="form-error-heading" class="font-medium">There are problems with your submission</h4>
                <ul class="mt-2 list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="brand_name" class="block font-medium">Brand name</label>
                <input
                    id="brand_name"
                    name="brand_name"
                    type="text"
                    value="{{ old('brand_name') }}"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('brand_name') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('brand_name') ? 'brand_name-error' : '' }}"
                >
                @error('brand_name')
                    <p id="brand_name-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="block font-medium">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('description') ? 'description-error' : '' }}"
                    rows="4"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p id="description-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="block font-medium">Price</label>
                <input
                    id="price"
                    name="price"
                    type="number"
                    step="0.01"
                    value="{{ old('price') }}"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('price') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('price') ? 'price-error' : '' }}"
                >
                @error('price')
                    <p id="price-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="block font-medium">Category</label>
                <input
                    id="category"
                    name="category"
                    type="text"
                    value="{{ old('category') }}"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('category') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('category') ? 'category-error' : '' }}"
                >
                @error('category')
                    <p id="category-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="color" class="block font-medium">Color</label>
                <input
                    id="color"
                    name="color"
                    type="text"
                    value="{{ old('color') }}"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('color') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('color') ? 'color-error' : '' }}"
                >
                @error('color')
                    <p id="color-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="block font-medium">Stock</label>
                <input
                    id="stock"
                    name="stock"
                    type="number"
                    value="{{ old('stock') }}"
                    class="mt-1 block w-full border px-2 py-1"
                    aria-invalid="{{ $errors->has('stock') ? 'true' : 'false' }}"
                    aria-describedby="{{ $errors->has('stock') ? 'stock-error' : '' }}"
                >
                @error('stock')
                    <p id="stock-error" role="alert" class="text-sm text-red-700 mt-1">⚠ {{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-black text-white">Create Product</button>
                <a href="{{ route('products.index') }}" class="ml-3 text-sm underline">Cancel</a>
            </div>
        </form>
    </section>
</main>
</x-app-layout>
