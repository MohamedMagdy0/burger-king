@extends('layouts.frontend.master_app')
@section('page_title')
    Payment
@endsection

@section('content')


    <section class="container">
        <div class=" text-center" style="margin-top: 40px; margin-bottom: 40px;">
            <h3 style="margin-bottom: 20px;">payment</h1>

                @if (Session::has('total_price') && Session::get('total_price') != 0)
                    @if (Session::has('order_id') && Session::get('order_id') != null)
                        <h3 class="text-danger" style="margin-bottom: 30px; font-weight: bold">Tolal : ${{ Session::get('total_price') }}</h3>
                        <div id="paypal-button-container"></div> <!-- paypal btn -->

                    @endif
                @endif
        </div>

    </section><!-- container -->








    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZg6BEWmVQ73auLsvHmTr0UUL34uBnwYOky6adoWPnC-wsxrYZQbfd7aUyHo6PkrdXqSXhqd7F9GaFpH&currency=USD"></script>
    <!-- Set up a container element for the button -->

    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{ Session::get('total_price') }}' // Can also reference a variable or function
              }
            }]
          });
        },




        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            //  here code to return to verify payment

            window.location.href ="/burgers/verify_payment/"+transaction.id


            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>



@endsection
