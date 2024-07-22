<?php

namespace Tests\Data\Catalog;

class ProductOne
{
    public const Product = [
        'login_url'         => '/products/1',
        'product_1'         => '.btn.btn-dark.ms-3.fw-bold',
        'Wishlist_icon'     => '#product-top > div:nth-child(2) > div > div.product-btns > div.add-wishlist > button',
        'add_cart'          => '.btn.btn-outline-dark.ms-md-3.add-cart.fw-bold',
        'product1_name'     => '#product-top > div:nth-child(2) > div > h1',
        'quantity'          => '#product-top > div:nth-child(2) > div > div.product-btns > div.quantity-btns > div > input',
        'quantity_up'       => '.bi.bi-chevron-up',
        'buy_btn'           => '#product-top > div:nth-child(2) > div > div.quantity-btns > button.btn.btn-dark.ms-3.fw-bold',
        'address_btn'       => '#checkout-address-app > div.checkout-black > div.addresses-wrap > div > div > div > button',
        'login_text'        => 'Home',
        'understock_assert' => '.layui-layer-content',
    ];
}
