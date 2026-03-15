
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Knock Off Fashion Admin
        </h2>
    </x-slot>

<main class="py-12">

<section class="max-w-7xl mx-auto sm:px-6 lg:px-8" aria-labelledby="dashboard-heading">

<h3 id="dashboard-heading" class="text-lg font-medium mb-2">
Dashboard
</h3>

<p class="text-sm text-gray-600 mb-6">
Welcome {{ $user->name }}. You are logged in and can manage the product catalog.
</p>

<div class="grid md:grid-cols-3 gap-6">

<article class="bg-white shadow-sm rounded-lg p-6">

<h4 class="font-semibold mb-2">
Products in catalog
</h4>

<p class="text-3xl font-bold">
{{ $productCount }}
</p>

</article>


<article class="bg-white shadow-sm rounded-lg p-6">

<h4 class="font-semibold mb-2">
Manage products
</h4>

<p class="text-sm text-gray-600 mb-4">
View, edit or delete products.
</p>

<a href="{{ route('products.index') }}" class="underline">
Go to products
</a>

</article>


<article class="bg-white shadow-sm rounded-lg p-6">

<h4 class="font-semibold mb-2">
Create new product
</h4>

<p class="text-sm text-gray-600 mb-4">
Add a new item to the catalog.
</p>

<a href="{{ route('products.create') }}" class="underline">
Create product
</a>

</article>

</div>

</section>

</main>

</x-app-layout>



