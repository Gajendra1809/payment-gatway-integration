<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('payment')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    @if(Session::has('amount'))
    <div class="card card-default">
        <div class="card-header">
            Laravel - Razorpay Payment Gateway Integration
        </div>
        <div class="card-body text-center">
            <form action="{{route('pay')}}" method="POST" >
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="rzp_test_Y3BabS2kuePGlC"
                        data-amount="{{ Session::get('amount')}}"
                        data-order_id="{{ Session::get('orderId') }}"
                        data-buttontext="Pay using razorpay"
                        data-name="Coffee"
                        data-description="Razorpay payment"
                        data-theme.color="#ff7529">
                </script>
            </form>
        </div>
    </div>
    @endif
</body>
</html>