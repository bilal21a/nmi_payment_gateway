<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="number"],
        .form-group input[type="date"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .mni_style input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    {{-- @dd($data->nmi_select) --}}
    <div class="container">
        @if (\Session::has('message'))
            @php
                $r = \Session::get('message');
                $msg = $r['responsetext'];
            @endphp
            @if ($msg == 'SUCCESS')
                @php
                    $type = 'success';
                    $msg = 'Payment Successfull';
                @endphp
            @else
                @php
                    $type = 'danger';
                @endphp
            @endif
            <div class="alert alert-{{ $type }}" role="alert">
                {{ $msg }}
            </div>
        @endif
        <div class="alert my_js_alert" role="alert">

        </div>
        <h2>Payment Form (step-2)</h2>
        <a href="{{ route('step_1') }}">New Payment</a>
        <form method="post" action="{{ route('step_2') }}" onsubmit="return validateForm()">
            @csrf
            {{-- <button type="submit" class="btn-submit">Back</button> --}}

            <div class="form-group">
                <label for="product_price">NMI Select*</label>
                <input type="text" id="product_price" value="{{ $data->nmi_select }}" name="product_price" required
                    disabled>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price*</label>
                <input type="text" id="product_price" name="product_price" value="{{ $data->product_price }}"
                    required disabled>
            </div>
            <div class="form-group">
                <label for="first_name">First Name*</label>
                <input type="text" id="first_name" value="{{ $data->first_name }}" name="first_name" required
                    disabled>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name*</label>
                <input type="text" id="last_name" value="{{ $data->last_name }}" name="last_name" required disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="{{ $data->email }}" name="email" disabled>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" value="{{ $data->phone }}" name="phone" disabled>
            </div>
            <div class="form-group">
                <label for="search_address">Search Address*</label>
                <input type="text" id="search_address" value="{{ $data->search_address }}" name="search_address"
                    required disabled>
            </div>
            <div class="form-group">
                <label for="billing_address">Billing Address*</label>
                <textarea id="billing_address" name="billing_address" required disabled>{{ $data->billing_address }}</textarea>
            </div>
            <div class="form-group">
                <label for="country">Country*</label>
                <input type="text" id="country" value="{{ $data->country }}" name="country" required disabled>
            </div>
            <div class="form-group">
                <label for="state">State*</label>
                <input type="text" id="state" value="{{ $data->state }}" name="state" required disabled>
            </div>
            <div class="form-group">
                <label for="city">City*</label>
                <input type="text" id="city" value="{{ $data->city }}" name="city" required disabled>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code*</label>
                <input type="text" id="postal_code" value="{{ $data->postal_code }}" name="postal_code" required
                    disabled>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" disabled>{{ $data->description }}</textarea>
            </div>
        </form>
        <label>Credit Card Number</label>
        <div id="ccnumber" class="mni_style"></div>
        <label>CC EXP</label>
        <div id="ccexp" class="mni_style"></div>
        <label>CVV</label>
        <div id="cvv" class="mni_style"></div>
        <br>
        <button id="payButton" disabled class="btn btn-success">Pay Now</button>
    </div>

    <div id="threeDSMountPoint"></div>
</body>
<script src="https://secure.nmi.com/js/v1/Gateway.js"></script>
<script src="https://secure.nmi.com/token/Collect.js" data-tokenization-key="55JHqV-G43B7Z-2YaQTg-36Azsw"
    data-style-sniffer="true" data-field-ccnumber-selector='.mni_style'></script>
<script>
    function scrollToPosition(position) {
        if (position === 'top') {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        } else if (position === 'bottom') {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        } else {
            console.error('Invalid position parameter. Please use "top" or "bottom".');
        }
    }
    scrollToPosition('bottom')
    const gateway = Gateway.create('checkout_public_G5wT2dCMZ2XyQVsbHdbhbaMq63gQC3N5');
    const threeDS = gateway.get3DSecure();

    window.addEventListener('DOMContentLoaded', () => {
        CollectJS.configure({
            variant: 'inline',
            "fieldsAvailableCallback": function() {
                console.log("Collect.js loaded the fields onto the form");
            },
            'validationCallback': function(field, status, message) {
                if (status) {
                    var message = field + " is now OK: " + message;
                    console.log('field: ', field);
                    $('#payButton').attr('disabled',false)
                    colorizeTextField(field, true, message);
                } else {
                    var message = field + " is now Invalid: " + message;
                    console.log('field: ', field);
                    $('#payButton').attr('disabled',"disabled")
                    colorizeTextField(field, false, message);
                }
                console.log(message);
            },
            "timeoutDuration": 10000,
            "timeoutCallback": function() {
                console.log(
                    "The tokenization didn't respond in the expected timeframe.  This could be due to an invalid or incomplete field or poor connectivity"
                );
            },
            callback: (e) => {

                const options = {
                    paymentToken: e.token,
                    currency: 'USD',
                    amount: "{{ $data->product_price }}",
                    email: "{{ $data->email }}",
                    phone: "{{ $data->phone }}",
                    city: "{{ $data->city }}",
                    state: 'NY',
                    country: "{{ $data->country }}",
                    address1: "{{ $data->billing_address }}",
                    firstName: "{{ $data->first_name }}",
                    lastName: "{{ $data->last_name }}",
                    postalCode: "{{ $data->postal_code }}",
                };

                const threeDSecureInterface = threeDS.createUI(options);
                threeDSecureInterface.on('_debug', e => {
                    const error = e.error;

                    scrollToPosition('top')
                    $('.my_js_alert').addClass('alert-danger')
                    $('.my_js_alert').html(error)
                    console.error('Error:', error);
                })
                threeDSecureInterface.start('#threeDSMountPoint');

                threeDSecureInterface.on('challenge', function(e) {
                    console.log('challenge: ', e);
                    console.log('Challenged');
                });

                threeDSecureInterface.on('complete', function(e) {
                    console.log('complete: ', e);

                    console.log(e);
                    fetch("{{ route('direct_post_back_end') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                ...options,
                                cavv: e.cavv,
                                xid: e.xid,
                                eci: e.eci,
                                cardHolderAuth: e.cardHolderAuth,
                                threeDsVersion: e.threeDsVersion,
                                directoryServerId: e.directoryServerId,
                                cardHolderInfo: e.cardHolderInfo,
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Network response was not ok.');
                        })
                        .then(data => {
                            console.log(data);
                            var type = data.responsetext == "SUCCESS" ? 'success' :
                                'danger'
                            scrollToPosition('top')
                            $('.my_js_alert').addClass('alert-' + type)
                            $('.my_js_alert').html(data.responsetext)
                        })
                        .catch(error => {
                            console.error(
                                'There was a problem with your fetch operation:',
                                error);
                        });

                });

                threeDSecureInterface.on('failure', function(e) {
                    console.log('failure');
                    scrollToPosition('top')
                    $('.my_js_alert').addClass('alert-danger')
                    $('.my_js_alert').html(e.message)
                    console.log(e);
                });
            }
        })

        gateway.on('error', function(e) {
            console.log('error: ', e);
            console.error(e);
        })
    })

    function colorizeTextField(id, isSuccess, message, borderWidth = "1px", borderStyle = "solid", borderColor = "") {
        var textField = document.getElementById(id);
        if (isSuccess) {
            textField.style.borderColor = borderColor || "green";
        } else {
            textField.style.borderColor = borderColor || "red";
        }

        // Set other border properties
        textField.style.borderWidth = borderWidth;
        textField.style.borderStyle = borderStyle;

        // Create or update the message element
        var messageElement = document.getElementById(id + "_message");
        if (!messageElement) {
            messageElement = document.createElement("div");
            messageElement.id = id + "_message";
            textField.parentNode.insertBefore(messageElement, textField.nextSibling);
        }

        messageElement.style.color = isSuccess ? "green" : "red";
        messageElement.textContent = message;
    }
</script>
<script>
    function validateForm() {
        var postalCode = document.getElementById("postal_code").value;

        // Validate postal code format
        var postalCodeRegex = /^\d{5}$/;
        if (!postalCodeRegex.test(postalCode)) {
            alert("Please enter a valid 5-digit postal code.");
            return false;
        }
        return true;
    }
</script>

</html>
