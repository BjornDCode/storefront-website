@extends('layouts.app')

@section('index')
    {!! $index !!}
@endsection

@section('content')
    <section class="docs">
        <div class="container">
            <docs-navigation inline-template>
                <aside>
                    {!! $index !!}
                </aside>
            </docs-navigation>
            <article>
                {!! $content  !!}
            </article>
        </div>
    </section>
@endsection
