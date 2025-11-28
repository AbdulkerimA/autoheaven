
document.addEventListener("DOMContentLoaded", () => {
    const uploadBtn = document.getElementById("photoUploadBtn");
    const fileInput = document.getElementById("photoInput");
    const profileImage = document.getElementById("profileImage");

    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    // Open file dialog when clicking button
    uploadBtn.addEventListener("click", () => fileInput.click());

    // When an image is selected
    fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (!file) return;

        // --- Instant Preview ---
        const reader = new FileReader();
        reader.onload = (e) => {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);

        // --- Upload to server automatically ---
        const formData = new FormData();
        formData.append("profile_pic", file);

        fetch("/profile/pic/update", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert("Profile updated:", data.message);
                } else {
                    alert("Upload failed: " + (data.message || "Unknown error"));
                }
            })
            .catch(err => {
                console.error(err);
                alert("Something went wrong while uploading your image.");
            });
    });
});
