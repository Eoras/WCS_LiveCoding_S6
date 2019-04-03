<?php

if ($edit) {
    // Check if ID is correct or redirect to home
    $query = "SELECT * FROM person WHERE id = " . $_GET['id'];
    $request = $pdo->query($query);
    $person = $request->fetch(PDO::FETCH_ASSOC);
    if (!$person) {
        header('Location: /');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)) {
    $errors = [];

    $data = $_POST;

    if (empty($_POST['last_name']) OR strlen($_POST['last_name']) < 2) {
        $errors['last_name'] = "The name must be greater than 1 character!";
    }
    if (empty($_POST['first_name']) OR strlen($_POST['first_name']) < 2) {
        $errors['first_name'] = "The first name must be greater than 1 character!";
    }
    if (!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", $_POST['phone_number'])) {
        $errors['phone_number'] = "The phone number must be in French format";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse e-mail n'est pas valide !";
    }
    if (!$errors) {
        if ($edit) {
            $query = "UPDATE person
                      SET first_name = :first_name, last_name = :last_name, email = :email, phone_number = :phone_number
                      WHERE id = :id";
        } else {
            $query = "INSERT INTO person VALUES (null, :first_name, :last_name, :email, :phone_number)";
        }

        $request = $pdo->prepare($query);
        if ($edit) {
            $request->bindValue(":id", $data['id'], PDO::PARAM_INT);
        }
        $request->bindValue(":first_name", $data['first_name'], PDO::PARAM_STR);
        $request->bindValue(":last_name", $data['last_name'], PDO::PARAM_STR);
        $request->bindValue(":email", $data['email'], PDO::PARAM_STR);
        $request->bindValue(":phone_number", $data['phone_number'], PDO::PARAM_STR);
        if ($request->execute()) {
            header("Location: /");
            exit();
        } else {
            echo "Error, contact the administrator !";
        }
    }
}
?>
<div class="mb-4">
    <h1><?= $edit ? "Edit" : "Add" ?></h1>

    <form method="POST" action="#" novalidate>

        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           value="<?= $_POST['last_name'] ?? $person["last_name"] ?? "" ?>">
                    <small class="text-danger font-weight-bold"><?= $errors['last_name'] ?? "" ?></small>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           value="<?= $_POST['first_name'] ?? $person["first_name"] ?? "" ?>">
                    <small class="text-danger font-weight-bold"><?= $errors['first_name'] ?? "" ?></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number"
                           value="<?= $_POST['phone_number'] ?? $person["phone_number"] ?? "" ?>">
                    <small class="text-danger font-weight-bold"><?= $errors['phone_number'] ?? "" ?></small>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= $_POST['email'] ?? $person["email"] ?? "" ?>">
                    <small class="text-danger font-weight-bold"><?= $errors['email'] ?? "" ?></small>
                </div>
            </div>
        </div>

        <input type="hidden" class="form-control" id="id" name="id" value="<?= $person['id'] ?? "" ?>">
        <button type="submit" class="btn btn-primary"><?= $edit ? "Save" : "Add" ?></button>
    </form>
</div>
