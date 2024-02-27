@props(['product'])


<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$product->image? asset('storage/' . $product->image) :asset("images/pm.jpeg")}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/products/{{$product->id}}">{{$product->product_name}}</a>
            </h3>

            <div class="text-lg mt-4">
                {{$product->description}}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-rupee-sign"></i> {{$product->price}}
            </div>
        </div>
    </div>
</x-card>