@extends('layouts.app')

@section('content')
    <section class="support">
        <div class="container">
            <div class="primary">
                <div class="queries">
                    <h2>Support Queries</h2>
                    <p class="big">
                        Feel free to send an email if you have questions about licensing, the library or another subject. I can be reached at <a href="mailto:support@storefront.io">support@storefront.io</a>.
                    </p>
                </div>
            </div>
            <div class="secondary">
                <div class="issues">
                    <h2>Issues</h2>
                    <p>
                        If you find a bug in the library or have any other issues with the library itself, please post an issue in the <a href="#">Github repository</a>.
                    </p>
                </div>
                <div class="features">
                    <h2>Upcoming Features</h2>
                    <p>
                        If you are curious about which new features are planned please have a look at the <a href="/roadmap">Roadmap</a>. You are welcome to send an email with suggestions for new features.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
