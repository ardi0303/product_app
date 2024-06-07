<x-admin-layout>
    <h1 class="w-full text-3xl text-black pb-6">Add Product</h1>

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="/update_products/{{ $data->id_product }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Product Name" aria-label="Name" value="{{ $data->name }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="price">Price</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="text" required="" placeholder="Product Price" aria-label="Price" value="{{ $data->price }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="stock">Stock</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="stock" name="stock" type="text" required="" placeholder="Product Stock" aria-label="Stock" value="{{ $data->stock }}">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="photo">Photo</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="photo" name="photo" type="file" placeholder="Product Stock" aria-label="Photo">
                        @if ($data->photo)
                            <img src="{{ asset('productphoto/' . $data->photo) }}" alt="Current Photo" class="mt-2 max-w-full h-auto">
                        @endif
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="description">Description</label>
                        <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="description" name="description" rows="6" required="" placeholder="Product Description" aria-label="Description">{{ $data->description }}</textarea>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>