<?php
$query = "SELECT * FROM person ORDER BY id DESC";
$request = $pdo->query($query);
$persons = $request->fetchAll(PDO::FETCH_ASSOC);
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
                    <div class="ml-auto">
                        <a href="edit.php?id=<?= $person['id'] ?>">Edit</a>
                    </div>
                    <div class="ml-auto">

                        <form action="#" method="POST">
                            <input type="hidden" name="personToDelete" value="<?= $person['id'] ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this person?');">X</button>
                        </form>

                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="add.php">Add</a>

    <div id="calendar"></div>
</div>