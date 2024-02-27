<x-layout>
            <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Product
                </h2>
            </header>

            <form method="post" action="/products" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label
                        for="product_name"
                        class="inline-block text-lg mb-2"
                        >Product Name</label
                    >
                    
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="product_name" value="{{old('product_name')}}"
                        
                    />
                    @error('product_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                        
                    @enderror
                </div>
                <div class="mb-6">
                    <label
                        for="price"
                        class="inline-block text-lg mb-2"
                        >Product Price</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="price" value="{{old('price')}}"
                        
                    />
                    @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                        
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Product Image
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="image"
                    />
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                        
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                    Product Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="Descriptions"
                    ></textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                        
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Create Product
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </x-layout>