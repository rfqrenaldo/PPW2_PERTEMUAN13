<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Items</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        /* Table styles */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            table {
                width: 100%;
            }

            th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Items</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody id="items-table">
        </tbody>
    </table>

    <script>
        fetch('/api/items')
            .then(response => response.json())
            .then(data => {
                let rows = '';
                data.forEach(item => {
                    rows += `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.description}</td>
                        </tr>
                    `;
                });
                document.getElementById('items-table').innerHTML = rows;
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
