<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10 bg-black">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        <img
        class="hidden w-48 mr-6 md:block"
        src="{{$product->image? asset('storage/' . $product->image) :asset("images/no-image.png")}}"
        alt=""
    />
    
            <h3 class="text-2xl mb-2">{{$product->product_name}}</h3>
      
        
            <div class="text-lg my-4">
                <i class="fa-solid fa-rupee-sign"></i> {{$product->price}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Product Description
                </h3>
                <div class="text-lg space-y-6">
                    {{$product->description}}
                </div>
            </div>
        </div>
    </x-card>
    </div>
</x-layout>