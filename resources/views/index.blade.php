<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYImOHMtONaIqWmWyEdfPH2vKn6GZE9I4&libraries=places">
        </script>
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
    </style>
</head>

<body>
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
        <h2>Payment Form</h2>
        <form method="post" action="{{ route('payment_save') }}" onsubmit="return validateForm()">
            @csrf

            <div class="form-group">
                <label for="select_pay">Select Payy*</label>
                <select id="nmi_select" name="nmi_select" required>
                    <option value="CMS NMI">CMS Pay</option>
                    <option value="USPowerEnergy">USPowerEnergy</option>
                    <option value="NAGlobalsLLC">NAGlobalsLLC</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="nmi_select">NMI Select*</label>
                <select id="nmi_select" name="nmi_select" required>
                    <option value="izziventures">Izziventures</option>
                    <option value="USPowerEnergy">USPowerEnergy</option>
                    <option value="NAGlobalsLLC">NAGlobalsLLC</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price*</label>
                <input type="text" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name*</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name*</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="search_address">Search Address*</label>
                <input type="text" id="search_address" name="search_address" required>
            </div>
            <div class="form-group">
                <label for="billing_address">Billing Address*</label>
                <textarea id="billing_address" name="billing_address" required></textarea>
            </div>
            <div class="form-group">
                <label for="country">Country*</label>
                <input type="text" id="country" name="country" required>
            </div>
            <div class="form-group">
                <label for="state">State*</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="city">City*</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code*</label>
                <input type="text" id="postal_code" name="postal_code" required>
            </div>

            <div class="form-group">
                <label for="card_number">Card Number*</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>
            <div class="form-group">
                <label for="expiry_month">Expiry Month*</label>
                <select id="expiry_month" name="expiry_month" required>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>

                    <!-- Add other months -->
                </select>
            </div>
            <div class="form-group">
                <label for="expiry_year">Expiry Year*</label>
                <select id="expiry_year" name="expiry_year" required>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                    <option value="2036">2036</option>
                    <option value="2037">2037</option>
                    <option value="2038">2038</option>
                    <option value="2039">2039</option>
                    <option value="2040">2040</option>
                    <option value="2041">2041</option>
                    <option value="2042">2042</option>
                    <!-- Add other years -->
                </select>
            </div>
            <div class="form-group">
                <label for="cvv">CVV*</label>
                <input type="text" id="cvv" name="cvv" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn-submit pay_btn">Submit</button>
            <button class="btn btn-success loading_btn" style="display: none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        // Initialize Google Places Autocomplete
        var autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('search_address'), {
                types: ['geocode']
            }
        );

        // Fill other fields when address is selected
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                console.log("Place details not available");
                return;
            }

            $('#billing_address').val(place.formatted_address);

            // Fill other fields if available
            $.each(place.address_components, function(index, component) {
                var addressType = component.types[0];
                if (addressType === 'country') {
                    $('#country').val(component.short_name);
                } else if (addressType === 'administrative_area_level_1') {
                    $('#state').val(component.short_name);
                } else if (addressType === 'locality') {
                    $('#city').val(component.long_name);
                } else if (addressType === 'postal_code') {
                    $('#postal_code').val(component.long_name);
                }
            });
        });
    });

    function validateForm() {
        myloader("show")
        var cardNumber = document.getElementById("card_number").value;
        var cvv = document.getElementById("cvv").value;
        var postalCode = document.getElementById("postal_code").value;

        // Validate card number format
        // var cardNumberRegex = /^\d{16}$/;
        // if (!cardNumberRegex.test(cardNumber)) {
        //     alert("Please enter a valid 16-digit card number.");
        //     return false;
        // }

        // Validate CVV format
        var cvvRegex = /^\d{3}$/;
        if (!cvvRegex.test(cvv)) {
            alert("Please enter a valid 3-digit CVV.");
            myloader("hide")
            return false;
        }

        // Validate postal code format
        var postalCodeRegex = /^\d{5}$/;
        if (!postalCodeRegex.test(postalCode)) {
            alert("Please enter a valid 5-digit postal code.");
            myloader("hide")
            return false;
        }
        myloader("show")
        return true;
    }
    function myloader(type) {
        if (type == "show") {
            $('.loading_btn').show()
            $('.pay_btn').hide()
        }
        if (type == "hide") {
            $('.pay_btn').show()
            $('.loading_btn').hide()
        }
    }
</script>

</html>
