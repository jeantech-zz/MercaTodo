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
                <form action="{{ route('products.destroy',$user->id) }}" method="POST">
                    <a href="{{ route('products.edit', ['user' => $user]) }}">
                        <b-icon size="is-small" type="is-info" icon="pencil"/>
                    </a>
                    <button type="submit" class="button is-primary">
                        @lang('products.buttons.disable')
                     </button>
                     <i-button></i-button>
                 </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->appends(request()->only('filters'))->render('partials.pagination.paginator') }}
@endsection
