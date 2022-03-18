<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Andres Kõljalg</title>
</head>
<body>
    <div class="px-24 py-6 fixed">
        <a href="index.html"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>
    </div>
    <div class="flex h-screen w-screen pl-24 py-24 items-center">
        <div class="flex flex-col px-12 justify-center">
            <h1 class="font-['Hanson'] text-6xl">JOURNAL</h1>
        </div>
        <div class="flex h-[30rem] overflow-x-scroll">
            <?php
                $dir = "assets/journal/";
                $files = scandir($dir);
                foreach($files as $file) {
                    if($file !== "." && $file !== "..") {
                        echo "<img src='$dir$file' class='h-full' loading='lazy' />";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>