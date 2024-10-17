<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coming Soon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .coming-soon {
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 4em;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        p {
            font-size: 1.5em;
            margin-bottom: 30px;
        }

        .countdown {
            font-size: 2em;
            color: #f39c12;
            margin-bottom: 50px;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }

        .footer a {
            color: #f39c12;
            text-decoration: none;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="coming-soon">
        <h1>Coming Soon</h1>
        <p>We are working hard to bring you something awesome. Stay tuned!</p>
        <div class="countdown">Launching in 19 days...</div>
    </div>

    <div class="footer">
        <p><a href="mailto:info@example.com">Contact us</a></p>
    </div>
</body>
</html>
