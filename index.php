<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD Example</h1>
        <form id="crudForm">
            <input type="text" id="username" placeholder="Username" required>
            <input type="email" id="email" placeholder="Email" required>
            <button type="button" onclick="createUser()">Create</button>
        </form>
        <div id="userList"></div>
        <input type="number" id="userId" placeholder="User ID" required>
        <button type="button" onclick="updateUser()">Update</button>
    </div>
    <script src="script.js"></script>
</body>
</html>
