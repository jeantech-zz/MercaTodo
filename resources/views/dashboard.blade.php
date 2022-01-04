@if (Auth::user()->isClient())
    @extends('layouts.client')
@else
    @extends('layouts.admin')
@endif
