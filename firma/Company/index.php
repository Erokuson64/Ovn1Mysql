<?php

include 'db_connect.php';

$query = "SELECT first_name, last_name, phone, email, street_address, postal_code, city FROM employees WHERE hire_date BETWEEN '2006-01-01' AND '2009-12-31'";
$result = $mysqli->query($query);


if (!$result) {
    die('Fel vid hämtning av data: ' . $mysqli->error);
}

$allEmployeesQuery = "SELECT * FROM employees";
$allEmployeesResult = $mysqli->query($allEmployeesQuery);

if (!$allEmployeesResult) {
    die('Fel vid hämtning av data: ' . $mysqli->error);
}

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Company Employees</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
            text-align: left;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        ul {
            width: 80%;
            margin: 20px auto;
            list-style-type: square;
        }
    </style>
</head>
<body>

<h2>Förnamn och efternamn på anställda som började mellan 2006 och 2009</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></li>
    <?php endwhile; ?>
</ul>

<h2>Alla anställda i en tabell</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Förnamn</th>
            <th>Efternamn</th>
            <th>Anställningsdatum</th>
            <th>Telefon</th>
            <th>E-post</th>
            <th>Address</th>
            <th>Post Nummer</th>
            <th>Stad</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $allEmployeesResult->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['hire_date']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['street_address']); ?></td>
                <td><?php echo htmlspecialchars($row['postal_code']); ?></td>
                <td><?php echo htmlspecialchars($row['city']); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>

<?php
$mysqli->close();
?>