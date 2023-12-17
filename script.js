document.addEventListener("DOMContentLoaded", function () {
    // Load initial user list
    readUsers();
});

function createUser() {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;

    if (username && email) {
        const formData = new FormData();
        formData.append("username", username);
        formData.append("email", email);

        fetch("create_user.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                readUsers(); // Refresh user list after creating a user
            })
            .catch(error => console.error("Error:", error));
    }
}

function readUsers() {
    fetch("read_users.php")
        .then(response => response.json())
        .then(data => {
            const userList = document.getElementById("userList");
            userList.innerHTML = "";

            data.forEach(user => {
                const userDiv = document.createElement("div");
                userDiv.innerHTML = `<p>${user.id} | ${user.username} - ${user.email} 
                                     <button onclick="deleteUser(${user.id})">Delete</button></p>`;
                userList.appendChild(userDiv);
            });
        })
        .catch(error => console.error("Error:", error));
}

function deleteUser(userId) {
    fetch(`delete_user.php?id=${userId}`)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            readUsers(); // Refresh user list after deleting a user
        })
        .catch(error => console.error("Error:", error));
}
function updateUser() {
    const userId = document.getElementById("userId").value;
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;


    if (userId && username && email) {
        const formData = new FormData();
        formData.append("userId", userId);
        formData.append("username", username);
        formData.append("email", email);

        fetch("update_user.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                readUsers(); // Refresh user list after updating a user
            })
            .catch(error => console.error("Error:", error));
    }
}
