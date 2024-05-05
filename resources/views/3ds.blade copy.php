<html>

<body>

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


    <label>Credit Card Number</label>
    <div id="ccnumber"></div>
    <label>CC EXP</label>
    <div id="ccexp"></div>
    <label>CVV</label>
    <div id="cvv"></div>
    <button id="payButton">Pay Now</button>

    <div id="threeDSMountPoint"></div>
    <script src="https://secure.nmi.com/js/v1/Gateway.js"></script>
    <script src="https://secure.nmi.com/token/Collect.js" data-tokenization-key="55JHqV-G43B7Z-2YaQTg-36Azsw"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        const gateway = Gateway.create('checkout_public_G5wT2dCMZ2XyQVsbHdbhbaMq63gQC3N5');
        const threeDS = gateway.get3DSecure();

        window.addEventListener('DOMContentLoaded', () => {
            CollectJS.configure({
                variant: 'inline',
                callback: (e) => {

                    const options = {
                        paymentToken: e.token,
                        currency: 'USD',
                        amount: '1000',
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        city: $('#city').val(),
                        state: $('#state').val(),
                        address1: $('#billing_address').val(),
                        country: $('#country').val(),
                        firstName: $('#firstName').val(),
                        lastName: $('#last_name').val(),
                        postalCode: $('#postal_code').val()
                    };

                    const threeDSecureInterface = threeDS.createUI(options);
                    console.log('threeDSecureInterface: ', threeDSecureInterface);
                    threeDSecureInterface.start('#threeDSMountPoint');

                    threeDSecureInterface.on('challenge', function(e) {
                        console.log('challenge: ', e);
                        console.log('Challenged');
                    });

                    console.log('threeDSecureInterface: ', threeDSecureInterface);
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
                    });

                    threeDSecureInterface.on('failure', function(e) {
                        console.log('failure');
                        console.log(e);
                    });
                }
            })

            gateway.on('error', function(e) {
                console.log('error: ', e);

                console.error(e);
            })
        })
    </script>
</body>

</html>
