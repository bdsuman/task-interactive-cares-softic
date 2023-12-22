<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>
    <h1>Payment Form</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('payment.process') }}" method="post">
        @csrf
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" step="0.01" required>

        <button type="submit">Process Payment</button>
    </form>
</body>
</html>
