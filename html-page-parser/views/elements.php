<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            margin-top: 60px;
        }
        pre {
            max-height: 300px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Source:</strong> <?= $url; ?></div>
                    <div class="panel-body">
                        <pre><?= htmlentities($content); ?></pre>
                    </div>
                </div>

                <p><strong>Elements total:</strong> <?= $elements->count(); ?></p>

                <?php if ($elements->count()): ?>
                    <p><strong>Unique elements count:</strong> <?= $elements->unique('name')->count(); ?></p>
                    <p><strong>Unique Elements list:</strong></p>
                    <p class="elements">
                        <?php foreach ($elements->unique('name') as $element): ?>
                            <code><?= $element; ?></code>
                        <?php endforeach; ?>
                    </p>
                    <p><strong>Full Elements list:</strong></p>
                    <p class="elements">
                        <?php foreach ($elements as $element): ?>
                            <code><?= $element->name(); ?></code>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
