<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
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
        .button-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        button {
            background-color: #2563eb;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .danger-button {
            background-color: #ef4444;
        }
        .danger-button:hover {
            background-color: #dc2626;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }
        .error {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h2>Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <div class="button-container">
        <button class="danger-button" onclick="openModal()">Delete Account</button>
    </div>

    <div id="confirm-user-deletion" class="modal">
        <div class="modal-content">
            <h2>Are you sure you want to delete your account?</h2>
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

            <div class="mt-6">
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" class="mt-1 block w-3/4" />
                <div class="error" id="password-error"></div>
            </div>

            <div class="mt-6 button-container">
                <button onclick="closeModal()">Cancel</button>
                <button class="danger-button" onclick="deleteAccount()">Delete Account</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('confirm-user-deletion').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('confirm-user-deletion').style.display = 'none';
    }

    function deleteAccount() {
        // Simulate account deletion logic
        const password = document.getElementById('password').value;
        const passwordError = document.getElementById('password-error');

        if (!password) {
            passwordError.textContent = 'Password is required.';
            return;
        }

        // Here you would typically send the password to your server for verification
        alert('Account deleted successfully!'); // Simulate successful deletion
        closeModal();
    }
</script>

</body>
</html>
