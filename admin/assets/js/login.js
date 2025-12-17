document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    const email = this.email.value;
    const password = this.password.value;

    fetch('../admin/api/loginApi.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response from API:', data);

        if (data.success) {
            alert(data.message);
            window.location.href = 'dashboard.php';
        } else {
            alert(data.error); // Shows "Invalid email or password" if wrong
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Something went wrong. Please try again.');
    });
});
