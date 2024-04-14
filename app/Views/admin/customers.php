<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('content'); ?>
<div class="min-h-screen">
    <div class="p-4 sm:ml-64">
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-16 md:mt-14">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2 md:space-x-3">
                    <svg class="w-6 h-6 md:w-7 md:h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58579 4.58579C5 5.17157 5 6.11438 5 8V17C5 18.8856 5 19.8284 5.58579 20.4142C6.17157 21 7.11438 21 9 21H15C16.8856 21 17.8284 21 18.4142 20.4142C19 19.8284 19 18.8856 19 17V8C19 6.11438 19 5.17157 18.4142 4.58579C17.8284 4 16.8856 4 15 4H9C7.11438 4 6.17157 4 5.58579 4.58579ZM9 8C8.44772 8 8 8.44772 8 9C8 9.55228 8.44772 10 9 10H15C15.5523 10 16 9.55228 16 9C16 8.44772 15.5523 8 15 8H9ZM9 12C8.44772 12 8 12.4477 8 13C8 13.5523 8.44772 14 9 14H15C15.5523 14 16 13.5523 16 13C16 12.4477 15.5523 12 15 12H9ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z" fill="currentColor" />
                    </svg>
                    <h1 class="text-lg md:text-xl font-semibold tracking-wide">Daftar Pelanggan</h1>
                </div>
                <button data-modal-target="customer-search-modal" data-modal-toggle="customer-search-modal" class="text-myBlack hover:text-gray-500 ease-in-out duration-300">
                    <svg class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="h-full bg-white rounded-lg shadow-sm p-4 mt-3 md:mt-4">
            <div class="rounded-md overflow-x-auto">
                <!-- Customers start -->
                <table class="min-w-full text-sm text-left text-gray-500 tracking-wide divide-y divide-gray-200 border border-gray-200">
                    <thead class="text-xs text-myBlack uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-fit">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">
                                Telepon
                            </th>
                            <th scope="col" class="px-6 py-4 w-fit">

                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $i; ?></td>
                                <td scope="row" class="flex items-center px-6 py-4 text-myBlack whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full overflow-hidden">
                                        <img class="w-full h-full object-cover" src="<?= base_url('img/bg-1.jpg'); ?>" alt="">
                                    </div>
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">Kurosaki Ichigo</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">kurosaki@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">123456789</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="<?= base_url("/admin/customers/$i"); ?>" class="hover:text-myBlack ease-in-out duration-300">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <!-- Customers end -->
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/admin/modal/customer-search'); ?>

<?= $this->endSection(); ?>