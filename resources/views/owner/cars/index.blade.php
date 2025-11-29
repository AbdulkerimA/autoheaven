<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Your Cars - Rental Platform</title>
    @vite(['resources/css/manageCars.css','resources/js/manageCars.js'])
    
</head>

<body>
    <x-header  class="bg-gray-800"/>
    <!-- Main Container -->
    <div class="min-h-full px-10 py-5 mt-12 mb-8">
        <!-- Header Section -->
        <header class="text-center mb-12 fade-in">
            <h1
                style="font-size: 48px; font-weight: 700; margin: 0 0 16px 0; background: linear-gradient(135deg, var(--text-primary) 0%, var(--accent-yellow) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Manage Your Cars</h1>
            <p style="font-size: 18px; color: var(--text-secondary); margin: 0; font-weight: 400;">Add, edit, and
                organize your cars effortlessly.</p>
        </header>
        {{--  --}}
        <livewire:owner-car-filter />
    </div>
    <!-- Floating Add Car Button -->
    <button class="add-car-btn float" onclick="window.location='/car/add'">
        <svg width="32" height="32" fill="currentColor" viewbox="0 0 20 20" style="color: var(--bg-secondary);">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 id="modalTitle"
                    style="font-size: 28px; font-weight: 700; margin: 0; background: linear-gradient(135deg, var(--text-primary) 0%, var(--accent-yellow) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                </h2><button onclick="closeModal()"
                    style="background: none; border: none; color: var(--text-secondary); cursor: pointer; font-size: 28px; transition: color 0.3s ease;"
                    onmouseover="this.style.color='var(--accent-yellow)'"
                    onmouseout="this.style.color='var(--text-secondary)'">×</button>
            </div>
            <div id="modalContent" style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 24px;"></div>
            <div class="flex justify-end gap-3"><button onclick="closeModal()" class="btn-outline">Cancel</button>
                <button id="modalAction" class="btn-primary">Confirm</button>
            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>