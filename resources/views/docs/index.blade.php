@extends('layouts.app')

@section('index')
    {!! $index !!}
@endsection

@section('content')
    <section class="docs">
        <div class="container">
{{--             <aside>
                {!! $index !!}
            </aside> --}}
            <article>
                {!! $content  !!}
            </article>
        </div>
    </section>
@endsection
