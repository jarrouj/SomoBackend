<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333333;
            font-size: 24px;
        }

        p {
            color: #777777;
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <h1>New Reservation</h1>

    <p><strong>Name:</strong> {{ $reservation->name }}</p>
    <p><strong>Phone:</strong> {{ $reservation->phone }}</p>
    <p><strong>Email:</strong> {{ $reservation->email }}</p>
    <p><strong>Date:</strong>{{ $reservation->reservation_day }}</p>
    <p><strong>Number of Persons:</strong> {{ $reservation->number_of_person }}</p>
    <p><strong>Time:</strong> {{ $reservation->time }}</p>

    @if (!empty($reservation->comments))
    <p><strong>Comments:</strong> {{ $reservation->comments }}</p>
    @endif




    <p>Best regards,</p>
    <p>SOMO</p>
</body>

</html>
