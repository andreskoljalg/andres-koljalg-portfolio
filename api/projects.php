<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/style.css">
    <title>Andres Kõljalg</title>
</head>
<body class="duration-500 ease-in-out opacity-0">
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
        <a href="javascript:delay('/about.html')">About</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/projects.php')">Projects</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/api/journal.php')">Journal</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/contact.html')" class="mb-6">Contact</a>
        <div class="w-12 h-12 flex justify-center items-center" id="menuToggle">
            <div class="w-12 fixed h-2 bg-black rotate-45"></div>
            <div class="w-12 fixed h-2 bg-black -rotate-45"></div>
        </div>
    </div>
    <header class="flex h-16 justify-between p-2 -translate-y-full ease-in-out duration-700 delay-300 lg:hidden" id="slide">
        <a href="javascript:delay('/index0.html')" class="w-44"><img src="/assets/svgs/ak_mainlogotitle.svg" class="h-full" alt="ak_mainlogotitle"></a>
        <div class="w-12 flex justify-between items-end py-2 flex-col" id="menuToggle">
            <div class="h-1/6 w-1/3 bg-black"></div>
            <div class="h-1/6 w-2/3 bg-black"></div>
            <div class="h-1/6 w-full bg-black"></div>
        </div>
    </header>
    <div class="hidden lg:block px-12 xl:px-24 py-8 w-fit">
        <a href="javascript:delay('/index0.html')"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>  
    </div>
    <div class="translate-y-[100vh] duration-700 delay-300 ease-in-out lg:translate-y-0" id="slide">
        <div class="flex flex-col h-screen w-full p-2 lg:pb-24 lg:px-12 xl:px-24">
            <div class="flex flex-col justify-around h-fit gap-10">
                <div class="flex flex-col gap-10 mt-20 sm:mt-12 lg:m-0 xl:mt-12">
                    <a href="#photography">
                        <img src="/assets/svgs/01_photography_title.svg" class="w-[65vw] sm:w-1/2 md:w-1/3 xl:w-1/4 max-w-md" alt="photography_title">
                    </a>
                    <a href="#design">
                        <img src="/assets/svgs/02_design_title.svg" class="w-[75vw] sm:w-8/12 md:w-6/12 xl:w-5/12 max-w-md" alt="design_title">
                    </a>
                    <a href="#other">
                        <img src="/assets/svgs/03_other_title.svg" class="w-[50vw] sm:w-6/12 md:w-4/12 xl:w-3/12 max-w-md" alt="other_title">
                    </a>
                </div>
                <div class="mt-24 sm:mt-12 lg:m-0 xl:mt-12">
                    <a href="#photography"><i class="fa fa-chevron-down text-5xl flex justify-center"></i></a>
                </div>
            </div>
        </div>
        <div>
       <!-- ####################
            01 PHOTOGRAPHY TITLE
            #################### -->
            <div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
                <img src="/assets/svgs/01_photography_title.svg" id="photography" class="w-4/6 lg:w-3/6" alt="photography_title">
            </div>
            <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">
                <img src="/assets/svgs/01_photography_mobile.svg" id="photography" class="w-4/6" alt="photography_title">
            </div>

            <!-- ### PHOTOGRAPHY PROJECT BLOCK ### -->
            <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                <div class="lg:w-4/12">
                    <a href="<?php addPhotographyIndex(); $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>">
                    <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2">A-CLASS SEDAN</h1></a>
                    <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
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
                <a href="<?php $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">
                    <?php
                        imgLoad("projects/photography/", $photographyIndex);
                    ?>
                </a>
            </div>

            <!-- ### PHOTOGRAPHY PROJECT BLOCK ### -->
            <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                <div class="lg:w-4/12">
                    <a href="<?php addPhotographyIndex(); $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>">
                    <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2">TOYOTA YARIS GR</h1></a>
                    <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
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
                            Drove around Tallinn with my friend Frank and took some photos. Weather wasn't that nice, 
                            but it played out well. Dark clouds added some nice characteristics to the pictures.
                        </p>
                        <p class="mb-4">
                            Hara, Estonia
                            30.09.2021
                        </p>
                    </div>
                </div>
                <a href="<?php $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">
                    <?php
                        imgLoad("projects/photography/", $photographyIndex);
                    ?>
                </a>
            </div>
            <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                <div class="lg:w-4/12">
                    <a href="<?php addPhotographyIndex(); $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>">
                    <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2">TOYOTA YARIS GR</h1></a>
                    <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
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
                            Drove around Tallinn with my friend Frank and took some photos. Weather wasn't that nice, 
                            but it played out well. Dark clouds added some nice characteristics to the pictures.
                        </p>
                        <p class="mb-4">
                            Hara, Estonia
                            30.09.2021
                        </p>
                    </div>
                </div>
                <a href="<?php $files = scandir("projects/photography"); echo 'projects/photography/' . $files[$photographyIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">
                    <?php
                        imgLoad("projects/photography/", $photographyIndex);
                    ?>
                </a>
            </div>

       <!-- ####################
            02 DESIGN TITLE
            #################### -->
            <div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
                <img src="/assets/svgs/02_design_title.svg" id="design" class="w-4/6 lg:w-3/6" alt="">
            </div>
            <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">
                <img src="/assets/svgs/02_design_mobile.svg" id="design" class="w-4/6" alt="">
            </div>

            <!-- ### DESIGN PROJECT BLOCK ### -->
            <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                <div class="lg:w-4/12">
                    <a href="<?php addDesignIndex(); $files = scandir("projects/design"); echo 'projects/design/' . $files[$designIndex] . '/info.php';?>">
                    <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2">A-CLASS SEDAN</h1></a>
                    <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
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
                <a href="<?php $files = scandir("projects/design"); echo 'projects/design/' . $files[$designIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">
                    <?php
                        imgLoad("projects/design/", $designIndex);
                    ?>
                </a>
            </div>

       <!-- ####################
            03 OTHER TITLE
            #################### -->
            <div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
                <img src="/assets/svgs/03_other_title.svg" id="other" class="w-4/6 lg:w-3/6" alt="">
            </div>
            <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">
                <img src="/assets/svgs/03_other_mobile.svg" id="other" class="w-4/6" alt="">
            </div>
            
            <!-- ### OTHER PROJECT BLOCK ### -->
            <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                <div class="lg:w-4/12">
                    <a href="<?php addOtherIndex(); $files = scandir("projects/other"); echo 'projects/other/' . $files[$otherIndex] . '/info.php';?>">
                    <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2">A-CLASS SEDAN</h1></a>
                    <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
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
                <a href="<?php $files = scandir("projects/other"); echo 'projects/other/' . $files[$otherIndex] . '/info.php';?>" class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">
                    <?php
                        imgLoad("projects/other/", $otherIndex);
                    ?>
                </a>
            </div>
        </div>
    </div>

    <script src="/animation.js"></script>
</body>
</html>