<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Integration</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <h1>PHP MySQL Integration</h1>
    </header>
    <main>
        <div class="field">
            <label for="filter">Title Filter:</label>
             <input type="text" name="filter" id="filter">
        </div>
        <div class="field">
            <input type="button" id="filter-btn" value="Get Titles">
        </div>
        <section>
            <h2>Results</h2>
            <div class="results"></div>
            <div class="error"></div>
        </section>
    </main>
    <script src="js/main.js"></script>
</body>

</html>