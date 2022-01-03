@if (Auth::user()->isClient())
    @extends('layouts.client')
@else
sss
    @extends('layouts.admin')
@endif
