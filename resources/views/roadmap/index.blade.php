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
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                        <roadmap-feature title="Product Filtering">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                    </div>
                </div>

                <div class="group">
                    <h3>Soon</h3>
                    <div class="list">
                        <roadmap-feature title="Customer Authentication">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                        <roadmap-feature title="Improved Checkout">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                    </div>
                </div>

                <div class="group">
                    <h3>Down The Road</h3>
                    <div class="list">
                        <roadmap-feature title="React Library">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                    </div>
                </div>
    
{{--                 <div class="group">
                    <h3>Other Ideas</h3>
                    <div class="list">
                        <roadmap-feature title="React Library">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sapiente aliquid dolor ab iure ut tempore quisquam possimus modi veritatis! Mollitia, atque quisquam consequatur voluptatibus harum voluptatem officiis. Quae, libero!
                            </p>
                        </roadmap-feature>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
@endsection
