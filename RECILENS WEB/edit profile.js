document.addEventListener("DOMContentLoaded", function () {
    const photoUpload = document.getElementById("photoUpload");
    const profilePhotoPreview = document.getElementById("profilePhotoPreview");
    const editPhotoBtn = document.getElementById("editPhotoBtn");
    const uploadLabel = document.getElementById("uploadLabel");

    // Show preview when a file is selected
    photoUpload.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePhotoPreview.src = e.target.result;
                profilePhotoPreview.style.display = "block";
                uploadLabel.style.display = "none";
                editPhotoBtn.style.display = "inline-block";
            };
            reader.readAsDataURL(file);
        }
    });

    // Allow user to click "Edit Photo" to upload a new picture
    editPhotoBtn.addEventListener("click", function () {
        photoUpload.click();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const professionalBackground = document.getElementById("professionalBackground");
    const suggestionBox = document.getElementById("suggestionBox");

    // Sample suggestions based on common professional background topics
    const suggestions = [
        "Bachelor's in Computer Science",
        "Master's in Education",
        "3 years as a Teaching Assistant",
        "Certified Project Manager (PMP)",
        "Python Programming Expertise",
        "Machine Learning Research",
        "Experience with Curriculum Development",
        "Certified in Microsoft Office Suite",
        "Lecturer in Sociology",
        "Internship at Tech Start-up",
        "Digital Marketing Specialist",
        "Educational Psychology Courses",
        "Student Tutor Experience",
    ];

    // Display relevant suggestions based on input
    professionalBackground.addEventListener("input", () => {
        const inputText = professionalBackground.value.toLowerCase();
        suggestionBox.innerHTML = ""; // Clear previous suggestions

        if (inputText) {
            const filteredSuggestions = suggestions.filter(suggestion =>
                suggestion.toLowerCase().includes(inputText)
            );

            if (filteredSuggestions.length > 0) {
                filteredSuggestions.forEach(suggestion => {
                    const suggestionElement = document.createElement("p");
                    suggestionElement.textContent = suggestion;
                    suggestionElement.addEventListener("click", () => {
                        professionalBackground.value = suggestion;
                        suggestionBox.style.display = "none";
                    });
                    suggestionBox.appendChild(suggestionElement);
                });
                suggestionBox.style.display = "block";
            } else {
                suggestionBox.style.display = "none";
            }
        } else {
            suggestionBox.style.display = "none";
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener("click", (e) => {
        if (!suggestionBox.contains(e.target) && e.target !== professionalBackground) {
            suggestionBox.style.display = "none";
        }
    });
});
window.addEventListener('load', function() {
    document.body.classList.remove('loading');
    document.getElementById('loader').style.display = 'none';
});
