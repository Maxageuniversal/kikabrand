<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <section class="checkout">
        <h2>Checkout</h2>
        <form action="{{ route('place.order') }}" method="POST">
            @csrf

            <h3>Customer Information</h3>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="shipping_address">Shipping Address</label>
                <textarea name="shipping_address" id="shipping_address" required></textarea>
            </div>

            <h3>Order Summary</h3>
            <button type="submit">Place Order</button>
        </form>
    </section>

    <!-- resources/views/checkout.blade.php -->
    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <button type="button" onClick="makePayment()">Pay Now</button>

    <script>
        function makePayment() {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-xxxx",
                tx_ref: "unique_ref",
                amount: 5000,
                currency: "NGN",
                payment_options: "card",
                customer: {
                    email: "customer@example.com",
                    phonenumber: "08102909304",
                    name: "John Doe",
                },
                callback: function(data) {
                    console.log(data);
                    // Handle response here
                },
                customizations: {
                    title: "Beads by Kika",
                    description: "Payment for items in cart",
                },
            });
        }
    </script>

</body>

</html>
