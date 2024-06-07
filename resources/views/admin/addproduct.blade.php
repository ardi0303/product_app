<x-admin-layout>
    <h1 class="w-full text-3xl text-black pb-6">Add Product</h1>

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl" action="/insert_products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <label class="block text-sm text-gray-600" for="name">Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Product Name" aria-label="Name">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="price">Price</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="number" required="" placeholder="Product Price" aria-label="Price">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="stock">Stock</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="stock" name="stock" type="number" required="" placeholder="Product Stock" aria-label="Stock">
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="photo">Photo</label>
                        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="photo" name="photo" type="file" required="" placeholder="Product Stock" aria-label="Stock">
                    </div>
                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="description">Description</label>
                        <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="description" name="description" rows="6" required="" placeholder="Product Description" aria-label="Description"></textarea>
                    </div>
                    <div class="mt-6">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>