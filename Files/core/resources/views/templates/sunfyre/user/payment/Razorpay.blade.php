@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card custom--card">
                <div class="card-header text-center">
                    <h5 class="card-title">@lang('Razorpay')</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush payment-list">
                        <li class="list-group-item d-flex justify-content-between flex-wrap px-0">
                            @lang('You have to pay '):
                            <strong>{{ showAmount($deposit->final_amount, currencyFormat:false) }} {{ __($deposit->method_currency) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between flex-wrap px-0">
                            @lang('You will get '):
                            <strong>{{ showAmount($deposit->amount) }}</strong>
                        </li>
                    </ul>
                    <form action="{{ $data->url }}" method="{{ $data->method }}">
                        <input name="hidden" type="hidden" custom="{{ $data->custom }}">
                        <script src="{{ $data->checkout_js }}" @foreach ($data->val as $key => $value)
                        data-{{ $key }}="{{ $value }}" @endforeach></script>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        input:focus {
            border: none !important;
        }

        .razorpay-payment-button {
            border: none;
        }

        .razorpay-payment-button:hover {
            border: none;
        }
    </style>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            $('input[type="submit"]').addClass("mt-3 btn btn--base w-100");
        })(jQuery);
    </script>
@endpush
