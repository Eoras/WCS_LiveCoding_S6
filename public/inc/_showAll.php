<?php
$query = "SELECT * FROM person ORDER BY id DESC";
$request = $pdo->query($query);
$persons = $request->fetchAll();
?>

<div class="mb-4">
    <h1>Show All</h1>
    <ul class="list-group mb-3">
        <?php foreach ($persons as $person) : ?>
            <li class="list-group-item d-flex align-items-center">
                <div>
                    <?= $person['first_name'] ?? "" ?> <?= $person['last_name'] ?? "" ?><br>
                    <?= $person['email'] ?? "" ?><br>
                    <i class="text-muted"><?= $person['phone_number'] ?? "No phone number" ?></i>
                </div>
                <div class="ml-auto">
                    <a href="edit.php?id=<?= $person['id'] ?>">Edit</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="add.php">Add</a>
</div>