<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car - Auto Heaven</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            box-sizing: border-box;
        }

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --bg-primary: #1c252e;
            --bg-secondary: #12181f;
            --accent-yellow: #f5b800;
            --text-primary: #ffffff;
            --text-secondary: #94a3b8;
            --glass-bg: rgba(28, 37, 46, 0.8);
            --glass-border: rgba(255, 255, 255, 0.1);
            --success-green: #10b981;
            --error-red: #ef4444;
        }

        * {
            font-family: 'Inter', system-ui, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
            min-height: 100%;
            margin: 0;
            color: var(--text-primary);
        }

        /* Glass Effect */
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(245, 184, 0, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(245, 184, 0, 0.6);
            }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .glow {
            animation: glow 2s ease-in-out infinite;
        }

        .bounce-in {
            animation: bounceIn 0.6s ease-out;
        }

        .pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 16px 20px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 2px solid var(--glass-border);
            border-radius: 16px;
            color: var(--text-primary);
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--accent-yellow);
            box-shadow: 0 0 20px rgba(245, 184, 0, 0.3);
            background: rgba(28, 37, 46, 0.9);
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: var(--text-secondary);
        }

        .form-select {
            cursor: pointer;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Toggle Switch */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--glass-border);
            transition: 0.4s;
            border-radius: 34px;
            border: 2px solid var(--glass-border);
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 22px;
            width: 22px;
            left: 4px;
            bottom: 4px;
            background: var(--text-secondary);
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background: var(--accent-yellow);
            border-color: var(--accent-yellow);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(26px);
            background: var(--bg-secondary);
        }

        /* File Upload */
        .upload-area {
            border: 2px dashed var(--glass-border);
            border-radius: 20px;
            padding: 40px 20px;
            text-align: center;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .upload-area:hover {
            border-color: var(--accent-yellow);
            background: rgba(245, 184, 0, 0.05);
            animation: glow 2s ease-in-out infinite;
        }

        .upload-area.dragover {
            border-color: var(--accent-yellow);
            background: rgba(245, 184, 0, 0.1);
            transform: scale(1.02);
        }

        .upload-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            color: var(--accent-yellow);
        }

        .image-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .preview-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: 12px;
            overflow: hidden;
            background: var(--glass-bg);
            border: 2px solid var(--glass-border);
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 24px;
            height: 24px;
            background: rgba(239, 68, 68, 0.9);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .remove-image:hover {
            background: var(--error-red);
            transform: scale(1.1);
        }

        /* Buttons */
        .btn-primary {
            background: var(--accent-yellow);
            color: var(--bg-secondary);
            border: none;
            border-radius: 16px;
            padding: 18px 32px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            min-width: 200px;
        }

        .btn-primary:hover {
            background: #e6a600;
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(245, 184, 0, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary:disabled {
            background: var(--text-secondary);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-primary);
            border: 2px solid var(--glass-border);
            border-radius: 16px;
            padding: 16px 32px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-secondary:hover {
            border-color: var(--accent-yellow);
            color: var(--accent-yellow);
            background: rgba(245, 184, 0, 0.05);
            transform: translateY(-2px);
        }

        /* Features Checkboxes */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            border-color: var(--accent-yellow);
            background: rgba(245, 184, 0, 0.05);
        }

        .feature-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid var(--glass-border);
            border-radius: 4px;
            background: transparent;
            position: relative;
            transition: all 0.3s ease;
        }

        .feature-checkbox.checked {
            background: var(--accent-yellow);
            border-color: var(--accent-yellow);
        }

        .feature-checkbox.checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--bg-secondary);
            font-weight: bold;
            font-size: 12px;
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            margin-bottom: 40px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            font-size: 14px;
            font-weight: 600;
        }

        .step.active {
            background: rgba(245, 184, 0, 0.2);
            border-color: var(--accent-yellow);
            color: var(--accent-yellow);
        }

        .step-number {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .step.active .step-number {
            background: var(--accent-yellow);
            color: var(--bg-secondary);
        }

        /* Success Message */
        .success-message {
            text-align: center;
            padding: 40px;
            display: none;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            background: rgba(16, 185, 129, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--success-green);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .progress-steps {
                flex-direction: column;
                gap: 8px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Loading Spinner */
        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div style="min-height: 100%; padding: 40px 20px;"><!-- Header Section -->
        <header class="text-center mb-12 fade-in">
            <h1
                style="font-size: 48px; font-weight: 700; margin: 0 0 16px 0; background: linear-gradient(135deg, var(--text-primary) 0%, var(--accent-yellow) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Add New Car</h1>
            <p style="font-size: 18px; color: var(--text-secondary); margin: 0; font-weight: 400;">Fill out the details
                to list your car for rent on Auto Heaven.</p>
        </header><!-- Progress Steps -->
        <div class="progress-steps fade-in" style="animation-delay: 0.2s;">
            <div class="step active" id="step1">
                <div class="step-number">
                    1
                </div><span>Basic Info</span>
            </div>
            <div class="step" id="step2">
                <div class="step-number">
                    2
                </div><span>Details</span>
            </div>
            <div class="step" id="step3">
                <div class="step-number">
                    3
                </div><span>Images</span>
            </div>
            <div class="step" id="step4">
                <div class="step-number">
                    4
                </div><span>Features</span>
            </div>
        </div><!-- Main Form Container -->
        <div class="glass-panel max-w-4xl mx-auto p-8 fade-in"
            style="animation-delay: 0.4s; border: 2px solid rgba(245, 184, 0, 0.2);">
            <form id="carForm" onsubmit="submitForm(event)">
                <!-- Step 1: Basic Information -->
                <div class="form-step active" id="formStep1">
                    <h2 style="font-size: 28px; font-weight: 700; margin: 0 0 32px 0; color: var(--accent-yellow); text-align: center;"
                        class="slide-up">Basic Information</h2>
                    <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 slide-up"
                        style="animation-delay: 0.1s;">
                        <div class="form-group"><label class="form-label" for="carName">Car Name / Model</label> <input
                                type="text" id="carName" class="form-input" placeholder="e.g., BMW X5 xDrive40i"
                                required>
                        </div>
                        <div class="form-group"><label class="form-label" for="brand">Brand</label> <select id="brand"
                                class="form-select" required>
                                <option value="">Select Brand</option>
                                <option value="BMW">BMW</option>
                                <option value="Mercedes-Benz">Mercedes-Benz</option>
                                <option value="Audi">Audi</option>
                                <option value="Toyota">Toyota</option>
                                <option value="Honda">Honda</option>
                                <option value="Porsche">Porsche</option>
                                <option value="Volkswagen">Volkswagen</option>
                                <option value="Ford">Ford</option>
                                <option value="Chevrolet">Chevrolet</option>
                                <option value="Nissan">Nissan</option>
                                <option value="Hyundai">Hyundai</option>
                                <option value="Kia">Kia</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label" for="category">Category</label> <select
                                id="category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="SUV">SUV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="Convertible">Convertible</option>
                                <option value="Coupe">Coupe</option>
                                <option value="Wagon">Wagon</option>
                                <option value="Pickup">Pickup Truck</option>
                                <option value="Van">Van</option>
                                <option value="Sports">Sports Car</option>
                                <option value="Luxury">Luxury</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label" for="pricePerDay">Price Per Day ($)</label>
                            <input type="number" id="pricePerDay" class="form-input" placeholder="150" min="1" required>
                        </div>
                        <div class="form-group"><label class="form-label" for="fuelType">Fuel Type</label> <select
                                id="fuelType" class="form-select" required>
                                <option value="">Select Fuel Type</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electric">Electric</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Plug-in Hybrid">Plug-in Hybrid</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label" for="transmission">Transmission</label>
                            <select id="transmission" class="form-select" required>
                                <option value="">Select Transmission</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="CVT">CVT</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end mt-8"><button type="button" class="btn-primary" onclick="nextStep()">
                            Next Step
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                    </div>
                </div><!-- Step 2: Additional Details -->
                <div class="form-step" id="formStep2" style="display: none;">
                    <h2 style="font-size: 28px; font-weight: 700; margin: 0 0 32px 0; color: var(--accent-yellow); text-align: center;"
                        class="slide-up">Additional Details</h2>
                    <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 slide-up"
                        style="animation-delay: 0.1s;">
                        <div class="form-group"><label class="form-label" for="seats">Number of Seats</label> <select
                                id="seats" class="form-select" required>
                                <option value="">Select Seats</option>
                                <option value="2">2 Seats</option>
                                <option value="4">4 Seats</option>
                                <option value="5">5 Seats</option>
                                <option value="7">7 Seats</option>
                                <option value="8">8 Seats</option>
                                <option value="9">9+ Seats</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label" for="year">Year of Manufacture</label> <select
                                id="year" class="form-select" required>
                                <option value="">Select Year</option>
                            </select>
                        </div>
                        <div class="form-group"><label class="form-label" for="mileage">Mileage (miles)</label> <input
                                type="number" id="mileage" class="form-input" placeholder="25000" min="0" required>
                        </div>
                        <div class="form-group"><label class="form-label" for="licensePlate">License Plate
                                Number</label> <input type="text" id="licensePlate" class="form-input"
                                placeholder="ABC-1234" required>
                        </div>
                        <div class="form-group md:col-span-2"><label class="form-label">Availability Status</label>
                            <div style="display: flex; align-items: center; gap: 16px; margin-top: 8px;"><label
                                    class="toggle-switch"> <input type="checkbox" id="availability" checked> <span
                                        class="toggle-slider"></span> </label> <span
                                    style="color: var(--text-primary); font-weight: 500;">Available for Rent</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group slide-up" style="animation-delay: 0.2s;"><label class="form-label"
                            for="description">Car Description</label> <textarea id="description" class="form-textarea"
                            placeholder="Describe your car's condition, special features, and any important details for renters..."
                            required></textarea>
                    </div>
                    <div class="flex justify-between mt-8"><button type="button" class="btn-secondary"
                            onclick="prevStep()">
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20"
                                style="margin-right: 8px;">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg> Previous </button> <button type="button" class="btn-primary" onclick="nextStep()">
                            Next Step
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                    </div>
                </div><!-- Step 3: Car Images -->
                <div class="form-step" id="formStep3" style="display: none;">
                    <h2 style="font-size: 28px; font-weight: 700; margin: 0 0 32px 0; color: var(--accent-yellow); text-align: center;"
                        class="slide-up">Car Images</h2>
                    <div class="slide-up" style="animation-delay: 0.1s;">
                        <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
                            <svg class="upload-icon" fill="currentColor" viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <h3
                                style="font-size: 20px; font-weight: 600; margin: 0 0 8px 0; color: var(--text-primary);">
                                Upload Car Images</h3>
                            <p style="color: var(--text-secondary); margin: 0 0 16px 0;">Drag and drop images here, or
                                click to browse</p>
                            <p style="color: var(--text-secondary); font-size: 14px; margin: 0;">Recommended: At least 3
                                high-quality images (JPG, PNG)</p>
                        </div><input type="file" id="fileInput" multiple accept="image" style="display: none;"
                            onchange="handleFileSelect(event)">
                        <div class="image-preview" id="imagePreview"></div>
                    </div>
                    <div class="flex justify-between mt-8"><button type="button" class="btn-secondary"
                            onclick="prevStep()">
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20"
                                style="margin-right: 8px;">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg> Previous </button> <button type="button" class="btn-primary" onclick="nextStep()">
                            Next Step
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                    </div>
                </div><!-- Step 4: Features & Submit -->
                <div class="form-step" id="formStep4" style="display: none;">
                    <h2 style="font-size: 28px; font-weight: 700; margin: 0 0 32px 0; color: var(--accent-yellow); text-align: center;"
                        class="slide-up">Optional Features</h2>
                    <div class="slide-up" style="animation-delay: 0.1s;">
                        <p
                            style="color: var(--text-secondary); text-align: center; margin-bottom: 32px; font-size: 16px;">
                            Select the features available in your car to attract more renters</p>
                        <div class="features-grid">
                            <div class="feature-item" onclick="toggleFeature(this, 'airConditioning')">
                                <div class="feature-checkbox" id="airConditioning"></div><span>Air Conditioning</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'bluetooth')">
                                <div class="feature-checkbox" id="bluetooth"></div><span>Bluetooth</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'gps')">
                                <div class="feature-checkbox" id="gps"></div><span>GPS Navigation</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'usbCharging')">
                                <div class="feature-checkbox" id="usbCharging"></div><span>USB Charging</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'sunroof')">
                                <div class="feature-checkbox" id="sunroof"></div><span>Sunroof</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'leatherSeats')">
                                <div class="feature-checkbox" id="leatherSeats"></div><span>Leather Seats</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'heatedSeats')">
                                <div class="feature-checkbox" id="heatedSeats"></div><span>Heated Seats</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'backupCamera')">
                                <div class="feature-checkbox" id="backupCamera"></div><span>Backup Camera</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'parkingAssist')">
                                <div class="feature-checkbox" id="parkingAssist"></div><span>Parking Assist</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'cruiseControl')">
                                <div class="feature-checkbox" id="cruiseControl"></div><span>Cruise Control</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'keylessEntry')">
                                <div class="feature-checkbox" id="keylessEntry"></div><span>Keyless Entry</span>
                            </div>
                            <div class="feature-item" onclick="toggleFeature(this, 'premiumSound')">
                                <div class="feature-checkbox" id="premiumSound"></div><span>Premium Sound System</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-8"><button type="button" class="btn-secondary"
                            onclick="prevStep()">
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20"
                                style="margin-right: 8px;">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg> Previous </button> <button type="submit" class="btn-primary" id="submitBtn"> <span
                                id="submitText">List My Car</span>
                            <div class="spinner" id="submitSpinner" style="display: none;"></div>
                            <svg width="20" height="20" fill="currentColor" viewbox="0 0 20 20" id="submitIcon">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div><!-- Success Message -->
                <div class="success-message" id="successMessage">
                    <div class="success-icon bounce-in">
                        <svg width="40" height="40" fill="currentColor" viewbox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 style="font-size: 32px; font-weight: 700; margin: 0 0 16px 0; color: var(--success-green);">Car
                        Listed Successfully! 🎉</h2>
                    <p style="color: var(--text-secondary); font-size: 18px; margin: 0 0 32px 0; line-height: 1.6;">Your
                        car has been added to Auto Heaven and is now available for rent. You'll receive notifications
                        when customers book your vehicle.</p>
                    <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;"><button
                            type="button" class="btn-primary" onclick="addAnotherCar()"> Add Another Car </button>
                        <button type="button" class="btn-secondary" onclick="viewMyListings()"> View My Listings
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
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

        // Form submission
        function submitForm(event) {
            // event.preventDefault();

            if (!validateCurrentStep()) {
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            const submitIcon = document.getElementById('submitIcon');

            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Listing Car...';
            submitSpinner.style.display = 'block';
            submitIcon.style.display = 'none';

            // Simulate form submission
            setTimeout(() => {
                // Hide form steps
                document.getElementById(`formStep${currentStep}`).style.display = 'none';
                document.querySelectorAll('.step').forEach(step => step.style.display = 'none');

                // Show success message
                document.getElementById('successMessage').style.display = 'block';

                // Reset button state
                submitBtn.disabled = false;
                submitText.textContent = 'List My Car';
                submitSpinner.style.display = 'none';
                submitIcon.style.display = 'block';
            }, 2000);
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
    </script>
    <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'99efef0ef4c3f7f3',t:'MTc2MzIyMjEzNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
</body>

</html>