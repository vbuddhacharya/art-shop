<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Art Store Upload</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload.css') }}">
</head>
<body>
  <div class="container">
    <h1>Share Your Creative Works</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="artTitle" class="artlabel">Art Title</label>
            <input type="text" id="artTitle" name="artTitle" placeholder="Enter Art Title" required>
        </div>
        <div class="form-img">
  <label for="artImage" class="artimg">Art Image</label>
  <span class="file-input">
    <input type="file" id="myFile" name="myFile" onchange="showFileName(this)">
    <label for="myFile">Choose File</label>
    <span id="file-name"></span>
  </span>
</div>

        
        <div class="form-row">
            <div class="form-group">
                <label for="artSize" class="artlabel">Art Size</label>
                <input type="text" id="artSize" name="artSize" placeholder="Enter Art Size" required>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artPrice" class="artlabel">Art Price</label>
                <input type="number" id="artPrice" name="artPrice" min="0" step="50" value="50" required>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="artMaterial" class="artlabel">Art Material</label>
                <select id="artMaterial" name="artMaterial"  style="width: 37vh">
                    <option value="paper">Paper</option>
                    <option value="glass">Glass</option>
                    <option value="canvas">Canvas</option>
                </select>
            </div>
            <div class="form-group" style="margin-left: 7vh;">
                <label for="artCategory" class="artlabel">Art Category</label>
                <select id="artCategory" name="artCategory" style="width: 36vh" required>
                    <option value="coloredPencil">Color Pencil</option>
                    <option value="pencilSketch">Pencil Sketch</option>
                    <option value="oilPaint">Oil Paint</option>
                    <option value="acrylicPaint">Acrylic Paint</option>
                    <option value="watercolor">Watercolors</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="artDescription" class="artlabel">Art Description</label>
            <textarea id="artDescription" name="artDescription" placeholder="Provide Proper Art Description" required></textarea>
        </div>
     
        <div class="form-row">
            <div class="form-group">
                <label for="artStock" class="artlabel">Art Stock</label>
                <input type="number" id="artStock" name="artStock" min="1" max="3" step="1" value="1" required>
            </div>
            <div class="form-group" style="margin-left: 10vh;">
                <label for="artDeliver" class="artlabel">Delivery Time</label>
                <input type="text" id="artDeliver" name="artDeliver" placeholder="Enter Delivery Time" required>
            </div>
        </div>

        <div class="form-group">
            <div class="radio-group">
                <label for="frameIncluded" class="artlabel">Frame Included:</label>
                <input type="radio" id="yes" name="radioField" value="yes"  style="font-weight: 100px;" required>
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="radioField" value="no" required>
                <label for="no">No</label>
                
            </div>
        </div>

        <input type="submit" value="Upload">
    </form>
  </div>

<script>
    function showFileName(input) {
  var fileName = input.files[0].name;
  document.getElementById("file-name").textContent = fileName;
}

</script>

</body>
</html>