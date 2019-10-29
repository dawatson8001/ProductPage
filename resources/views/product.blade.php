<?php 
    //Set template data for product
    $product = ['name' => 'Product Name',
                'status' => 'On Sale',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo id iusto nostrum, harum odit excepturi, facere exercitationem amet 
                                    error incidunt animi possimus accusantium aliquid repudiandae dolore labore. Rem, mollitia nulla.',
                'price' => 9.99
                ];
?>
@extends('layouts.app')

@section('head')
    <title>Product Page</title>
@stop

@section('content')

    <div class="col-sm-8 col-m-6 col-lg-4 product-container">

        <div class="product-image">

        </div>

        <div class="product-name">
            {{ $product['name'] }}
        </div>

        <div class="product-status">
            {{ $product['status'] }}
        </div>

        <div class="product-description">
            <p>
                {{ $product['description'] }}
            </p>
        </div>
        
        <form action="{{ route('payment.post', ['name'=>$product['name'], 'price' =>$product['price'] ]) }}" 
                method="POST" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
            @csrf
            <script 
                src="https://checkout.stripe.com/checkout.js" 
                class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{ str_replace('.', '', $product['price']) }}"
                data-name="{{ $product['name'] }}"
                data-description="{{ $product['description'] }}"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="gbp"
                data-label="Buy for £{{ $product['price'] }}">
            </script>
        </form>
        <br>
        <div class="social-media-container">
            Share this product
            <div class="col-md-12 centre">
                <div class="social-media-icon"></div>
                <div class="social-media-icon"></div>
                <div class="social-media-icon"></div>
                <div class="social-media-icon"></div>
                <div class="social-media-icon"></div>
            </div>
        </div>

    </div>

@stop