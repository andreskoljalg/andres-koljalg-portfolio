<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <title>Andres Kõljalg</title>
</head>
<body>
    <?php
        $photographyIndex = 1;
        $designIndex = 1;
        $otherIndex = 1;

        function addPhotographyIndex() {
            global $photographyIndex;
            $photographyIndex++;
        }

        function addDesignIndex() {
            global $designIndex;
            $designIndex++;
        }

        function addOtherIndex() {
            global $otherIndex;
            $otherIndex++;
        }

        function debug_to_console($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
            
            echo "<script>console.log('$output');</script>";
        }

        function imgLoad($dirPath, $index){
            $dir = ($dirPath . scandir($dirPath)[$index]);
            $files = scandir($dir);
            foreach($files as $file) {
                if($file !== "." && $file !== ".." && $file !== "info.php") {
                    echo "<img src='$dir/$file' class='h-[65vw] lg:h-full lg:object-cover ' loading='lazy' />";
                }
            }
        }
    ?>
    <div id="menu" class="fixed h-screen w-screen justify-center items-center translate-x-full flex flex-col text-3xl font-['Times_New_Roman'] lg:hidden bg-white duration-700 ease-in-out">
        <a href="/about.html">About</a>
        <p class="w-fit">&#8226</p>
        <a href="/projects.php">Projects</a>
        <p class="w-fit">&#8226</p>
        <a href="/journal.php">Journal</a>
        <p class="w-fit">&#8226</p>
        <a href="/contact.html" class="mb-6">Contact</a>
        <div class="w-12 h-12 flex justify-center items-center" id="menuToggle">
            <div class="w-12 fixed h-2 bg-black rotate-45"></div>
            <div class="w-12 fixed h-2 bg-black -rotate-45"></div>
        </div>
    </div>
    <header class="flex h-16 justify-between p-2 -translate-y-full ease-in-out duration-700 delay-300 lg:hidden" id="slide">
        <a href="/index.html" class="w-44"><img src="assets/svgs/ak_mainlogotitle.svg" class="h-full" alt="ak_mainlogotitle"></a>
        <div class="w-12 flex justify-between items-end py-2 flex-col" id="menuToggle">
            <div class="h-1/6 w-1/3 bg-black"></div>
            <div class="h-1/6 w-2/3 bg-black"></div>
            <div class="h-1/6 w-full bg-black"></div>
        </div>
    </header>
    <div class="hidden lg:block px-12 xl:px-24 py-8 w-fit">
        <a href="/index.html"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>  
    </div>
    <div class="flex flex-col h-screen w-full p-2 lg:py-24 lg:px-12 xl:px-24">
        <div class="flex flex-col justify-around h-full">
            <div class="flex flex-col">
                <a href="#photography" class="font-['Times_New_Roman'] text-[10vw] md:text-8xl lg:text-9xl mb-8 lg:mb-4 w-fit">01 Photography</a>
                <a href="#design" class="font-['Hanson'] text-[10vw] md:text-8xl lg:text-9xl mb-8 lg:mb-4 w-fit">02 DESIGN</a>
                <a href="#other" class="font-['AppleChancery'] text-[10vw] md:text-8xl lg:text-9xl mb-8 lg:mb-4 w-fit">03 other</a>
            </div>
            <div>
                <i class="fa fa-chevron-down text-5xl flex justify-center"></i>
            </div>
        </div>
    </div>
    <div>
   <!-- ####################
        01 PHOTOGRAPHY TITLE
        #################### -->
        <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
            <img src="assets/svgs/01_photography_title.svg" id="photography" class="w-5/6 lg:w-3/6" alt="photography_title">
        </div>

        <!-- ### PHOTOGRAPHY PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addPhotographyIndex();
                    $files = scandir("projects/photography");
                    echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">A-CLASS SEDAN</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        First time a car was given to me!
                    </p>
                    <p class="mb-4">
                        A-Class sedan, “cheapest” new Mercedes, still nice though. 
                    </p>
                    <p class="mb-4">
                        Drove around Tallinn with my friend Frank and took some photos. Weather wasn't that nice, 
                        but it played out well. Dark clouds added some nice characteristics to the pictures.
                    </p>
                    <p class="mb-4">
                        04.05.2020
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/photography/", $photographyIndex);
                ?>
            </a>
        </div>

        <!-- ### PHOTOGRAPHY PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addPhotographyIndex();
                    $files = scandir("projects/photography");
                    echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">TOYOTA YARIS GR</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        This one is really special to me.
                        Behind the steering wheel is my best friend Karl-Erik Idasaar, and we did a small 
                        video shoot in Hara. Hara is Karl's favorite place to drive in Estonia.
                    </p>
                    <p class="mb-4">
                        Unfortunately, Karl passed away a few weeks after this, so this was his last 
                        time at Hara. I'm happy to say that he absolutely sent it.
                    </p>
                    <p class="mb-4">
                        Hara, Estonia
                        30.09.2021
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/photography/", $photographyIndex);
                ?>
            </a>
        </div>

   <!-- ####################
        02 DESIGN TITLE
        #################### -->
        <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
            <img src="assets/svgs/02_design_title.svg" id="design" class="w-5/6 lg:w-3/6" alt="">
        </div>

        <!-- ### DESIGN PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addDesignIndex();
                    $files = scandir("projects/design");
                    echo 'projects/design/' . $files[$designIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">A-CLASS SEDAN</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        First time a car was given to me!
                    </p>
                    <p class="mb-4">
                        A-Class sedan, “cheapest” new Mercedes, still nice though. 
                    </p>
                    <p class="mb-4">
                        Drove around Tallinn with my friend Frank and took some photos. Weather wasn't that nice, 
                        but it played out well. Dark clouds added some nice characteristics to the pictures.
                    </p>
                    <p class="mb-4">
                        04.05.2020
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/design"); echo 'projects/design/' . $files[$designIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/design/", $designIndex);
                ?>
            </a>
        </div>

        <!-- ### DESIGN PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addDesignIndex();
                    $files = scandir("projects/design");
                    echo 'projects/design/' . $files[$designIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">TOYOTA YARIS GR</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        This one is really special to me.
                        Behind the steering wheel is my best friend Karl-Erik Idasaar, and we did a small 
                        video shoot in Hara. Hara is Karl's favorite place to drive in Estonia.
                    </p>
                    <p class="mb-4">
                        Unfortunately, Karl passed away a few weeks after this, so this was his last 
                        time at Hara. I'm happy to say that he absolutely sent it. 
                    </p>
                    <p class="mb-4">
                        Hara, Estonia
                        30.09.2021
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/design"); echo 'projects/design/' . $files[$designIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/design/", $designIndex);
                ?>
            </a>
        </div>

   <!-- ####################
        03 OTHER TITLE
        #################### -->
        <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
            <img src="assets/svgs/03_other_title.svg" id="other" class="w-5/6 lg:w-3/6" alt="">
        </div>
        
        <!-- ### OTHER PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addOtherIndex();
                    $files = scandir("projects/other");
                    echo 'projects/other/' . $files[$otherIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">A-CLASS SEDAN</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        First time a car was given to me!
                    </p>
                    <p class="mb-4">
                        A-Class sedan, “cheapest” new Mercedes, still nice though. 
                    </p>
                    <p class="mb-4">
                        Drove around Tallinn with my friend Frank and took some photos. Weather wasn't that nice, 
                        but it played out well. Dark clouds added some nice characteristics to the pictures.
                    </p>
                    <p class="mb-4">
                        04.05.2020
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/other"); echo 'projects/other/' . $files[$otherIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/other/", $otherIndex);
                ?>
            </a>
        </div>

        <!-- ### OTHER PROJECT BLOCK ### -->
        <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-10">
            <div class="col-span-2">
                <a href="<?php
                    addOtherIndex();
                    $files = scandir("projects/other");
                    echo 'projects/other/' . $files[$otherIndex] . '/info.php';
                ?>"><h1 class="font-['Hanson'] text-[10vw] sm:text-5xl md:text-6xl p-2">TOYOTA YARIS GR</h1></a>
                <div class="p-2 text-xl font-['Times_New_Roman']">
                    <p class="mb-4">
                        This one is really special to me.
                        Behind the steering wheel is my best friend Karl-Erik Idasaar, and we did a small 
                        video shoot in Hara. Hara is Karl's favorite place to drive in Estonia. 
                    </p>
                    <p class="mb-4">
                        Unfortunately, Karl passed away a few weeks after this, so this was his last 
                        time at Hara. I'm happy to say that he absolutely sent it. 
                    </p>
                    <p class="mb-4">
                        Hara, Estonia
                        30.09.2021
                    </p>
                </div>
            </div>
            <a href="<?php $files = scandir("projects/other"); echo 'projects/other/' . $files[$otherIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll">
                <?php
                    imgLoad("projects/other/", $otherIndex);
                ?>
            </a>
        </div>
    </div>

    <script src="animation.js"></script>
</body>
</html>