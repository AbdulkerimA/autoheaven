
let currentStep = 1;
let uploadedImages = [];
let selectedFeatures = [];

// Initialize year dropdown
function initializeYearDropdown() {
    const yearSelect = document.getElementById('year');
    const currentYear = new Date().getFullYear();

    for (let year = currentYear; year >= 1990; year--) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        yearSelect.appendChild(option);
    }
}

// Step navigation
function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < 4) {
            document.getElementById(`formStep${currentStep}`).style.display = 'none';
            document.getElementById(`step${currentStep}`).classList.remove('active');

            currentStep++;

            document.getElementById(`formStep${currentStep}`).style.display = 'block';
            document.getElementById(`step${currentStep}`).classList.add('active');

            // Add animation
            const currentStepElement = document.getElementById(`formStep${currentStep}`);
            currentStepElement.style.animation = 'none';
            setTimeout(() => {
                currentStepElement.style.animation = 'slideUp 0.6s ease-out';
            }, 10);
        }
    }
}

function prevStep() {
    if (currentStep > 1) {
        document.getElementById(`formStep${currentStep}`).style.display = 'none';
        document.getElementById(`step${currentStep}`).classList.remove('active');

        currentStep--;

        document.getElementById(`formStep${currentStep}`).style.display = 'block';
        document.getElementById(`step${currentStep}`).classList.add('active');

        // Add animation
        const currentStepElement = document.getElementById(`formStep${currentStep}`);
        currentStepElement.style.animation = 'none';
        setTimeout(() => {
            currentStepElement.style.animation = 'slideUp 0.6s ease-out';
        }, 10);
    }
}

// Form validation
function validateCurrentStep() {
    const currentStepElement = document.getElementById(`formStep${currentStep}`);
    const requiredFields = currentStepElement.querySelectorAll('[required]');

    for (let field of requiredFields) {
        if (!field.value.trim()) {
            field.focus();
            field.style.borderColor = 'var(--error-red)';
            field.style.boxShadow = '0 0 20px rgba(239, 68, 68, 0.3)';

            setTimeout(() => {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            }, 3000);

            return false;
        }
    }

    // Special validation for step 3 (images)
    if (currentStep === 3 && uploadedImages.length === 0) {
        const uploadArea = document.getElementById('uploadArea');
        uploadArea.style.borderColor = 'var(--error-red)';
        uploadArea.style.background = 'rgba(239, 68, 68, 0.1)';

        setTimeout(() => {
            uploadArea.style.borderColor = '';
            uploadArea.style.background = '';
        }, 3000);

        return false;
    }

    return true;
}

// File upload handling
function handleFileSelect(event) {
    const files = Array.from(event.target.files);
    files.forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                addImagePreview(e.target.result, file.name);
            };
            reader.readAsDataURL(file);
        }
    });
}

function addImagePreview(src, name) {
    const imageId = Date.now() + Math.random();
    uploadedImages.push({ id: imageId, src, name });

    const previewContainer = document.getElementById('imagePreview');
    const previewItem = document.createElement('div');
    previewItem.className = 'preview-item bounce-in';
    previewItem.innerHTML = `
        <img src="${src}" alt="${name}" class="preview-image">
        <button type="button" class="remove-image" onclick="removeImage(${imageId})">×</button>
    `;

    previewContainer.appendChild(previewItem);
}

function removeImage(imageId) {
    uploadedImages = uploadedImages.filter(img => img.id !== imageId);

    const previewContainer = document.getElementById('imagePreview');
    const previewItems = previewContainer.children;

    for (let i = 0; i < previewItems.length; i++) {
        const button = previewItems[i].querySelector('.remove-image');
        if (button && button.onclick.toString().includes(imageId)) {
            previewItems[i].remove();
            break;
        }
    }
}

// Drag and drop functionality
function setupDragAndDrop() {
    const uploadArea = document.getElementById('uploadArea');

    uploadArea.addEventListener('dragover', function (e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function (e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function (e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');

        const files = Array.from(e.dataTransfer.files);
        files.forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    addImagePreview(e.target.result, file.name);
                };
                reader.readAsDataURL(file);
            }
        });
    });
}

// Feature selection
function toggleFeature(element, featureId) {
    const checkbox = element.querySelector('.feature-checkbox');
    const isChecked = checkbox.classList.contains('checked');

    if (isChecked) {
        checkbox.classList.remove('checked');
        selectedFeatures = selectedFeatures.filter(f => f !== featureId);
    } else {
        checkbox.classList.add('checked');
        selectedFeatures.push(featureId);
    }
}

// Success actions
function addAnotherCar() {
    // Reset form
    document.getElementById('carForm').reset();
    uploadedImages = [];
    selectedFeatures = [];
    currentStep = 1;

    // Clear image previews
    document.getElementById('imagePreview').innerHTML = '';

    // Clear feature selections
    document.querySelectorAll('.feature-checkbox').forEach(checkbox => {
        checkbox.classList.remove('checked');
    });

    // Reset steps
    document.querySelectorAll('.form-step').forEach(step => step.style.display = 'none');
    document.querySelectorAll('.step').forEach(step => {
        step.style.display = 'flex';
        step.classList.remove('active');
    });

    document.getElementById('formStep1').style.display = 'block';
    document.getElementById('step1').classList.add('active');
    document.getElementById('successMessage').style.display = 'none';
}

function viewMyListings() {
    // In a real app, this would navigate to the listings page
    const message = document.createElement('div');
    message.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--accent-yellow);
        border-radius: 20px;
        padding: 32px;
        text-align: center;
        z-index: 3000;
        color: var(--text-primary);
    `;
    message.innerHTML = `
        <h3 style="color: var(--accent-yellow); margin: 0 0 16px 0;">Navigation</h3>
        <p style="margin: 0; color: var(--text-secondary);">This would navigate to your car listings page in the full application.</p>
    `;

    document.body.appendChild(message);

    setTimeout(() => {
        message.remove();
    }, 3000);
}

// Initialize page
document.addEventListener('DOMContentLoaded', function () {
    initializeYearDropdown();
    setupDragAndDrop();

    // Add focus animations to form inputs
    document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(input => {
        input.addEventListener('focus', function () {
            this.style.animation = 'glow 2s ease-in-out infinite';
        });

        input.addEventListener('blur', function () {
            this.style.animation = '';
        });
    });
});

window.initializeYearDropdown = initializeYearDropdown;
window.nextStep = nextStep;
window.prevStep = prevStep;
window.validateCurrentStep = validateCurrentStep;
window.handleFileSelect = handleFileSelect;
window.addImagePreview = addImagePreview;
window.removeImage = removeImage;
window.setupDragAndDrop = setupDragAndDrop;
window.toggleFeature = toggleFeature;
window.addAnotherCar = addAnotherCar;
window.viewMyListings = viewMyListings;
