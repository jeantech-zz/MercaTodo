@extends('layouts.admin')
@section('content')
<table class="table is-narrow is-hoverable is-fullwidth">
    <caption class="is-hidden">{{ $texts['title'] }}</caption>
    <thead>
        <tr>
            @foreach($headers as $header)
                <th scope="col">{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tfoot>
    <tr>
        @foreach($headers as $header)
            <th scope="col">{{ $header }}</th>
        @endforeach
    </tr>
    </tfoot>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->image }}</td>
            <td class="has-text-centered">
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a href="{{ route('products.edit', ['product' => $product]) }}">
                        <b-icon size="is-small" type="is-info" icon="pencil"/>
                    </a>
                 </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->appends(request()->only('filters'))->render('partials.pagination.paginator') }}
@endsection
