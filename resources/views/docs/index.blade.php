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
                    <div class="switcher">
                        <button class="button small" @click="toggleSwitcher">
                            {{ $currentVersion }}
                        </button>
                        <ul v-if="switcherOpen">
                            @foreach($versions as $key => $display)
                                <li>
                                    <a href="{{ url('docs/'.$key.$currentSection) }}">
                                        {{ $display }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </docs-navigation>
            <article>
                {!! $content  !!}
            </article>
        </div>
    </section>
@endsection
