<?php
// Include headers
include './inc/_header.html';

if (isset($_POST) && !empty($_POST)) {

    $errors = [];

    if (empty($_POST['lastName']) OR strlen($_POST['lastName']) < 2) {
        $errors['lastName'] = "The name must be greater than 1 character!";
    }
    if (empty($_POST['firstName']) OR strlen($_POST['firstName']) < 2) {
        $errors['firstName'] = "The first name must be greater than 1 character!";
    }
    if (!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/", $_POST['phoneNumber'])) {
        $errors['phoneNumber'] = "The phone number must be in French format";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse e-mail n'est pas valide !";
    }

    if (!$errors) {
        header("location: form_valid.php");
        exit();
    }
}
?>
    <h1>My form</h1>

    <form method="POST" action="form.php" novalidate>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName"
                   value="<?= $_POST['lastName'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['lastName'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName"
                   value="<?= $_POST['firstName'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['firstName'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                   value="<?= $_POST['phoneNumber'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['phoneNumber'] ?? "" ?></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?= $_POST['email'] ?? "" ?>">
            <small class="text-danger font-weight-bold"><?= $errors['email'] ?? "" ?></small>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>


<?php
// Include footer
include "./inc/_footer.html";
