<!-- Delete cart item modal -->
<?php foreach ($cart as $item) : ?>
    <div id="delete-cart-item-modal#<?= $item['id']; ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-5 text-center md:p-6">
                    <svg class="w-24 h-24 mx-auto mb-4 text-red-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h3 class="mb-5 text-base font-normal tracking-wide text-gray-500">Hapus item "<?= $item['product_name']; ?>" dari keranjang?</h3>
                    <div class="flex items-center justify-center space-x-3">
                        <form action="<?= base_url("cart/$item[id]/delete"); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="w-20 btn-danger">Ya</button>
                        </form>
                        <button data-modal-hide="delete-cart-item-modal#<?= $item['id']; ?>" type="button" class="w-20 btn-alternative">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>