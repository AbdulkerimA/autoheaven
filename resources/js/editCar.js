let uploadedImage = null; // store only ONE image

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;

    if (!file.type.startsWith('image/')) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        addImagePreview(e.target.result, file.name);
    };
    reader.readAsDataURL(file);
}

function addImagePreview(src, name) {
    uploadedImage = { src, name };

    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = ''; // clear old image

    const previewItem = document.createElement('div');
    previewItem.className = 'preview-item bounce-in';

    previewItem.innerHTML = `
        <img src="${src}" alt="${name}" class="preview-image">
        <button type="button" class="remove-image" onclick="removeImage()">×</button>
    `;

    previewContainer.appendChild(previewItem);
}

function removeImage() {
    uploadedImage = null;

    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = ''; // clear image preview

    // Optional: clear <input type="file">
    const fileInput = document.getElementById('imageInput');
    if (fileInput) fileInput.value = '';
}

// expose functions to window
window.handleFileSelect = handleFileSelect;
window.removeImage = removeImage;
