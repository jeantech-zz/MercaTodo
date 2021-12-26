@extends('layouts.auth')
@section('auth-content')
    <div class="card">
        <div class="card-content">
            @if (session('status'))
                <div class="notification is-primary is-light">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <b-field label="{{ __('Name') }}"
                         type="{{ $errors->has('name') ? 'is-danger' : null }}"
                         message="{{ $errors->first('name') }}">
                    <b-input type="text"
                             name="name"
                             id="name"
                             value="{{ old('name') }}"
                             maxlength="30"
                             icon="account-lock"
                             required>
                    </b-input>
                </b-field>
				<b-field label="{{ __('E-Mail Address') }}"
                         type="{{ $errors->has('email') ? 'is-danger' : null }}"
                         message="{{ $errors->first('email') }}">
                    <b-input type="text"
                             name="email"
                             id="email"
                             value="{{ old('email') }}"
                             maxlength="30"
                             icon="account-lock"
                             required>
                    </b-input>
                </b-field>
				
				<b-field label="{{ __('Phone Number') }}"
                         type="{{ $errors->has('phone_number') ? 'is-danger' : null }}"
                         message="{{ $errors->first('phone_number') }}">
                    <b-input type="text"
                             name="phone_number"
                             id="phone_number"
                             value="{{ old('phone_number') }}"
                             maxlength="30"
                             icon="account-lock"
                             required>
                    </b-input>
                </b-field>
				
				<b-field label="{{ __('Address') }}"
                         type="{{ $errors->has('address') ? 'is-danger' : null }}"
                         message="{{ $errors->first('name') }}">
                    <b-input type="text"
                             name="address"
                             id="address"
                             value="{{ old('address') }}"
                             maxlength="30"
                             icon="account-lock"
                             required>
                    </b-input>
                </b-field>

                <b-field label="{{ __('Password') }}"
                         type="{{ $errors->has('password') ? 'is-danger' : null }}"
                         message="{{ $errors->first('password') }}">
                    <b-input type="password"
                             name="password"
                             id="password"
                             value="{{ old('password') }}"
                             maxlength="30"
                             icon="lock"
                             required>
                    </b-input>
                </b-field>
				
				<b-field label="{{ __('Confirm Password') }}"
                         type="{{ $errors->has('password-confirm') ? 'is-danger' : null }}"
                         message="{{ $errors->first('password-confirm') }}">
                    <b-input type="password"
                             name="password-confirm"
                             id="password-confirm"
                             value="{{ old('password-confirm') }}"
                             maxlength="30"
                             icon="lock"
                             required>
                    </b-input>
                </b-field>
                <button type="submit" class="button is-primary is-fullwidth">
                    @lang('Register')
                </button>
            </form>
        </div>
    </div>
@endsection
