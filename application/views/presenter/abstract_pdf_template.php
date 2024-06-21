<!-- application/views/presenter/abstract_pdf_template.php -->
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
            font-size: 16pt;
            border-bottom: 1px solid black;
            padding-bottom: 5px;
            margin-bottom: 20px;
            /* Jarak dari konten di bawahnya */
        }

        .title {
            font-size: 16pt;
            text-align: center;
            margin-top: 20px;
            /* Jarak dari garis atas */
        }

        em {
            font-style: italic;
        }
    </style>
</head>

<body>
    <h3 class="center">Abstract</h3>
    <div class="title"><?= $title ?></div>
    <p><em><?= $abstract ?></em></p>
</body>

</html>