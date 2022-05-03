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
<body class="duration-500 ease-in-out opacity-0">
    <div id="menu" class="fixed h-screen w-screen justify-center items-center translate-x-full flex flex-col text-3xl font-['Times_New_Roman'] lg:hidden bg-white duration-700 ease-in-out">
        <a href="javascript:delay('/about.html')">About</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/projects.php')">Projects</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/journal.php')">Journal</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/contact.html')" class="mb-6">Contact</a>
        <div class="w-12 h-12 flex justify-center items-center" id="menuToggle">
            <div class="w-12 fixed h-2 bg-black rotate-45"></div>
            <div class="w-12 fixed h-2 bg-black -rotate-45"></div>
        </div>
    </div>
    <header class="flex h-16 justify-between p-2 -translate-y-full ease-in-out duration-700 delay-300 lg:hidden" id="slide">
        <a href="javascript:delay('/index0.html')" class="w-44"><img src="../../../assets/svgs/ak_mainlogotitle.svg" class="h-full" alt="ak_mainlogotitle"></a>
        <div class="w-12 flex justify-between items-end py-2 flex-col" id="menuToggle">
            <div class="h-1/6 w-1/3 bg-black"></div>
            <div class="h-1/6 w-2/3 bg-black"></div>
            <div class="h-1/6 w-full bg-black"></div>
        </div>
    </header>
    <div class="hidden lg:block px-12 2xl:px-24 py-8 w-fit">
        <a href="javascript:delay('/projects.php')"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>  
    </div>
    <div class="flex flex-col-reverse lg:flex-col translate-y-[100vh] duration-700 delay-300 ease-in-out lg:translate-y-0" id="slide">
        <div class="lg:flex lg:overflow-x-scroll lg:h-[36rem]">
                <?php
                    $dir = "./";
                    $files = scandir($dir);
                    foreach($files as $file) {
                        if($file !== "." && $file !== ".." && $file !== "info.php") {
                            echo "<img src='$dir$file' class='h-full object-cover w-full lg:w-fit' />";
                        }
                    }
                ?>
        </div>
        <div class="p-2 sm:p-8 2xl:px-24">
            <h1 class="font-['Hanson'] text-3xl sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl mb-4">MERCEDES BENZ A-CLASS SEDAN</h1>
            <div class="font-['Times_New_Roman']">
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
                    04.05.2020
                </p>
            </div>
        </div>
    </div>
    <script src="../../../animation.js"></script>
</body>
</html>