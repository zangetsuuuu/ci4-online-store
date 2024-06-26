<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Customer\CartModel;
use App\Models\Customer\ProductModel;
use App\Models\Customer\OrderModel;

class Cart extends BaseController
{
    protected $cartModel;
    protected $productModel;
    protected $orderModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
    }

    public function viewCart()
    {
        $this->deleteItemAfter3Hours();

        $customerId = session()->get('id');

        $cartItems = $this->cartModel->getCartByCustomerId($customerId);

        $cartDetails = [];
        foreach ($cartItems as $cartItem) {
            $product = $this->productModel->getProductById($cartItem['product_id']);
            $cartDetails[] = [
                'id' => $cartItem['id'],
                'customer_id' => $cartItem['customer_id'],
                'product_id' => $cartItem['product_id'],
                'product_name' => $product['name'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                'total' => $cartItem['quantity'] * $cartItem['price']
            ];
        }

        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($cartDetails as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['total'];
        }

        $data = [
            'title' => 'Keranjang',
            'cart' => $cartDetails,
            'total_quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'validation' => session()->getFlashdata('validation'),
            'flashMessages' => [
                'Edit Success' => ['id' => 'alert-edit-success', 'message' => session()->getFlashdata('Edit Success')],
                'Delete Success' => ['id' => 'alert-delete-success', 'message' => session()->getFlashdata('Delete Success')],
            ]
        ];

        return view('customer/cart', $data);
    }

    public function updateCartItem()
    {
        $config = $this->cartModel->validation();

        if (!$this->validate($config)) {
            return redirect()->to(base_url('cart'))->withInput()->with('validation', $this->validator);
        }

        $cartId = $this->request->getVar('cart_id');
        $quantity = $this->request->getVar('quantity');

        $cartItem = $this->cartModel->getCart($cartId);

        $productId = $cartItem['product_id'];

        $product = $this->productModel->getProductById($productId);

        if ($quantity > $product['stock']) {
            session()->setFlashdata('Stock Not Available', 'Jumlah pesanan melebihi stok produk!');
            return redirect()->to(base_url('cart'));
        }

        $this->cartModel->update($cartId, ['quantity' => $quantity]);

        $newStock = $product['stock'] + $cartItem['quantity'] - $quantity;
        $this->productModel->update($productId, ['stock' => $newStock]);

        session()->setFlashdata('Edit Success', 'Jumlah pesanan berhasil diperbarui!');
        return redirect()->to(base_url('cart'));
    }

    public function deleteCartItem($id)
    {
        $cart = $this->cartModel->getCart($id);

        $product = $this->productModel->getProductById($cart['product_id']);
        $product['stock'] += $cart['quantity'];
        $this->productModel->save($product);

        $this->cartModel->delete($id);

        session()->setFlashdata('Delete Success', 'Item berhasil dihapus!');

        return redirect()->to(base_url('cart'));
    }

    public function deleteItemAfter3Hours()
    {
        $carts = $this->cartModel->findAll();
        foreach ($carts as $cart) {
            if (time() - strtotime($cart['created_at']) > 3 * 3600) {
                $product = $this->productModel->getProductById($cart['product_id']);
                $product['stock'] += $cart['quantity'];
                $this->productModel->save($product);
                $this->cartModel->delete($cart['id']);
            }
        }

        return redirect()->to(base_url('cart'));
    }
}
