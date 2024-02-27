<x-layout>

@include('partials._hero')
<div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >
@unless (count($products)==0)
    @foreach ($products as $product)
    <x-listing-card :product='$product'/>
    @endforeach
    @else
    <p>No Products Found</p>
@endunless
</div>

</x-layout>