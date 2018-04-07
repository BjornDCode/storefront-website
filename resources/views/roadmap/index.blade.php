@extends('layouts.app')

@section('content')
    <section class="roadmap">
        <div class="container">
            <div class="copy">
                <h2>Roadmap</h2>
                <p class="big">
                    Storefront wants to be as open and transparent as possible about what’s going on behind the scenes. Here you can see which features are planned in the immediate future.
                </p>
            </div>
            <div class="features">
                <div class="group">
                    <h3>Up Next</h3>
                    <div class="list">
                        <roadmap-feature title="Search">
                            <p>
                                A search feature allowing users to search products, collections, vendors and more. The feature will contain components for handling search and views for showing search results.
                            </p>
                        </roadmap-feature>
                        <roadmap-feature title="Product Filtering">
                            <p>
                                A set of components that will allow users to filter products on product pages. Users will be able to filter based on different product variants, collections and vendors. 
                            </p>
                        </roadmap-feature>
                    </div>
                </div>

                <div class="group">
                    <h3>Soon</h3>
                    <div class="list">
                        <roadmap-feature title="Customer Authentication">
                            <p>
                                An authentication system for customers. If customers create an account they will be able to save their cart across devices, view previous orders and change billing/shipping addresses. 
                            </p>
                        </roadmap-feature>
                        <roadmap-feature title="Improved Checkout">
                            <p>
                                An improved checkout experience for customers. In the current version of Storefront users are sent to the default Shopify checkout. The new checkout features will allow developers to create unique checkout experiences within thier own apps.
                            </p>
                        </roadmap-feature>
                    </div>
                </div>

                <div class="group">
                    <h3>Down The Road</h3>
                    <div class="list">
                        <roadmap-feature title="React Library">
                            <p>
                                A React version of Storefront.
                            </p>
                        </roadmap-feature>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
