<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tablo Örneği</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #6e8efb, #40ddbb);
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #d2e3f4;
}

td:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

td:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}


    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Tablosu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Kullanıcı Tablosu</h1>
        <div class="table-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password_db = ""; 
            $dbname = "kullanicilar";

            $conn = new mysqli($servername, $username, $password_db, $dbname);

            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            $sql = "SELECT name, surname, email FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><thead><tr><th>İsim</th><th>Soyisim</th><th>E-posta</th></tr></thead><tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["surname"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Kayıtlı kullanıcı yok.";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

