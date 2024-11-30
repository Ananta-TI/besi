<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #374151;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 20px;
            color: #4b5563;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 0.875rem;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button {
            background-color: #2563eb;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .status-message {
            color: #4ade80;
            font-size: 0.875rem;
            transition: opacity 0.5s;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h2>Update Password</h2>
        <p>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="/password/update" class="mt-6 space-y-6">
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" name="current_password" type="password" autocomplete="current-password" />
            <div class="error"> <!-- Error message for current password --> </div>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" name="password" type="password" autocomplete="new-password" />
            <div class="error"> <!-- Error message for new password --> </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <div class="error"> <!-- Error message for password confirmation --> </div>
        </div>

        <div class="button-container">
            <button type="submit">Save</button>
            <p class="status-message" style="display: none;">Saved.</p>
        </div>
    </form>
</div>

<script>
    // Simulating a status message display
    const form = document.querySelector('form');
    const statusMessage = document.querySelector('.status-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission for demo purposes
        statusMessage.style.display = 'block';
        setTimeout(() => {
            statusMessage.style.opacity = '0';
        }, 2000);
    });
</script>

</body>
</html>
