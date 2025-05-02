<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #0b0b0b;
            color: white;
            overflow: hidden;
            animation: backgroundCreative 10s infinite;
        }

        .container {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        .image-container {
            animation: float 3s ease-in-out infinite;
        }

        img {
            width: 400px;
            max-width: 100%;
        }

        h1 {
            font-size: 2.5rem;
        }

        p {
            font-size: 1.2rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes backgroundCreative {
            0% {
                background: radial-gradient(circle, #1e1e1e, #0b0b0b);
            }

            25% {
                background: radial-gradient(circle, #2e2e2e, #1e1e1e);
            }

            50% {
                background: radial-gradient(circle, #3e3e3e, #2e2e2e);
            }

            75% {
                background: radial-gradient(circle, #2e2e2e, #1e1e1e);
            }

            100% {
                background: radial-gradient(circle, #1e1e1e, #0b0b0b);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="/assets/images/maint.png" alt="Maintenance Illustration" class="img-fluid">
        </div>
        <h1 class="mt-4">Web in Maintenance Mode</h1>
        <p>Please try again shortly.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
