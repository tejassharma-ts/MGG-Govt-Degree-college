<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .results-container {
            max-width: 600px;
            margin: 0 auto;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Your Semester Results</h1>
    <div class="results-container">
        <?php include("fetch-results.php");?>
              <a href="logout.php">Logout</a>
    </div>
</body>
</html>

