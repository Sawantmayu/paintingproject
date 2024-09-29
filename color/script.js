var canvas = document.getElementById('paintCanvas');
var ctx = canvas.getContext('2d');
var painting = false;

var brushSize = 5;
var color = '#000000';

function updateColor() {
    color = document.getElementById("colorInput").value;
    ctx.strokeStyle = color;
}

function updateBrushSize() {
    brushSize = document.getElementById("brushSize").value;
    document.getElementById("brushSizeValue").innerText = brushSize; // Update brush size display
    ctx.lineWidth = brushSize;
}

function startPainting(event) {
    painting = true;
    draw(event);
}

function stopPainting() {
    painting = false;
    ctx.beginPath();
}

function draw(event) {
    if (!painting) return;

    var x = event.clientX - canvas.offsetLeft;
    var y = event.clientY - canvas.offsetTop;

    ctx.lineTo(x, y);
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(x, y, brushSize / 2, 0, 2 * Math.PI);
    ctx.fill();
    ctx.beginPath();
    ctx.moveTo(x, y);
}

function handleImageUpload() {
    var input = document.getElementById('imageInput');
    var uploadedImage = document.getElementById('uploadedImage');

    var reader = new FileReader();

    reader.onload = function (e) {
        uploadedImage.src = e.target.result;

        // Set canvas dimensions to match the image
        canvas.width = uploadedImage.width;
        canvas.height = uploadedImage.height;
        ctx.strokeStyle = color;
        ctx.lineWidth = brushSize;
    };

    reader.readAsDataURL(input.files[0]);
}

canvas.addEventListener('mousedown', startPainting);
canvas.addEventListener('mouseup', stopPainting);
canvas.addEventListener('mousemove', draw);
