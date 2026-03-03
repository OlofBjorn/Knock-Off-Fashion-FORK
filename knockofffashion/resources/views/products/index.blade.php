<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>All Products</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('products.create') }}">Create New Product</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Color</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->brand_name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this product?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>