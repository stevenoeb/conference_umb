<!DOCTYPE html>
<html>

<head>
    <style>
        /* Gaya CSS untuk PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        h3.center {
            text-align: center;
            font-size: 12pt;
            margin-top: 20px;
            /* Jarak dari konten di bawahnya */
        }

        .title {
            font-size: 16pt;
            text-align: center;
            margin-bottom: 20px;
            /* Jarak dari garis bawah */
        }

        em {
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="title"><?= $title ?></div>
    <h3 class="center">Abstract</h3>
    <p><em><?= $abstract ?></em></p>
</body>

</html>