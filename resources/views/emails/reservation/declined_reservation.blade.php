<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add some basic styling to the email */
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
    <h1>Reservation Declined</h1>

    <p>Dear {{ $reservation->name }},</p>

    <p>We regret to inform you that we are fully booked during the requested time period for your reservation.</p>

    <p>We apologize for any inconvenience caused. We recommend trying again at a different date or time. Please note that our restaurant tends to get busy, especially during peak hours, weekends, and holidays.</p>

    <p>If you have any questions or need assistance, please feel free to contact us. We appreciate your understanding and look forward to serving you in the future.</p>

    <p>Best regards,</p>
    <p>Somo</p>
</body>
</html>
