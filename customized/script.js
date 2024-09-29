const wall = document.getElementById('wall');
let isDraggingSticker = false;
let offsetXSticker, offsetYSticker, currentSticker;

document.getElementById('wallStickerUpload').addEventListener('change', handleWallStickerUpload);

function handleWallStickerUpload(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const stickerUrl = e.target.result;
            displayStickerOnWall(stickerUrl);
        };

        reader.readAsDataURL(file);
    }
}

function displayStickerOnWall(stickerUrl) {
    // Create a new sticker element
    const sticker = document.createElement('div');
    sticker.className = 'sticker';
    sticker.style.backgroundImage = `url(${stickerUrl})`;

    // Append the sticker to the wall
    wall.appendChild(sticker);

    // Set up event listeners for drag and drop
    sticker.addEventListener('mousedown', startDragSticker);
}

function startDragSticker(e) {
    isDraggingSticker = true;
    currentSticker = e.target;
    offsetXSticker = e.clientX - currentSticker.getBoundingClientRect().left;
    offsetYSticker = e.clientY - currentSticker.getBoundingClientRect().top;
    currentSticker.style.zIndex = 1; // Bring the sticker to the front

    // Add event listeners to the document for smoother dragging
    document.addEventListener('mousemove', dragSticker);
    document.addEventListener('mouseup', stopDragSticker);
}

function dragSticker(e) {
    if (isDraggingSticker) {
        const x = e.clientX - offsetXSticker;
        const y = e.clientY - offsetYSticker;

        currentSticker.style.left = x + 'px';
        currentSticker.style.top = y + 'px';
    }
}

function stopDragSticker() {
    isDraggingSticker = false;
    currentSticker.style.zIndex = 0; // Reset the z-index

    // Remove the temporary event listeners from the document
    document.removeEventListener('mousemove', dragSticker);
    document.removeEventListener('mouseup', stopDragSticker);
}
