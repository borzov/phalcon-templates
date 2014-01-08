<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    {{ get_title() }}
    {{ assets.outputCss('headerStyles') }}
</head>
<body>
    {{ partial("partials/header") }}
    <div class="content">
        {{ content() }}
    </div>
    {{ partial("partials/footer") }}
</body>
</html>