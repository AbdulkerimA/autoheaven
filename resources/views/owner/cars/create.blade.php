<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car - Auto Heaven</title>
    @vite(['resources/js/addCar.js','resources/css/addCar.css'])
    
</head>

<body>
    <!-- Header Section -->
    <x-header class="bg-gray-800"/>
    <div style="min-height: 100%; padding: 40px 20px;">
        <div class="text-center mb-12 fade-in mt-12">
            <h1
                style="font-size: 48px; font-weight: 700; margin: 0 0 16px 0; background: linear-gradient(135deg, var(--text-primary) 0%, var(--accent-yellow) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Add New Car</h1>
            <p style="font-size: 18px; color: var(--text-secondary); margin: 0; font-weight: 400;">
                Fill out the detailsto list your car for rent on Auto Heaven.
            </p>
        </div>
        <!-- Progress Steps -->
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
        </div>
        <!-- Main Form Container -->
        <div class="glass-panel max-w-4xl mx-auto p-8 fade-in" style="animation-delay: 0.4s; border: 2px solid rgba(245, 184, 0, 0.2);">

        <form id="carForm" action="/car/add" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Step 1: Basic Information -->
            <div class="form-step active" id="formStep1">
                <h2 class="slide-up" style="font-size:28px;font-weight:700;margin:0 0 32px 0;color:var(--accent-yellow);text-align:center;">
                    Basic Information
                </h2>

                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 slide-up" style="animation-delay:0.1s;">
                    <div class="form-group">
                        <label class="form-label" for="carName">Car Name / Model</label>
                        <input type="text" id="carName" name="carName" class="form-input" placeholder="e.g., BMW X5 xDrive40i" required>
                        <x-input-error :messages="$errors->get('carName')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="brand">Brand</label>
                        <select id="brand" name="brand" class="form-select" required>
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
                        <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Truck">Pickup Truck</option>
                            <option value="Van">Van</option>
                            <option value="Sports">Sports Car</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pricePerDay">Price Per Day ($)</label>
                        <input type="number" id="pricePerDay" name="pricePerDay" class="form-input" placeholder="150" min="1" required>
                        <x-input-error :messages="$errors->get('pricePerDay')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fuelType">Fuel Type</label>
                        <select id="fuelType" name="fuelType" class="form-select" required>
                            <option value="">Select Fuel Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="Plug-in Hybrid">Plug-in Hybrid</option>
                        </select>
                        <x-input-error :messages="$errors->get('fuelType')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="transmission">Transmission</label>
                        <select id="transmission" name="transmission" class="form-select" required>
                            <option value="">Select Transmission</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                            <option value="CVT">CVT</option>
                        </select>
                        <x-input-error :messages="$errors->get('transmission')" class="mt-2" />
                    </div>
                </div>

                <div class="flex justify-end mt-8">
                    <button type="button" class="btn-primary" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- Step 2: Additional Details -->
            <div class="form-step" id="formStep2" style="display:none;">
                <h2 class="slide-up" style="font-size:28px;font-weight:700;margin:0 0 32px 0;color:var(--accent-yellow);text-align:center;">
                    Additional Details
                </h2>

                <div class="form-grid grid grid-cols-1 md:grid-cols-2 gap-6 slide-up" style="animation-delay:0.1s;">
                    <div class="form-group">
                        <label class="form-label" for="seats">Number of Seats</label>
                        <select id="seats" name="seats" class="form-select" required>
                            <option value="">Select Seats</option>
                            <option value="2">2 Seats</option>
                            <option value="4">4 Seats</option>
                            <option value="5">5 Seats</option>
                            <option value="7">7 Seats</option>
                            <option value="8">8 Seats</option>
                            <option value="9">9+ Seats</option>
                        </select>
                        <x-input-error :messages="$errors->get('seats')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="year">Year of Manufacture</label>
                        <select id="year" name="year" class="form-select" required>
                            <option value="">Select Year</option>
                        </select>
                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="mileage">Mileage (miles)</label>
                        <input type="number" id="mileage" name="mileage" class="form-input" placeholder="25000" min="0" required>
                        <x-input-error :messages="$errors->get('mileage')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="licensePlate">License Plate Number</label>
                        <input type="text" id="licensePlate" name="licensePlate" class="form-input" placeholder="ABC-1234" required>
                        <x-input-error :messages="$errors->get('licensePlate')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group slide-up" style="animation-delay:0.2s;">
                    <label class="form-label" for="description">Car Description</label>
                    <textarea id="description" name="description" class="form-textarea" placeholder="Describe your car's condition, special features, and any important details for renters..." required></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button" class="btn-secondary" onclick="prevStep()">Previous</button>
                    <button type="button" class="btn-primary" onclick="nextStep()">Next Step</button>
                </div>
            </div>

            <!-- Step 3: Car Images -->
            <div class="form-step" id="formStep3" style="display:none;">
                <h2 class="slide-up" style="font-size:28px;font-weight:700;margin:0 0 32px 0;color:var(--accent-yellow);text-align:center;">
                    Car Images
                </h2>

                <div class="slide-up" style="animation-delay:0.1s;">
                    <div class="upload-area" id="uploadArea" onclick="document.getElementById('fileInput').click()">
                        <h3>Upload Car Images</h3>
                        <p>Drag and drop images here, or click to browse</p>
                    </div>
                    <input type="file" id="fileInput" name="images[]" multiple accept="image/*" style="display:none;" onchange="handleFileSelect(event)">
                    <x-input-error :messages="$errors->get('images')" class="mt-2" />
                    <div class="image-preview" id="imagePreview"></div>
                </div>

                <div class="flex justify-between mt-8">
                    <button type="button" class="btn-secondary" onclick="prevStep()">Previous</button>
                    <button type="submit" class="btn-primary">
                        <span id="submitText">List My Car</span>
                    </button>
                </div>
            </div>
        </form>

        </div>
    </div>
    <x-footer />
</body>

</html>