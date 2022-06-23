<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ОСББ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<header class="d-flex align-items-center justify-content-between">
    <div class="d-flex flex-column align-items-center justify-content-center logo">
        <h1>ОСББ</h1>
        <p class="abbr">Об'єднання співвласників багатоквартирного будинку</p>
    </div>
    <div class="d-flex align-items-center">
        <a href="index.php" class="to-main">На головну</a>
    </div>
</header>
<main>
    <h1 class="form-title text-center">Заповніть форму та залиште питання.</h1>
    <?php
    require_once __DIR__ . '/incs/data.php';
    require_once __DIR__ . '/incs/function.php';
    if(!empty($_POST)){
        $fields = load($fields);
        if($errors = validate($fields)){
               echo '<div class="d-flex flex-column align-items-center">'.$errors.'</div>';
         }
         else{
            tofile($_POST);
        }
    }
    ?>
    <form method="post" class="form d-flex flex-column align-items-center">
        <p>
            <label for="surname">Прізвище:</label>
            <input type="text" name="surname" id = "surname">
        </p>
        <p>
            <label for="name">Ім'я</label>
            <input type="text" name="name" id = "name">
        </p>
        <p>
            <label for="flat_num">Номер квартири</label>
            <input type="text" name="flat_num" id = "flat_num">
        </p>
        <p>
            <label for="email">Електронна скринька:</label>
            <input type="text" name="email" id="email">
        </p>
        <p>
            <label for="message">Текст повідомлення:</label>
            <textarea rows="10" name="message" id="message"></textarea>
        </p>
        <p>
            <input name="agree" type="checkbox" id="agree">
            <label for="agree" class="confirm">Даю згоду на обробку особистих даних</label>
        </p>
    <!--<input type="submit" value = "Submit" name = "submit" class="submit"> -->
        <button type="submit" class = "submit">Надіслати</button>
    </form>
</main>
</body>
</html>