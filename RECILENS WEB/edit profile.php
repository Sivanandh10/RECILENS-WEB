
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - RECILENS</title>
    <link rel="stylesheet" href="edit profile.css">
    <link rel="stylesheet" href="loader.css">
</head>
<body class="loading" >
    
    <?php include 'loader.php'; ?>
    <?php include 'nav.php'; ?>
    <header>
        <div class="image">
            <img src="log.png" alt="RECILENS Logo">
        </div>
    </header>
    

    <div class="form">
    <section class="profile-photo">
        <h2>Profile Photo</h2>
        <div class="photo-preview" id="photoPreviewContainer">
            <img id="profilePhotoPreview" src="" alt="Profile Photo" style="display: none;">
            <button id="editPhotoBtn" style="display: none;">Edit Photo</button>
        </div>
        <input type="file" accept="image/*" id="photoUpload" style="display: none;">
        <label for="photoUpload" id="uploadLabel">Upload Your Profile Photo</label>
        <div class="privacy-settings">
            <h3>Privacy Settings</h3>
            <select>
                <option value="Select here">Select Your Category</option>
                <option value="Employees">Employees</option>
                <option value="team">Team Members</option>
                <option value="hr">Only HR</option>
            </select>
        </div>
    </section>
    

        <section class="user-name">
            <h2>User Name</h2>
            <input type="text" placeholder="Preferred Name" id="userName">
            <div class="display-options">
                <h3>Display Options</h3>
                <select>
                    <option value="full">Full Name</option>
                    <option value="initials">Initials</option>
                </select>
            </div>
        </section>

        <section class="contact-info">
            <h2>Contact Information</h2>
            <input type="email" placeholder="Email" id="email">
            <input type="tel" placeholder="Phone Number" id="phone">
            <div class="privacy-control">
                <h3>Privacy Control</h3>
                <select>
                    <option value="Select here">Select Your Category</option>
                    <option value="team">Team Members</option>
                    <option value="hr">Company HR</option>
                </select>
            </div>
        </section>

        <section class="job-title">
            <h2>Job Title and Department</h2>
            <p id="jobTitle">Job Title: [Auto-populated]</p>
            <p id="department">Department: [Auto-populated]</p>
            <button>Suggest Changes</button>
            <div class="visibility-settings">
                <h3>Visibility Settings</h3>
                <select>
                    <option value="everyone">Public</option>
                    <option value="team">Private</option>
                </select>
            </div>
        </section>

        <section class="professional-background">
            <h2>Professional Background</h2>
            <textarea id="professionalBackground" placeholder="Education, Work Experience, Certifications"></textarea>
            <div id="suggestionBox" class="suggestion-box"></div>
            <input type="file" accept=".pdf,.doc,.docx" id="documentUpload">
            <label for="documentUpload"><h3>Upload Your Document</h3></label>
        </section>
        

        <section class="skills-expertise">
            <h2>Skills and Expertise</h2>
            <textarea placeholder="List your skills and rate proficiency"></textarea>
            <button>Endorse Skills</button>
        </section>

        <section class="interests-hobbies">
            <h2>Interests and Hobbies</h2>
            <textarea placeholder="Share your interests and hobbies"></textarea>
            <div class="privacy-options">
                <h3>Privacy Options</h3>
                <select>
                    <option value="everyone">Visible to Everyone</option>
                    <option value="team">Visible to Team</option>
                </select>
            </div>
        </section>

        <section class="goals-objectives">
            <h2>Goals and Objectives</h2>
            <textarea placeholder="Outline your professional goals"></textarea>
            <button>Connect with Mentors</button>
        </section>

        <section class="achievements">
            <h2>Achievements</h2>
            <textarea placeholder="Document significant achievements"></textarea>
            <input type="file" accept=".pdf,.doc,.docx" id="achievementUpload">
            <label for="achievementUpload">Upload Supporting Documentation</label>
            <div class="visibility-settings">
                <h3>Visibility Settings</h3>
                <select>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
            </div>
        </section>

        <section class="performance-metrics">
            <h2>Performance Metrics</h2>
            <p id="kpiDisplay">KPI: [Auto-populated]</p>
            <textarea placeholder="Add personal achievements or milestones"></textarea>
        </section>

        <section class="feedback-reviews">
            <h2>Feedback and Reviews</h2>
            <textarea placeholder="Store feedback and performance reviews"></textarea>
            <button>Edit Reflections</button>
        </section>

        <section class="user-preferences">
            <h2>User Preferences</h2>
            <textarea placeholder="Document preferences for communication styles"></textarea>
            <div class="notification-settings">
                <h3>Notification Settings</h3>
                <select>
                    <option value="email">Email</option>
                    <option value="sms">SMS</option>
                </select>
            </div>
        </section>

        <section class="technological-proficiency">
            <h2>Technological Proficiency</h2>
            <textarea placeholder="List tools and technologies"></textarea>
            <button>Link to Training Resources</button>
        </section>

        <section class="security-measures">
            <h2>Security Measures</h2>
            <ul>
                <li>Data Encryption</li>
                <li>Two-Factor Authentication</li>
                <li>Regular Backups</li>
                <li>User Consent</li>
                <li>Audit Trails</li>
            </ul>
        </section>
        <footer>
            <p>By allowing users to edit their profiles securely and document their achievements, you empower them to take ownership of their professional narrative while ensuring that data is protected.</p>
        </footer>
    </div>
    </div>
    <script>
         window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });
    </script>
    <script src="edit profile.js"></script>
</body>
</html>
