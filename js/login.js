document.getElementById("loginForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    let username = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    // Clear previous errors
    let errors = [];
    if (username === "") errors.push("Email/Username is required.");
    if (password === "") errors.push("Password is required.");

    if (errors.length > 0) {
        Swal.fire({
            icon: "error",
            title: "Validation Error",
            html: errors.join("<br>")
        });
        return;
    }

    // Send login request
    let formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    try {
        let response = await fetch("login.php", {
            method: "POST",
            body: formData
        });

        let result = await response.json();

        if (result.success) {
            Swal.fire({
                icon: "success",
                title: "Login Successful",
                text: "Welcome " + result.username,
                timer: 2000,
                showConfirmButton: false
            });

            setTimeout(() => {
                // Redirect based on role
                if (result.role === "student") {
                    window.location.href = "student_dashboard.html";
                } else if (result.role === "faculty") {
                    window.location.href = "faculty_dashboard.html";
                } else if (result.role === "faculty_intern") {
                    window.location.href = "fi_dashboard.html";
                } else {
                    window.location.href = "dashboard.html";
                }
            }, 2000);

        } else {
            Swal.fire({
                icon: "error",
                title: "Login Failed",
                text: result.message
            });
        }

    } catch (err) {
        Swal.fire({
            icon: "error",
            title: "Server Error",
            text: "Unable to connect to the server."
        });
    }
});
