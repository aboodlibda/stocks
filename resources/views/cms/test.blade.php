<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Screen Table</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        table {
            width: 100%;
            height: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            font-size: 1.2rem;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="table-container">
    <table>
        <thead>
        <tr>
            <!-- Generate 18 header columns -->
            <script>
                for (let i = 1; i <= 18; i++) {
                    document.write(`<th>Column ${i}</th>`);
                }
            </script>
        </tr>
        </thead>
        <tbody>
        <tr>
            <!-- Generate 18 cells in a row -->
            <script>
                for (let i = 1; i <= 18; i++) {
                    document.write(`<td>Cell ${i}</td>`);
                }
            </script>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>
