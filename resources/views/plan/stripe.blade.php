@extends('layouts.admin')
@php
    $dir = asset(Storage::url('uploads/plan'));
@endphp
@push('script-page')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    {{-- <script src="https://api.paymentwall.com/brick/build/brick-default.1.5.0.min.js"> </script> --}}
    <script type="text/javascript">
        @if (
            $plan->price > 0.0 &&
                $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                !empty($admin_payment_setting['stripe_key']) &&
                !empty($admin_payment_setting['stripe_secret']))
            var stripe = Stripe('{{ $admin_payment_setting['stripe_key'] }}');
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '14px',
                    color: '#32325d',
                },
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Create a token or display an error when the form is submitted.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $("#card-errors").html(result.error.message);
                        toastrs('Error', result.error.message, 'error');
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        @endif

        $(document).ready(function() {
            $(document).on('click', '.apply-coupon', function() {
                var ele = $(this);
                console.log(ele);
                var coupon = ele.closest('.row').find('.coupon').val();
                $.ajax({
                    url: '{{ route('apply.coupon') }}',
                    datType: 'json',
                    data: {
                        plan_id: '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}',
                        coupon: coupon
                    },
                    success: function(data) {
                        $('.banktransfer-coupon-tr').show();
                        $('.final-price').text(data.final_price);
                        // $('#stripe_coupon/* , #paypal_coupon, #iyzipay_coupon */').val(coupon);

                        if (ele.closest($('#payfast-form')).length == 1) {
                            get_payfast_status(data.price, coupon);
                        }
                        if (data != '') {
                            if (data.is_success == true) {
                                toastrs('Success', data.message, 'success');
                            } else {
                                toastrs('Error', data.message, 'error');
                            }

                        } else {
                            toastrs('Error', "{{ __('Coupon code required.') }}", 'error');
                        }
                    }
                })
            });
        });



        @if (isset($admin_payment_setting['paystack_public_key']))

            $(document).on("click", "#pay_with_paystack", function() {
                $('#paystack-payment-form').ajaxForm(function(res) {
                    if (res.flag == 1) {
                        var paystack_callback = "{{ url('/plan/paystack') }}";
                        var order_id = '{{ time() }}';
                        var coupon_id = res.coupon;
                        var handler = PaystackPop.setup({
                            key: '{{ $admin_payment_setting['paystack_public_key'] }}',
                            email: res.email,
                            amount: res.total_price * 100,
                            currency: res.currency,
                            ref: 'pay_ref_id' + Math.floor((Math.random() * 1000000000) +
                                1
                            ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                            metadata: {
                                custom_fields: [{
                                    display_name: "Email",
                                    variable_name: "email",
                                    value: res.email,
                                }]
                            },

                            callback: function(response) {
                                console.log(response.reference, order_id);
                                window.location.href = paystack_callback + '/' + response
                                    .reference + '/' + '{{ encrypt($plan->id) }}' +
                                    '?coupon_id=' + coupon_id
                            },
                            onClose: function() {
                                alert('window closed');
                            }
                        });
                        handler.openIframe();
                    } else if (res.flag == 2) {

                    }
                    // else {
                    //     toastrs('Error', data.message, 'msg');
                    // }

                }).submit();
            });
        @endif

        @if (isset($admin_payment_setting['flutterwave_public_key']))
            //    Flaterwave Payment
            $(document).on("click", "#pay_with_flaterwave", function() {
                $('#flaterwave-payment-form').ajaxForm(function(res) {
                    if (res.flag == 1) {
                        var coupon_id = res.coupon;
                        var API_publicKey = '{{ $admin_payment_setting['flutterwave_public_key'] }}';
                        var nowTim = "{{ date('d-m-Y-h-i-a') }}";
                        var flutter_callback = "{{ url('/plan/flaterwave') }}";
                        var x = getpaidSetup({
                            PBFPubKey: API_publicKey,
                            customer_email: '{{ Auth::user()->email }}',
                            amount: res.total_price,
                            currency: '{{ \App\Models\Utility::getAdminCurrency() }}',
                            txref: nowTim + '__' + Math.floor((Math.random() * 1000000000)) +
                                'fluttpay_online-' + {{ date('Y-m-d') }},
                            meta: [{
                                metaname: "payment_id",
                                metavalue: "id"
                            }],
                            onclose: function() {},
                            callback: function(response) {
                                var txref = response.tx.txRef;
                                if (
                                    response.tx.chargeResponseCode == "00" ||
                                    response.tx.chargeResponseCode == "0"
                                ) {
                                    window.location.href = flutter_callback + '/' + txref +
                                        '/' +
                                        '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                        coupon_id;
                                } else {
                                    // redirect to a failure page.
                                }
                                x
                                    .close(); // use this to close the modal immediately after payment.
                            }
                        });
                    } else if (res.flag == 2) {

                    } else {
                        toastrs('Error', data.message, 'msg');
                    }

                }).submit();
            });
        @endif

        @if (isset($admin_payment_setting['razorpay_public_key']))
            // Razorpay Payment
            $(document).on("click", "#pay_with_razorpay", function() {
                $('#razorpay-payment-form').ajaxForm(function(res) {
                    if (res.flag == 1) {

                        var razorPay_callback = '{{ url('/plan/razorpay') }}';
                        var totalAmount = res.total_price * 100;
                        var coupon_id = res.coupon;
                        var options = {
                            "key": "{{ $admin_payment_setting['razorpay_public_key'] }}", // your Razorpay Key Id
                            "amount": totalAmount,
                            "name": 'Plan',
                            "currency": '{{ \App\Models\Utility::getAdminCurrency() }}',
                            "description": "",
                            "handler": function(response) {
                                window.location.href = razorPay_callback + '/' + response
                                    .razorpay_payment_id + '/' +
                                    '{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}?coupon_id=' +
                                    coupon_id;
                            },
                            "theme": {
                                "color": "#528FF0"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    } else if (res.flag == 2) {

                    } else {
                        toastrs('Error', data.message, 'msg');
                    }

                }).submit();
            });
        @endif

        @if (
            $admin_payment_setting['is_payfast_enabled'] == 'on' &&
                !empty($admin_payment_setting['payfast_merchant_id']) &&
                !empty($admin_payment_setting['payfast_merchant_key']))
            $(document).ready(function() {
                get_payfast_status(amount = 0, coupon = null);
            })

            function get_payfast_status(amount, coupon) {
                var plan_id = $('#plan_id').val();

                $.ajax({
                    url: '{{ route('payfast.payment') }}',
                    method: 'POST',
                    data: {
                        'plan_id': plan_id,
                        'coupon_amount': amount,
                        'coupon_code': coupon
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        if (data.success == true) {
                            $('#get-payfast-inputs').append(data.inputs);

                        } else {
                            show_toastr('Error', data.inputs, 'error')
                        }
                    }
                });
            }
        @endif
    </script>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
        integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
    </script>
@endpush
@php
    $dir = asset(Storage::url('uploads/plan'));
    $dir_payment = asset(Storage::url('uploads/payments'));
@endphp
@section('page-title')
    {{ __('Order Summary') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{ __('Order Summary') }}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">{{ __('Plan') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('Order Summary') }}</li>
@endsection
@section('action-btn')
@endsection
@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="sticky-top" style="top:30px">
                        <div class="card ">
                            <div class="list-group list-group-flush" id="useradd-sidenav">

                                @if (isset($admin_payment_setting['is_manually_enabled']) && $admin_payment_setting['is_manually_enabled'] == 'on')
                                    <a href="#manually_payment" class="list-group-item list-group-item-action border-0"
                                        data-toggle="tab" role="tab" aria-controls="manually"
                                        aria-selected="true">{{ __('Manually') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif
                                @if (isset($admin_payment_setting['is_bank_transfer_enabled']) &&
                                        $admin_payment_setting['is_bank_transfer_enabled'] == 'on')
                                    <a href="#bank_transfer" class="list-group-item list-group-item-action border-0"
                                        data-toggle="tab" role="tab" aria-controls="bank_transfer" aria-selected="true">
                                        {{ 'Bank Transfer' }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (
                                    $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                                        !empty($admin_payment_setting['stripe_key']) &&
                                        !empty($admin_payment_setting['stripe_secret']))
                                    <a href="#stripe_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Stripe') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (
                                    $admin_payment_setting['is_paypal_enabled'] == 'on' &&
                                        !empty($admin_payment_setting['paypal_client_id']) &&
                                        !empty($admin_payment_setting['paypal_secret_key']))
                                    <a href="#paypal_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Paypal') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (
                                    $admin_payment_setting['is_paystack_enabled'] == 'on' &&
                                        !empty($admin_payment_setting['paystack_public_key']) &&
                                        !empty($admin_payment_setting['paystack_secret_key']))
                                    <a href="#paystack_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Paystack') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                                    <a href="#flutterwave_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Flutterwave') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                                    <a href="#razorpay_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Razorpay') }} <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                                    <a href="#mercado_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Mercado Pago') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                                    <a href="#paytm_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Paytm') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                                    <a href="#mollie_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Mollie') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                                    <a href="#skrill_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Skrill') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                                    <a href="#coingate_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Coingate') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on')
                                    <a href="#paymentwall_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Paymentwall') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on')
                                    <a href="#toyyibpay_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Toyyibpay') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on')
                                    <a href="#payfast-payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Payfast') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on')
                                    <a href="#iyzipay-payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Iyzipay') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on')
                                    <a href="#sspay_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Sspay') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on')
                                    <a href="#paytab_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Paytab') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on')
                                    <a href="#benefit_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Benefit') }}
                                        <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                                    </a>
                                @endif

                                @if (isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on')
                                    <a href="#cashfree_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Cashfree') }} <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on')
                                    <a href="#aamarpay_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('Aamarpay') }} <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                                @if (isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on')
                                    <a href="#paytr_payment"
                                        class="list-group-item list-group-item-action border-0">{{ __('PayTr') }} <div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                @if(isset($admin_payment_setting['is_yookassa_enabled']) && $admin_payment_setting['is_yookassa_enabled'] == 'on')
                                    <a href="#yookassa_payment"
                                       class="list-group-item list-group-item-action border-0">{{ __('Yookassa') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                @if(isset($admin_payment_setting['is_midtrans_enabled']) && $admin_payment_setting['is_midtrans_enabled'] == 'on')
                                    <a href="#midtrans_payment"
                                       class="list-group-item list-group-item-action border-0">{{ __('Midtrans') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif
                                @if(isset($admin_payment_setting['is_xendit_enabled']) && $admin_payment_setting['is_xendit_enabled'] == 'on')
                                    <a href="#xendit_payment"
                                       class="list-group-item list-group-item-action border-0">{{ __('Xendit') }}<div
                                            class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                                @endif

                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="card price-card price-1 wow animate__fadeInUp" data-wow-delay="0.2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-body">
                                    <span class="price-badge bg-primary">{{ $plan->name }}</span>
                                    @if (\Auth::user()->type == 'Owner' && \Auth::user()->plan == $plan->id)
                                        <div class="d-flex flex-row-reverse m-0 p-0 ">
                                            <span class="d-flex align-items-center ">
                                                <i class="f-10 lh-1 fas fa-circle text-success"></i>
                                                <span class="ms-2">{{ __('Active') }}</span>
                                            </span>
                                        </div>
                                    @endif

                                    <div class="text-end">
                                        <div class="">
                                            @if (\Auth::user()->type == 'super admin')
                                                <a title="Edit Plan" data-size="lg" href="#" class="action-item"
                                                    data-url="{{ route('plans.edit', $plan->id) }}"
                                                    data-ajax-popup="true" data-title="{{ __('Edit Plan') }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Edit Plan') }}"><i class="fas fa-edit"></i></a>
                                            @endif
                                        </div>
                                    </div>

                                    <h3 class="mb-4 f-w-600  ">
                                        {{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price . ' / ' . __(\App\Models\Plan::$arrDuration[$plan->duration]) }}</small>
                                    </h3>
                                    {{-- <p class="mb-0">
                                        {{ __('Trial : ') . $plan->trial_days . __(' Days') }}<br />
                                    </p> --}}
                                    @if ($plan->description)
                                        <p class="mb-0">
                                            {{ $plan->description }}<br />
                                        </p>
                                    @endif
                                    <ul class="list-unstyled my-5">
                                        <li>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ $plan->max_employee == '-1' ? __('Unlimited') : $plan->max_employee }}
                                            {{ __('Employee') }}
                                        </li>
                                        <li>
                                            <span class="theme-avtar">
                                                <i class="text-primary ti ti-circle-plus"></i></span>
                                            {{ $plan->max_client == '-1' ? __('Unlimited') : $plan->max_client }}
                                            {{ __('Clients') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xl-9">
                    {{-- Manually payment End --}}
                    @if (isset($admin_payment_setting['is_manually_enabled']) && $admin_payment_setting['is_manually_enabled'] == 'on')
                        <div class="card" id="manually_payment">
                            <div class="card-header">
                                <h5 class="h6 mb-0">{{ __('Manually') }}</h5>
                            </div>
                            <div class="card-body">
                                {{ __('Request manual payment for the planned amount for the subscriptions plan.') }}
                            </div>
                            <div class="card-footer text-end">
                                @if (\Auth::user()->requested_plan != $plan->id)
                                    <a href="{{ route('send.request', [\Illuminate\Support\Facades\Crypt::encrypt($plan->id)]) }}"
                                        class="btn btn-primary btn-icon" data-title="{{ __('Send Request') }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ __('Send Request') }}">{{ __('Send Request') }}</a>
                                @else
                                    <a href="{{ route('request.cancel', \Auth::user()->id) }}"
                                        class="btn btn-danger btn-icon" data-title="{{ __('Cancle Request') }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="{{ __('Cancle Request') }}">
                                        {{ __('Cancle Request') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                    {{-- Manually payment End --}}

                    {{-- Bank Transfer payment Start --}}
                    @if (isset($admin_payment_setting['is_bank_transfer_enabled']) &&
                            $admin_payment_setting['is_bank_transfer_enabled'] == 'on')
                        <div class="card" id="bank_transfer">
                            <div class="card-header">
                                <h5 class="h6 mb-0">{{ __('Bank Transfer') }}</h5>
                            </div>
                            <form action="{{ route('banktrasfer.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! isset($admin_payment_setting['bank_details']) ? $admin_payment_setting['bank_details'] : '' !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment_recipt"
                                                class="form-label">{{ __('Payment Receipt :') }}</label>
                                            <input type="file" name="payment_recipt" class="form-control">
                                        </div>
                                    </div><br><br>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="banktransfer_coupon"
                                                class="form-control-label">{{ __('Coupon') }}</label>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-md-11">
                                                <div class="form-group">
                                                    <input type="text" id="banktransfer_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group apply-banktransfer-btn-coupon">
                                                    {{-- <a data-from="banktransfer" class="btn btn-sm btn-primary apply-coupon"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Apply') }}"><i class="ti ti-device-floppy"></i></a> --}}
                                                    <a data-from="banktransfer"
                                                        class="btn btn-primary align-items-center apply-coupon text-white">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>{{ __('Plan Price') }}</b> : <b
                                                    class="">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</b>
                                            </div>
                                            <div class="col-md-6 banktransfer-coupon-tr" style="display:none">
                                                <b>{{ __('Net Amount') }}</b> : <b class="final-price"></b><br>
                                                <small>{{ __('(After Apply Coupon)') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="hidden" id="banktransfer" value="banktransfer"
                                        name="payment_processor" class="custom-control-input">
                                    <input type="hidden" name="plan_id"
                                        value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="mdi mdi-cash-multiple mr-1"></i> {{ __('Pay Now') }} (<span
                                            class="final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Bank Transfer payment End --}}

                    {{-- stripe payment --}}
                    @if (
                        $admin_payment_setting['is_stripe_enabled'] == 'on' &&
                            !empty($admin_payment_setting['stripe_key']) &&
                            !empty($admin_payment_setting['stripe_secret']))
                        <div id="stripe_payment" class="card">
                            <div class="card-header">
                                <h5>{{ __('Stripe') }}</h5>
                            </div>
                            <div class="tab-pane {{ ($admin_payment_setting['is_stripe_enabled'] == 'on' && !empty($admin_payment_setting['stripe_key']) && !empty($admin_payment_setting['stripe_secret'])) == 'on' ? 'active' : '' }}"
                                id="stripe_payment">
                                <form role="form" action="{{ route('stripe.post') }}" method="post"
                                    class="require-validation" id="payment-form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="custom-radio">
                                                    <label
                                                        class="font-16 font-weight-bold">{{ __('Credit / Debit Card') }}</label>
                                                </div>
                                                <p class="mb-0 pt-1 text-sm">
                                                    {{ __('Safe money transfer using your bank account. We support Mastercard, Visa, Discover and American express.') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="card-name-on"
                                                        class="form-label text-dark">{{ __('Name on card') }}</label>
                                                    <input type="text" name="name" id="card-name-on"
                                                        class="form-control required"
                                                        placeholder="{{ \Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div id="card-element">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <div id="card-errors" role="alert"></div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="stripe_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="stripe_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group{{--  apply-stripe-btn-coupon --}}">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="stripe">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right stripe-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="stripe-coupon-price"></b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-12">
                                                <div class="float-end">
                                                    <input type="hidden" id="stripe" value="stripe"
                                                        name="payment_processor" class="custom-control-input">
                                                    <input type="hidden" name="plan_id"
                                                        value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                    <button class="btn btn-primary d-flex align-items-center"
                                                        type="submit">
                                                        <i class="mdi mdi-cash-multiple mr-1"></i> {{ __('Pay Now') }}
                                                        (<span
                                                            class="stripe-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    {{-- stripr payment end --}}

                    {{-- paypal Start --}}
                    @if (isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on')
                        <div id="paypal_payment" class="card ">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="paypal-payment-form" action="{{ route('plan.pay.with.paypal') }}">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Paypal') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan paypal payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paypal_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paypal_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group {{-- apply-paypal-btn-coupon --}}">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="paypal">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paypal-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="paypal-coupon-price"></b>
                                            </div>

                                            <div class=" mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- paypal end --}}

                    {{-- Paystack Start --}}
                    @if (isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on')
                        <div id="paystack_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.paystack') }}" method="post"
                                id="paystack-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Paystack') }}</h5>
                                    <small
                                        class="text-muted">{{ __('Details about your plan Paystack payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paystack_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paystack_coupon" name="coupon"
                                                        class="form-control coupon" data-from="paystack"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group {{-- apply-paystack-btn-coupon --}}">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="paystack">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paystack-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="paystack-coupon-price"></b>
                                            </div>
                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="button" id="pay_with_paystack">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="paystack-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Paystack end --}}

                    {{-- Flutterwave --}}
                    @if (isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on')
                        <div id="flutterwave_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.flaterwave') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="flaterwave-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Flutterwave') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="flaterwave_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="flaterwave_coupon" name="coupon"
                                                        class="form-control coupon" data-from="flaterwave"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="flaterwave">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right flaterwave-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="flaterwave-coupon-price"></b>
                                            </div>
                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="button" id="pay_with_flaterwave">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="flaterwave-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Flutterwave END --}}

                    {{-- Razorpay --}}
                    @if (isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on')
                        <div id="razorpay_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.razorpay') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="razorpay-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Razorpay') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="razorpay_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="razorpay_coupon" name="coupon"
                                                        class="form-control coupon" data-from="razorpay"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary  align-items-center apply-coupon text-white"
                                                        data-from="razorpay">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right razorpay-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="razorpay-coupon-price"></b>
                                            </div>
                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="button" id="pay_with_razorpay">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="razorpay-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Razorpay end --}}

                    {{-- Mercado Pago --}}
                    @if (isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on')
                        <div id="mercado_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.mercado') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Mercado Pago') }}</h5>
                                    <!-- <small class="text-muted">{{ __('Details about your plan Mercado Pago payment') }}</small> -->
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mercado_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="mercado_coupon" name="coupon"
                                                        class="form-control coupon" data-from="mercado"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="mercado">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right mercado-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="mercado-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_paytm">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="mercado-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Mercado Pago end --}}

                    {{-- Paytm --}}
                    @if (isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on')
                        <div id="paytm_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.paytm') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="paytm-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Paytm') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan Paytm payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paytm_coupon"
                                                        class="form-label text-dark">{{ __('Mobile Number') }}</label>
                                                    <input type="text" id="mobile" name="mobile"
                                                        class="form-control mobile" data-from="mobile"
                                                        placeholder="{{ __('Enter Mobile Number') }}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paytm_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paytm_coupon" name="coupon"
                                                        class="form-control coupon" data-from="paytm"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="paytm">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paytm-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="paytm-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_paytm">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="paytm-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Paytm end --}}

                    {{-- Mollie Start --}}
                    @if (isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on')
                        <div id="mollie_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.mollie') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="mollie-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Mollie') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan Mollie payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="mollie_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="mollie_coupon" name="coupon"
                                                        class="form-control coupon" data-from="mollie"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="mollie">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right mollie-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="mollie-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_mollie">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="mollie-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Mollie end --}}

                    {{-- Skrill --}}
                    @if (isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on')
                        <div id="skrill_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.skrill') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="skrill-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Skrill') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan Skrill payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="skrill_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="skrill_coupon" name="coupon"
                                                        class="form-control coupon" data-from="skrill"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="skrill">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right skrill-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="skrill-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_skrill">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="skrill-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $skrill_data = [
                                                'transaction_id'    =>   md5(date('Y-m-d') . strtotime('Y-m-d H:i:s') . 'user_id'),
                                                'user_id'           =>   'user_id',
                                                'amount'            =>   'amount',
                                                'currency'          =>   'currency',
                                            ];
                                            session()->put('skrill_data', $skrill_data);
                                        @endphp
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Skrill end --}}

                    {{-- Coingate --}}
                    @if (isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on')
                        <div id="coingate_payment" class="card ">
                            <form role="form" action="{{ route('plan.pay.with.coingate') }}" method="post"
                                class="w3-container w3-display-middle w3-card-4" id="coingate-payment-form">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Coingate') }}</h5>
                                    <small
                                        class="text-muted">{{ __('Details about your plan Coingate payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="coingate_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="coingate_coupon" name="coupon"
                                                        class="form-control coupon" data-from="coingate"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="form-group pt-3 mt-3">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="coingate">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right coingate-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="coingate-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_coingate">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="coingate-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Coingate end --}}

                    {{-- Paymentwall --}}
                    @if (isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on')
                        <div id="paymentwall_payment" class="card ">
                            <form role="form" action="{{ route('plan.paymentwallpayment') }}" method="post"
                                id="paymentwall-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('PaymentWall') }}</h5>
                                    <small
                                        class="text-muted">{{ __('Details about your plan PaymentWall payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paymentwall_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paymentwall_coupon" name="coupon"
                                                        class="form-control coupon" data-from="paymentwall"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-paymentwall-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="paymentwall">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paymentwall-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="paymentwall-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_paymentwall">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="paymentwall-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Paymentwall end --}}

                    {{-- Toyyibpay --}}
                    @if (isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on')
                        <div id="toyyibpay_payment" class="card">
                            <form role="form" action="{{ route('plan.pay.with.toyyibpay') }}" method="post"
                                id="toyyibpay-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Toyyibpay') }}</h5>
                                    <small
                                        class="text-muted">{{ __('Details about your plan Toyyibpay payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="toyyibpay_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="toyyibpay_coupon" name="coupon"
                                                        class="form-control coupon" data-from="toyyibpay"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-toyyibpay-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="toyyibpay">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right toyyibpay-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="toyyibpay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_toyyibpay">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="toyyibpay-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Toyyibpay end --}}

                    {{-- Payfast --}}

                    @if (isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on')
                        <div class="" id="payfast-payment">
                            @php
                                $pfHost = $admin_payment_setting['payfast_mode'] == 'sandbox' ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
                            @endphp
                            <form role="form" action={{ 'https://' . $pfHost . '/eng/process' }} method="post"
                                class="require-validation" id="payfast-form">
                                {{-- <form action="{{ route('payfast.payment') }}" role="form" method="post" class="required-validation" id="payfast-payment-form"> --}}
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>{{ __('Payfast') }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="py-3 payfast-payment-div">
                                                    <div class="form-group">
                                                        <label for="payfast_coupon" class="form-control-label text-dark">
                                                            {{ __('Coupon') }} </label>
                                                    </div>
                                                    <div class="row align-item-center">
                                                        <div class="col-md-11">
                                                            <div class="form-group">
                                                                <input type="text" id="payfast-coupon" name="coupon"
                                                                    class="form-control coupon" data-from="payfast"
                                                                    placeholder="{{ __('Enter Coupon Code') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                                    data-from="payfast">{{ __('Apply') }}</a>
                                                                {{-- <a href="#" data-from="payfast" data-from="payfast" class="btn btn-sm btn-primary apply-coupon"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Apply') }}"><i class="ti ti-device-floppy"></i></a> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right payfast-coupon-tr"
                                                            style="display: none">
                                                            <b>{{ __('Coupon Discount') }}</b> : <b
                                                                class="payfast-coupon-price"></b>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="error" style="display: none;">
                                                                <div class='alert-danger alert'>
                                                                    {{ __('Please correct the errors and try again.') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="get-payfast-inputs"></div>
                                                    <div class="mt-2">
                                                        <div class="col-sm-12">
                                                            <div class="float-end">
                                                                <input type="hidden" name="plan_id" id="plan_id"
                                                                    value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                                <button class="btn btn-primary" type="submit"
                                                                    id="pay_with_payfast">
                                                                    <i class="mdi mdi-cash-multiple mr-1"></i>
                                                                    {{ __('Pay Now') }} (<span
                                                                        class="payfast-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="error" style="display: none;">
                                                                <div class='alert-danger alert'>
                                                                    {{ __('Please correct the errors and try again.') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- Payfast end --}}

                    {{-- iyzipay Start --}}
                    @if (isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on')
                        <div id="iyzipay-payment" class="card ">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="iyzipay-payment-form" action="{{ route('plan.pay.with.iyzipay') }}">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('iyzipay') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan iyzipay payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="iyzipay_coupon"
                                                        class="form-label">{{ __('Coupon') }}</label>
                                                    <input type="text" id="iyzipay_coupon" name="coupon"
                                                        class="form-control coupon"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-iyzipay-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="iyzipay">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right iyzipay-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="coupon-price"></b>
                                            </div>

                                            <div class=" mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- iyzipay end --}}

                    {{-- sspay --}}
                    @if (isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on')
                        <div id="sspay_payment" class="card">
                            <form role="form" action="{{ route('plan.pay.with.sspay') }}" method="post"
                                id="sspay-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('sspay') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan sspay payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="sspay_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="sspay_coupon" name="coupon"
                                                        class="form-control coupon" data-from="sspay"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-sspay-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="sspay">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right sspay-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="sspay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_sspay">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="sspay-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- sspay end --}}

                    {{-- paytab start --}}

                    @if (isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on')
                        <div id="paytab_payment" class="card">
                            <form role="form" action="{{ route('plan.pay.with.paytab') }}" method="post"
                                id="paytab-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Paytab') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan paytab payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paytab_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paytab_coupon" name="coupon"
                                                        class="form-control coupon" data-from="paytab"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-paytab-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="paytab">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paytab-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="paytab-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_paytab">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="paytab-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- paytab end --}}

                    {{-- benefit start --}}

                    @if (isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on')
                        <div id="benefit_payment" class="card">
                            <form role="form" action="{{ route('benefit.initiate') }}" method="post"
                                id="benefit-payment-form" class="w3-container w3-display-middle w3-card-4">
                                @csrf
                                <div class="card-header">
                                    <h5>{{ __('Benefit') }}</h5>
                                    <small class="text-muted">{{ __('Details about your plan benefit payment') }}</small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="benefit_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="benefit_coupon" name="coupon"
                                                        class="form-control coupon" data-from="benefit"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group apply-benefit-btn-coupon">
                                                    <a class="btn btn-primary align-items-center apply-coupon text-white"
                                                        data-from="benefit">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right benefit-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b class="benefit-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit" id="pay_with_benefit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }} (<span
                                                                class="benefit-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- benefit end --}}

                    {{-- cashfree start --}}
                    @if (isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on')
                        <div id="cashfree_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="cashfree-payment-form" action="{{ route('plan.pay.with.cashfree') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('Cashfree') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="cashfree_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="cashfree_coupon" name="coupon"
                                                        class="form-control coupon" data-from="cashfree"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-cashfree-btn-coupon">
                                                    <a href="#"
                                                        class="btn btn-primary align-items-center apply-coupon"
                                                        data-from="cashfree">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right cashfree-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="iyzipay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="cashfree-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- cashfree end --}}

                    {{-- aamarpay start  --}}
                    @if (isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on')
                        <div id="aamarpay_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="aamarpay-payment-form" action="{{ route('plan.pay.with.aamarpay') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('Aamarpay') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="aamarpay_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="aamarpay_coupon" name="coupon"
                                                        class="form-control coupon" data-from="aamarpay"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-aamarpay-btn-coupon">
                                                    <a href="#"
                                                        class="btn btn-primary align-items-center apply-coupon"
                                                        data-from="aamarpay">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right aamarpay-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="iyzipay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="aamarpay-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- aamarpay end  --}}

                    {{-- paytr start  --}}
                    @if (isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on')
                        <div id="paytr_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="paytr-payment-form" action="{{ route('plan.pay.with.paytr') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('PayTr') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paytr_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="paytr_coupon" name="coupon"
                                                        class="form-control coupon" data-from="paytr"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-paytr-btn-coupon">
                                                    <a href="#"
                                                        class="btn btn-primary align-items-center apply-coupon"
                                                        data-from="paytr">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right paytr-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="iyzipay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="paytr-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- paytr end  --}}

                    {{--Yookassa--}}
                    @if (isset($admin_payment_setting['is_yookassa_enabled']) && $admin_payment_setting['is_yookassa_enabled'] == 'on')
                        <div id="yookassa_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="yookassa-payment-form" action="{{ route('plan.pay.with.yookassa') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('Yookassa') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="yookassa_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="yookassa_coupon" name="coupon"
                                                        class="form-control coupon" data-from="yookassa"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-yookassa-btn-coupon">
                                                    <a href="#"
                                                        class="btn btn-primary align-items-center apply-coupon"
                                                        data-from="yookassa">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right yookassa-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="iyzipay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="yookassa-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{--Yookassa end --}}

                    {{--Midtrans--}}
                    @if (isset($admin_payment_setting['is_midtrans_enabled']) && $admin_payment_setting['is_midtrans_enabled'] == 'on')
                        <div id="midtrans_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="midtrans-payment-form" action="{{ route('plan.pay.with.midtrans') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('Midtrans') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="midtrans_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="midtrans_coupon" name="coupon"
                                                        class="form-control coupon" data-from="midtrans"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-midtrans-btn-coupon">
                                                    <a
                                                        class="btn btn-primary text-white align-items-center apply-coupon"
                                                        data-from="midtrans">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right midtrans-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="midtrans-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="midtrans-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{--Midtrans end --}}

                    {{--Xendit--}}
                    @if (isset($admin_payment_setting['is_xendit_enabled']) && $admin_payment_setting['is_xendit_enabled'] == 'on')
                        <div id="xendit_payment" class="card shadow-none rounded-0 border-bottom">
                            <form class="w3-container w3-display-middle w3-card-4" method="POST"
                                id="xendit-payment-form" action="{{ route('plan.pay.with.xendit') }}">
                                @csrf <div class="card-header">
                                    <h5>{{ __('Xendit') }}</h5>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="xendit_coupon"
                                                        class="form-label text-dark">{{ __('Coupon') }}</label>
                                                    <input type="text" id="xendit_coupon" name="coupon"
                                                        class="form-control coupon" data-from="xendit"
                                                        placeholder="{{ __('Enter Coupon Code') }}">
                                                </div>
                                            </div>
                                            <div class="col-auto coupon-apply-btn">
                                                <div class="form-group pt-3 mt-3 apply-xendit-btn-coupon">
                                                    <a href="#"
                                                        class="btn btn-primary align-items-center apply-coupon"
                                                        data-from="xendit">{{ __('Apply') }}</a>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right xendit-coupon-tr" style="display: none">
                                                <b>{{ __('Coupon Discount') }}</b> : <b
                                                    class="iyzipay-coupon-price"></b>
                                            </div>

                                            <div class="mt-2">
                                                <div class="col-sm-12">
                                                    <div class="float-end">
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ \Illuminate\Support\Facades\Crypt::encrypt($plan->id) }}">
                                                        <button class="btn btn-primary d-flex align-items-center"
                                                            type="submit">
                                                            <i class="mdi mdi-cash-multiple mr-1"></i>
                                                            {{ __('Pay Now') }}
                                                            (<span
                                                                class="xendit-final-price">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}{{ $plan->price }}</span>)
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="error" style="display: none;">
                                                    <div class='alert-danger alert'>
                                                        {{ __('Please correct the errors and try again.') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{--Xendit end --}}
                </div>
            </div>
        </div>
    </div>

@endsection
