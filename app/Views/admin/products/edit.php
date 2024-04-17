<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg md:text-xl font-semibold tracking-wide">Edit Produk</h1>
                </div>
                <a href="<?= base_url('/admin/products'); ?>" class="flex items-center space-x-2 text-xs md:text-sm tracking-wide text-gray-500 hover:underline">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <div>Kembali<span class="hidden md:inline"> ke produk</span></div>
                </a>
            </div>
        </div>
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <form action="" method="POST">
                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-8">
                        <!-- Product Image -->
                        <div class="rounded-md w-full h-60 overflow-hidden border relative">
                            <img id="frame" src="<?= base_url('img/gradient.jpg'); ?>" class="object-cover w-full h-full" alt="">
                            <div class="flex items-center justify-center absolute inset-0 bg-myBlack/20">
                                <label data-tooltip-target="add-product-image-tooltip" for="fileInput" class="text-white hover:text-gray-300 p-3 rounded-full cursor-pointer ease-in-out duration-300">
                                    <svg class="w-7 h-7" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0" fill="none" width="24" height="24" />
                                        <g>
                                            <path d="M23 4v2h-3v3h-2V6h-3V4h3V1h2v3h3zm-8.5 7c.828 0 1.5-.672 1.5-1.5S15.328 8 14.5 8 13 8.672 13 9.5s.672 1.5 1.5 1.5zm3.5 3.234l-.513-.57c-.794-.885-2.18-.885-2.976 0l-.655.73L9 9l-3 3.333V6h7V4H6c-1.105 0-2 .895-2 2v12c0 1.105.895 2 2 2h12c1.105 0 2-.895 2-2v-7h-2v3.234z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </label>
                                <input type="file" name="product_image" id="fileInput" class="hidden" accept="image/*" onchange="previewImage()">
                            </div>
                            <div id="add-product-image-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs tracking-wide font-medium text-white transition-opacity duration-300 bg-myBlack rounded-lg shadow-sm opacity-0 tooltip group">
                                Gambar produk
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-span-2 space-y-6">
                            <div>
                                <label for="product_name" class="text-sm font-medium text-myBlack tracking-wide">Nama Produk <span class="text-red-500">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Tambahkan nama produk" required />
                            </div>
                            <div>
                                <label for="product_category" class="text-sm font-medium text-myBlack tracking-wide">Kategori <span class="text-red-500">*</span></label>
                                <select name="product_category" id="product_category" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" required>
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <option value="staple">Bahan Pokok</option>
                                    <option value="snack">Snack</option>
                                    <option value="instant_food">Makanan Instan</option>
                                    <option value="beverage">Minuman</option>
                                    <option value="milk">Susu</option>
                                    <option value="bread">Roti</option>
                                </select>
                            </div>
                            <div>
                                <label for="product_stock" class="text-sm font-medium text-myBlack tracking-wide">Stok <span class="text-red-500">*</span></label>
                                <input type="number" min="1" name="product_stock" id="product_stock" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Tambahkan stok" required />
                            </div>
                            <div>
                                <label for="product_price" class="text-sm font-medium text-myBlack tracking-wide">Harga <span class="text-red-500">*</span></label>
                                <input type="number" min="500" name="product_price" id="product_price" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base" placeholder="Rp." required />
                            </div>
                            <div>
                                <label for="product_description" class="text-sm font-medium text-myBlack tracking-wide">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea name="product_description" id="product_description" class="block w-full p-2.5 mt-2 rounded-md bg-gray-50 border border-gray-300 placeholder-gray-400 text-myBlack focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 focus:z-10 focus:shadow-md text-sm md:text-base resize-none" placeholder="Tambahkan deskripsi" required></textarea>
                            </div>
                            <button type="submit" class="btn-admin w-full">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>