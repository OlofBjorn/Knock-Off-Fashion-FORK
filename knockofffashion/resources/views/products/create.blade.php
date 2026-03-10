<x-app-layout>

<x-slot name="header">
    <h2 class="text-xl front-semibold">Create new product</h2>
</x-slot>

<main>

<section aria-labelledby="create-product-heading">

<h3 id="create-product-heading" class="text-lg front-medium mb-4">
    Add a new product 
</h3>

@if ($errors->any())
    <div role="alert">
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
@csrf

<div>
    <label for="brand name">Brand Name</label>

    <input 
    id="brand_name"
    type="text" 
    name="brand_name" 
    value="{{ old('brand_name') }}"
    required
    aria-describedby="brand_help"
    />
    <p id="brand_help">Enter Brand Name Of Product.</p>

</div>

<br>

<div>


    <label for="description">Description:</label>
    <textarea 
    id="descriotion"
    name="description"
    aria-describedby="description_help"
    >{{ old('description') }}</textarea>
    <p id="description_help">Describe The Product.</p>

</div>

<br>

<div>

    <label for="price">Price:</label>
    <input 
    id="price"
    type="number" 
    step="0.01" 
    name="price" 
    value="{{ old('price') }}"
    required
    aria-describedby="price_help"
    />
    <p id="price_help">Enter The Price In SEK"</p>

</div>
<br>

<div>

    <label for="category">Category:</label>
    <input
    id="category"
    type="text" 
    name="category" 
    value="{{ old('category') }}"
    />

</div>
<br>

<div>

    <label for="color">Color:</label>
    <input 
    id="color"
    type="text" 
    name="color" 
    value="{{ old('color') }}"
    />
</div>
<br>

<div>

    <label for="stock">Stock:</label>
    <input 
    id="stock"
    type="number" 
    name="stock" 
    value="{{ old('stock') }}"
    />
</div>
<br>

<button type="submit">Create Product</button>

</form>

</section>

</main>

</x-app-layout>
