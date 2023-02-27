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


    <main>

      <div class="demo-flex-spacer"></div>
      <div class="container d-flex align-items-center justify-content-center align-content-center flex-column">
        <h3 class="mb-3" style="margin-top:10%">Задание № 2</h3>
        <form method="get" action="task2.php">
        <label for="inputTask2_4" class="form-label">Ссылка</label>
        <input name="str" type="text" id="inputTask2_4" class="form-control" aria-describedby="inputHelpTask2_4">
        <div id="inputHelpTask2_4" class="form-text" style="color:black">
            Введите ссылку вида:
            <div class="highlight">
                <pre tabindex="0" class="chroma">
                    <code class="language-sh" data-lang="sh">
                        http://asozd.duma.gov.ru/main.nsf/(Spravka)?OpenAgent&RN=<номер законопроекта>&<целое число>
                    </code>
                </pre>
            </div>
            Полученная ссылка будет иметь формат:
            <div class="highlight">
                <pre tabindex="0" class="chroma">
                    <code class="language-sh" data-lang="sh">
                        http://sozd.parlament.gov.ru/bill/<номер законопроекта>
                    </code>
                </pre>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Сгенерировать">
    </form>
      </div>
      
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>