<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/feature_artist.css')}}">
    <title>Artist Feature Request</title>
</head>
<body>
    <div class="form-container">
        <h2>Artist Feature Request Form</h2>
        <form action="#" method="post">
            <label for="artistName">Artist Name:</label>
            <input type="text" id="artistName" name="artistName" value="" readonly>
            <label for="artworkTitle">Artwork Title:</label>
            <input type="text" id="artworkTitle" name="artworkTitle" required>

            <label for="artworkDescription">Artwork Description:</label>
            <textarea id="artworkDescription" name="artworkDescription" rows="4" required></textarea>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
