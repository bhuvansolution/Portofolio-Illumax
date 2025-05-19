<!DOCTYPE html>
<html>

<head>
    <title>Pesan Masuk</title>
</head>

<body>
    <h2>Pesan Baru dari Website</h2>
    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>No. Telepon:</strong> {{ $data['phone'] }}</p>
    <p><strong>Subjek:</strong> {{ $data['subject'] }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>

</html>
