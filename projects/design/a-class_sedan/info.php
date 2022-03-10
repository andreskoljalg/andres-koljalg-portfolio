<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../../../style.css">
    <title>Andres Kõljalg</title>
</head>
<body>
    <div class="px-24 py-6 w-fit">
        <a href="../../../projects.php"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>  
    </div>
    <div>
        <div class="flex h-[36rem] overflow-x-scroll">
                <?php
                    $dir = "./";
                    $files = scandir($dir);
                    foreach($files as $file) {
                        if($file !== "." && $file !== "..") {
                            echo "<img src='$dir$file' class='h-full object-cover' />";
                        }
                    }
                ?>
        </div>
        <div class="px-24 py-6">
            <h1 class="font-['Hanson'] text-5xl mb-4">A-CLASS SEDAN</h1>
            <div class="text-xl font-['Times_New_Roman']">
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nihil harum rem voluptates quas laboriosam expedita. Non alias iste voluptatibus libero at voluptatum cumque ullam dolores nulla iure, magnam aut!
                    Optio quia expedita possimus ab, ipsum facere quas dolorum ex corporis nostrum aut dicta delectus ea obcaecati magni quam ratione explicabo? Possimus ullam dolore accusamus quidem maxime reiciendis, magnam eum!
                    Odio quis soluta veniam quas quae neque fugit, in quo. Sit sunt, praesentium ipsa eligendi quos odit quas enim culpa, dolores voluptates voluptatum tenetur repellat ut? Recusandae cum velit natus.
                </p>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nihil harum rem voluptates quas laboriosam expedita. Non alias iste voluptatibus libero at voluptatum cumque ullam dolores nulla iure, magnam aut!
                    Optio quia expedita possimus ab, ipsum facere quas dolorum ex corporis nostrum aut dicta delectus ea obcaecati magni quam ratione explicabo? Possimus ullam dolore accusamus quidem maxime reiciendis, magnam eum!
                    Odio quis soluta veniam quas quae neque fugit, in quo. Sit sunt, praesentium ipsa eligendi quos odit quas enim culpa, dolores voluptates voluptatum tenetur repellat ut? Recusandae cum velit natus.
                </p>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nihil harum rem voluptates quas laboriosam expedita. Non alias iste voluptatibus libero at voluptatum cumque ullam dolores nulla iure, magnam aut!
                    Optio quia expedita possimus ab, ipsum facere quas dolorum ex corporis nostrum aut dicta delectus ea obcaecati magni quam ratione explicabo? Possimus ullam dolore accusamus quidem maxime reiciendis, magnam eum!
                    Odio quis soluta veniam quas quae neque fugit, in quo. Sit sunt, praesentium ipsa eligendi quos odit quas enim culpa, dolores voluptates voluptatum tenetur repellat ut? Recusandae cum velit natus.
                </p>
            </div>
        </div>
    </div>
</body>
</html>