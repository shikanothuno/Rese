var stripe = Stripe('pk_test_51PgF8uRr73KjhydxyjS3YBHH4Dn9F3gxwxALK1200OEDW5XyrsNC1jOnTJc17yvm8Z3MBJ6TqnEYXDqCclJLfFEg00RU8KEE2x');
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element');

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
        // エラー処理
        } else {
        // トークンをサーバーに送信
        stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);
form.submit();
}
