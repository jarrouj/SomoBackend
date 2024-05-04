<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmation</title>
</head>
<body>
    <h1>Reservation Confirmation</h1>
    <p>Dear {{ $reservation->name }},</p>

    <p>Your reservation has been confirmed.</p>

    <p>Reservation Details:</p>
    <ul>
        <li>Name: {{ $reservation->name }}</li>
        <li>Date : {{ $reservation->reservation_day }}</li>
        <li>Number of Persons: {{ $reservation->number_of_person }}</li>
        <li>Time: {{ $reservation->time }}</li>
    </ul>

    <p>Thank you for choosing our service.</p>

    <p>Sincerely,<br>Somo</p>
</body>
</html>
