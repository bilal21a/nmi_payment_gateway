<html>
    <body>
    <script src="https://secure.networkmerchants.com/js/v1/Gateway.js"></script>
    <script>
        // Initialize Gateway.js
        var checkout_key = "{{ env('PUBLIC_CHECKOUT') }}";
        console.log('checkout_key: ', checkout_key);
        const gateway = Gateway.create(checkout_key);

        // Initialize the ThreeDSService
        const threeDS = gateway.get3DSecure();

        // Create a 3DS Frame
        // This will start out 0px x 0px during fingerprinting.
        // If the customer is prompted to complete a challenge, it will resize automatically.
        const options = {
            // cardNumber: "4111111111111111",
            cardNumber: "4000000000002503",
            cardExpMonth: "01",
            cardExpYear: "2024",
            currency: 'USD',
            amount: '1',
            email: 'none@example.com',
            phone: '8008675309',
            city: 'New York',
            state: 'NY',
            address1: '123 First St.',
            country: 'US',
            firstName: 'Billal',
            lastName: 'Bhai',
            postalCode: '60001'
        };

        const threeDSecureInterface  = threeDS.createUI(options);

        // Mount the threeDSecureInterface to the DOM
        // This begins the collection of 3DS data.
        threeDSecureInterface.start('body');

        // Listen for the threeDSecureInterface to ask the user for a password
        threeDSecureInterface.on('challenge', function(e) {
            console.log('Challenged');
        });

        // Listen for the threeDSecureInterface to provide all the needed 3DS data
        threeDSecureInterface.on('complete', function(e) {
            fetch("{{ route('payment_done') }}", {
                method: 'POST',
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

        // Listen for the threeDSecureInterface to indicate that the customer
        // has failed to authenticate
        threeDSecureInterface.on('failure', function(e) {
            console.log('failure');
            console.log(e);
        });

        // Listen for any errors that might occur.
        gateway.on('error', function (e) {
            console.error(e);
        })
    </script>
    </body>
</html>
