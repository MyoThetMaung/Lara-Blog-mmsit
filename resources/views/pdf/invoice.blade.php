<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Testing</title>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias nisi odio sint totam corrupti accusamus facere doloribus minus pariatur dignissimos eum, adipisci tempora. At cupiditate adipisci nesciunt minima et accusantium! lorem</p>
    @foreach($posts as $post)
            {{ $post }}
    @endforeach
    <br><br><br>
    <?php
        echo DNS1D::getBarcodeHTML('4445645656', 'C39');
    ?>
</body>
</html>