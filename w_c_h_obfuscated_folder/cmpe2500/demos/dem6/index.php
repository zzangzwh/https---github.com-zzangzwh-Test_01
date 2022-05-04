<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL Integration</title>
    <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>

<body>
    <header>
        <h1>PHP MySQL Integration - Create, Update & Delete</h1>
    </header>
    <main>
        <section class="filter">
            <h2>Filter All Titles</h2>
            <div class="field">
                <label for="filter">Title Filter:</label><input type="text" name="filter" id="filter" />
                <input type="button" id="getTitles" name="getTitles" value="Get Titles">
            </div>
            <section>
                <h3>Results</h3>
                <div class="results"></div>
                <div class="error"></div>
            </section>
        </section>
        <!-- ADDED FOR DEMO 04 -->
        <section class="title-form">
            <h2>Create or Update a Title</h2>
            <div class="field">
                <label for="title-id">Title Id</label>
                <input type="text" name="title-id" id="title-id" />
            </div>
            <div class="field">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" />
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" />
            </div>
            <div class="field">
                <input type="button" id="create" name="create" value="Create">
                <input type="button" id="update" name="update" value="Update">
            </div>
        </section>
        <!-- END ADDED FOR DEMO 04 -->
    </main>
    <script src="js/index.js"></script>
</body>

</html>