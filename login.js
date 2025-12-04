document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault(); 

    const login = document.getElementById("login").value;
    const pass = document.getElementById("password").value;

    if(!login || !pass) {
        alert("Please fill in all fields");
        return;
    }

    const formData = new FormData();
    formData.append("login", login);
    formData.append("password", pass);

    const btn = document.getElementById("loginBtn");
    const originalText = btn.innerText;
    btn.innerText = "Loading...";
    btn.disabled = true;

    fetch("login.php", { method: "POST", body: formData })
        .then(res => res.text())
        .then(res => {
            btn.innerText = originalText;
            btn.disabled = false;

            if (res.trim() === "OK") {
                window.location.href = "index.php";
            } else {
                alert("Wrong data");
            }
        })
        .catch(err => {
            alert("Error connecting to server");
            btn.innerText = originalText;
            btn.disabled = false;
        });
 });