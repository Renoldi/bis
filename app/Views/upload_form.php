<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
</head>

<body>

    <?php foreach ($errors as $error) : ?>
        <li><?= esc($error) ?></li>
    <?php endforeach ?>

    <?= form_open_multipart('http://localhost:8080/api/UploadFile/image') ?>

    <input type="file" name="userfile" size="20" />

    <br /><br />

    <input type="submit" value="upload" />

    </form>

</body>

</html>