<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Exam-PDO & MVC</title>
</head>
<header>
    
</header>
<body>
<form method="get" class="mb-4">
    <input type="hidden" name="page" value="planet">
    <div class="input-group">
        <input type="text" name="search" value="<?= htmlentities($_GET['search'] ?? '') ?>" placeholder="Chercher une planète" class="form-control">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>