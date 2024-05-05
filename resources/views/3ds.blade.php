<html>

<body>
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
                        email: 'none@example.com',
                        phone: '8008675309',
                        city: 'New York',
                        state: 'NY',
                        address1: '123 Fist St.',
                        country: 'US',
                        firstName: 'John',
                        lastName: 'Doe',
                        postalCode: '60001'
                    };

                    const threeDSecureInterface = threeDS.createUI(options);
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
