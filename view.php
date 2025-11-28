<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Перегляд Accordion</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">

<header class="header">
    <h1 class="logo">Перегляд Accordion</h1>
    <nav class="menu-wrapper">
        <ul class="menu">
            <li><a href="index.php">Головна</a></li>
            <li><a href="page1.php">Створити</a></li>
            <li><a href="view.php">Перегляд</a></li>
        </ul>
    </nav>
</header>

<div class="block3" id="contentBlock">
    Завантаження...
</div>

</div>

<script>
function loadData() {
    fetch("load.php")
    .then(r => r.json())
    .then(data => {
        let html = "<h2>Accordion</h2>";
        html += `<div class="accordion">`;

        let keys = Object.keys(data);
        let pairCount = keys.length / 2;

        for (let i=1; i<=pairCount; i++) {
            html += `
                <div class="item">
                    <button class="title">${data["title"+i]}</button>
                    <div class="text">${data["text"+i]}</div>
                </div>
            `;
        }

        html += `</div>`;
        document.getElementById("contentBlock").innerHTML = html;

        document.querySelectorAll(".title").forEach(btn => {
            btn.onclick = () => {
                btn.nextElementSibling.classList.toggle("show");
            };
        });
    });
}

// автооновлення кожні 2 секунди
setInterval(loadData, 2000);

loadData();
</script>

<style>
.text { display:none; padding:10px; background:#eef; }
.text.show { display:block; }
.title { width:100%; padding:10px; background:#ddd; cursor:pointer; }
</style>

</body>
</html>
