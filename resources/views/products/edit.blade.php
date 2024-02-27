<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Minul Hemsara</title>
    </head>

    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src={{asset("images/logo.png")}} alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>

                <span class="font-bold uppercase">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
                <li>
                    <a href="/products/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Products</a
                    >
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>
                        Logout
                    </button>
                
                </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>

        <main>
            <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Product
                </h2>
            </header>

            <form method="post" action="/products/{{$product->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="product_name"
                        class="inline-block text-lg mb-2"
                        >Product Name</label
                    >
                    
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="product_name" value="{{$product->product_name}}"
                        
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
                        name="price" 
                        value="{{$product->price}}"
                        
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
                    <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{$product->image? asset('storage/' . $product->image) :asset("images/no-image.png")}}"
                    alt=""
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
                        value="{{$product->description}}"
                        >{{$product->description}}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                        
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Product
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>

        </main>
        <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
    >
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a
            href="/products/create"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >Create Product</a
        >
    </footer>
    <x-flash-message/>
</body>
</html>

  