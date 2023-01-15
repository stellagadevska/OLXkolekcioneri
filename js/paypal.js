function rendePayPal(total) {
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: total,
            currency: 'EUR'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.location.replace("success.php")
      });
    }
  }, '#paypal-button');

}

function renderStripe(orderValue) {
    var stripe = Stripe("pk_test_51I3Ox3KN91OLZtDtpbk6Mcc7jqK651gDdBeDrxxmUxkJGaXTYAWxRiZxyZ4m2VOCsrkTETyWR7ynNqJXGB83WqvR00Dkzdr19u");
    var checkoutButton = document.getElementById("card-button");

    checkoutButton.addEventListener("click", function () {
        //var orderValue = 25000;
        var orderId = "";
        var ajaxCallToA = $.ajax({
          url: './stripe/create-checkout-session.php',
          timeout: 2000,
          type: 'POST',
          data: { price: orderValue, orderId:orderId },
          success: function(session){                               

            stripe.redirectToCheckout({ sessionId: session.id })

          },
          error: function(data) {           
            //alert("problem");
            } 
        });  
   });
}
  