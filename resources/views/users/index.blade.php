@extends('layouts.admin')
@section('content')
<table class="table is-narrow is-hoverable is-fullwidth">
    <caption class="is-hidden">{{ $texts['title'] }}</caption>
    <thead>
        <tr>
            <th scope="col">@lang('users.fields.name')</th>
            <th scope="col">@lang('users.fields.email')</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
        <th scope="col">@lang('users.fields.name')</th>
        <th scope="col">@lang('users.fields.email')</th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($users as $permission)
        <tr>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $users->appends(request()->only('filters'))->render('partials.pagination.paginator') }}
@endsection
