@extends('layouts.app')
@push('main')
    @include('navbar')
@endpush
@push('main')
    <main class="section" id="app">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <aside class="menu">
                        <p class="menu-label">@lang('menu.administration')</p>
                        <ul class="menu-list">
                            <li><a href="{{ route('products.indexClient') }}"><em class="pr-2 mdi mdi-map-legend"></em>Products</a></li>
                            <li><a href="#"><em class="pr-2 mdi mdi-currency-usd"></em>Orders</a></li>
                        </ul>
                    </aside>
                </div>
                <div class="column is-four-fifths">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <h1 class="title">{{ $texts['title'] }}</h1>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <div class="buttons">
                                    @foreach($buttons as $template => $button)
                                        @include("partials.buttons.$template", $button)
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @includeWhen(count($filters), 'filters', compact('filters'))
                    <div class="box block">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endpush
