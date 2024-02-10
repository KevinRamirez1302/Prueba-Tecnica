<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Management Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
         plugins: [
      
      require('@tailwindcss/forms'),
    ],
  }
  </script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            padding: 20px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        h3 {
            margin-top: 0;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Sales</h2>
            <p>Total Sales: $10,000</p>
            <p>Average Sales: $500</p>
            <div class="card-footer">
                <p>Last 30 Days</p>
                <p>View Details</p>
            </div>
        </div>
        <div class="card">
            <h2>Customers</h2>
            <p>Total Customers: 500</p>
            <p>New Customers: 20</p>
            <div class="card-footer">
                <p>Last 30 Days</p>
                <p>View Details</p>
            </div>
        </div>
        <div class="card">
            <h2>Products</h2>
            <p>Total Products: 1,000</p>
            <p>Out of Stock: 10</p>
            <div class="card-footer">
                <p>Last 30 Days</p>
                <p>View Details</p>
            </div>
        </div>
    </div>
</body>
</html>