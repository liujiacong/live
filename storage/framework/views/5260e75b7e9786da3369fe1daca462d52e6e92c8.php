<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css','vendor/redis-manager')); ?>" rel="stylesheet">
    <script>
        window.basePath = '/<?php echo e(trim(config('redis-manager.base_path', 'redis-manager'), '/')); ?>'
    </script>
</head>
<body>
<div id="app"></div>

<!-- Scripts -->
<script src="<?php echo e(mix('js/app.js', 'vendor/redis-manager')); ?>"></script>
</body>
</html>
