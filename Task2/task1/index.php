<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="style.sass" />
  <title>ЛР2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>

<body>

  <!-- Background & animion & navbar & title -->
  <div class="container-fluid">
    <!-- Background animtion-->
    <div class="background">
      <div class="cube"></div>
      <div class="cube"></div>
      <div class="cube"></div>
      <div class="cube"></div>
      <div class="cube"></div>
    </div>

    <main>

      <div class="demo-flex-spacer"></div>
      <div class="container d-flex align-items-center justify-content-center align-content-center flex-column">
        <h3 class="mb-3">Задание № 1</h3>
        <form method="get" action="task1.php" class="mb-3">

          <label for="inputTask2_3" class="form-label">Строка</label>

          <input name="str" type="text" id="inputTask2_3" class="form-control" aria-describedby="inputHelpTask2_3">
          <div id="inputHelpTask2_3" class="form-text mb-3" style="color:black">
            Введите строку с целыми числами. Будут найдены числа,
            стоящие в кавычках и увеличены в два раза.
            Пример: из строки 2aaa'3'bbb'4' будет получена строку
            2aaa'6'bbb'8'.
          </div>
          <input type="submit" class="btn btn-primary" value="Проверить">
        </form>
      </div>
      
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>