<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Include FontAwesome and CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="/style.css"/>
    <title>Andres Kõljalg</title>
</head>
<body class="duration-500 ease-in-out opacity-0">
<?php
require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/../public', 'apiKeys.env');
$dotenv->load();

$space_id = $_ENV['CONTENTFUL_SPACE_ID'];
$access_token = $_ENV['CONTENTFUL_ACCESS_TOKEN'];
$environment_id = 'master';

// Initialize Guzzle client
$client = new Client([
    'base_uri' => 'https://cdn.contentful.com',
    'timeout'  => 10.0,
]);

// Fetch projects for each category
$categories = ['photography', 'design', 'other'];
$projectsByCategory = [];

foreach ($categories as $categoryName) {
    $response = $client->request('GET', "/spaces/$space_id/environments/$environment_id/entries", [
        'query' => [
            'access_token' => $access_token,
            'content_type' => 'category', // Your Content Type ID
            'fields.projectCategory' => $categoryName,
            'order' => '-fields.projectDate',
            'include' => 1,
        ],
        'http_errors' => false,
    ]);

    if ($response->getStatusCode() == 200) {
        $data = json_decode($response->getBody(), true);
        $projectsByCategory[$categoryName] = $data;
    } else {
        // Handle error
        $projectsByCategory[$categoryName] = [];
    }
}
$projectIndex = 0; // Initialize project index
?>
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
        <?php
        if (isset($projectsByCategory['photography']['items'])) {
            foreach ($projectsByCategory['photography']['items'] as $project) {
                $fields = $project['fields'];
                $projectTitle = $fields['projectTitle'];
                $projectDescription = $fields['projectDescription'];
                $projectDate = $fields['projectDate'];
                $projectLocation = isset($fields['projectLocation']) ? $fields['projectLocation'] : '';
                $projectMedia = isset($fields['projectMedia']) ? $fields['projectMedia'] : [];
                $projectId = $project['sys']['id'];
                $formattedDate = date('d.m.Y', strtotime($projectDate));
                $projectLink = '/project.php?id=' . $projectId;

                // Determine scroll direction based on project index
                $scrollDirection = ($projectIndex % 2 === 0) ? 'scroll-left' : 'scroll-right';
                ?>
                <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                    <div class="lg:w-4/12">
                        <a href="<?php echo $projectLink; ?>">
                            <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2"><?php echo $projectTitle; ?></h1>
                        </a>
                        <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
                            <p class="mb-4">
                                <?php echo nl2br($projectDescription); ?>
                            </p>
                            <p class="mb-4">
                                <?php echo $formattedDate; ?><br/>
                                <?php echo $projectLocation; ?>
                            </p>
                        </div>
                    </div>
                    <div class="lg:h-[36rem] flex overflow-hidden lg:w-8/12 auto-scroll <?php echo $scrollDirection; ?>">
                        <div class="scroll-content">
                            <?php
                            if ($projectMedia) {
                                // Duplicate the images by looping twice
                                for ($i = 0; $i < 2; $i++) {
                                    foreach ($projectMedia as $media) {
                                        // Get the asset details
                                        $assetId = $media['sys']['id'];
                                        // Find the asset in the includes
                                        foreach ($projectsByCategory['photography']['includes']['Asset'] as $asset) {
                                            if ($asset['sys']['id'] == $assetId) {
                                                $fileUrl = 'https:' . $asset['fields']['file']['url'];
                                                $imageUrl = $fileUrl . '?fm=webp&q=40&w=500';
                                                echo "<img src='$imageUrl' class='h-[65vw] lg:h-full lg:object-cover' loading='lazy' />";
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $projectIndex++; // Increment project index
            }
        }
        ?>

        <!-- ####################
             02 DESIGN TITLE
             #################### -->
        <div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
            <img src="/assets/svgs/02_design_title.svg" id="design" class="w-4/6 lg:w-3/6" alt="">
        </div>
        <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">
            <img src="/assets/svgs/02_design_mobile.svg" id="design" class="w-4/6" alt="">
        </div>
        <?php
        if (isset($projectsByCategory['design']['items'])) {
            foreach ($projectsByCategory['design']['items'] as $project) {
                $fields = $project['fields'];
                $projectTitle = $fields['projectTitle'];
                $projectDescription = $fields['projectDescription'];
                $projectDate = $fields['projectDate'];
                $projectLocation = isset($fields['projectLocation']) ? $fields['projectLocation'] : '';
                $projectMedia = isset($fields['projectMedia']) ? $fields['projectMedia'] : [];
                $projectId = $project['sys']['id'];
                $formattedDate = date('d.m.Y', strtotime($projectDate));
                $projectLink = '/project.php?id=' . $projectId;

                // Determine scroll direction based on project index
                $scrollDirection = ($projectIndex % 2 === 0) ? 'scroll-left' : 'scroll-right';
                ?>
                <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                    <div class="lg:w-4/12">
                        <a href="<?php echo $projectLink; ?>">
                            <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2"><?php echo $projectTitle; ?></h1>
                        </a>
                        <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
                            <p class="mb-4">
                                <?php echo nl2br($projectDescription); ?>
                            </p>
                            <p class="mb-4">
                                <?php echo $formattedDate; ?><br/>
                                <?php echo $projectLocation; ?>
                            </p>
                        </div>
                    </div>
                    <div class="lg:h-[36rem] flex overflow-hidden lg:w-8/12 auto-scroll <?php echo $scrollDirection; ?>">
                        <div class="scroll-content">
                            <?php
                            if ($projectMedia) {
                                // Duplicate the images by looping twice
                                for ($i = 0; $i < 2; $i++) {
                                    foreach ($projectMedia as $media) {
                                        // Get the asset details
                                        $assetId = $media['sys']['id'];
                                        // Find the asset in the includes
                                        foreach ($projectsByCategory['design']['includes']['Asset'] as $asset) {
                                            if ($asset['sys']['id'] == $assetId) {
                                                $fileUrl = 'https:' . $asset['fields']['file']['url'];
                                                $imageUrl = $fileUrl . '?fm=webp&q=40&w=500';
                                                echo "<img src='$imageUrl' class='h-[65vw] lg:h-full lg:object-cover' loading='lazy' />";
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $projectIndex++; // Increment project index
            }
        }
        ?>

        <!-- ####################
             03 OTHER TITLE
             #################### -->
        <div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">
            <img src="/assets/svgs/03_other_title.svg" id="other" class="w-4/6 lg:w-3/6" alt="">
        </div>
        <div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">
            <img src="/assets/svgs/03_other_mobile.svg" id="other" class="w-4/6" alt="">
        </div>
        <?php
        if (isset($projectsByCategory['other']['items'])) {
            foreach ($projectsByCategory['other']['items'] as $project) {
                $fields = $project['fields'];
                $projectTitle = $fields['projectTitle'];
                $projectDescription = $fields['projectDescription'];
                $projectDate = $fields['projectDate'];
                $projectLocation = isset($fields['projectLocation']) ? $fields['projectLocation'] : '';
                $projectMedia = isset($fields['projectMedia']) ? $fields['projectMedia'] : [];
                $projectId = $project['sys']['id'];
                $formattedDate = date('d.m.Y', strtotime($projectDate));
                $projectLink = '/project.php?id=' . $projectId;

                // Determine scroll direction based on project index
                $scrollDirection = ($projectIndex % 2 === 0) ? 'scroll-left' : 'scroll-right';
                ?>
                <div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">
                    <div class="lg:w-4/12">
                        <a href="<?php echo $projectLink; ?>">
                            <h1 class="font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2"><?php echo $projectTitle; ?></h1>
                        </a>
                        <div class="px-2 pb-2 text-xl font-['Times_New_Roman']">
                            <p class="mb-4">
                                <?php echo nl2br($projectDescription); ?>
                            </p>
                            <p class="mb-4">
                                <?php echo $formattedDate; ?><br/>
                                <?php echo $projectLocation; ?>
                            </p>
                        </div>
                    </div>
                    <div class="lg:h-[36rem] flex overflow-hidden lg:w-8/12 auto-scroll <?php echo $scrollDirection; ?>">
                        <div class="scroll-content">
                            <?php
                            if ($projectMedia) {
                                // Duplicate the images by looping twice
                                for ($i = 0; $i < 2; $i++) {
                                    foreach ($projectMedia as $media) {
                                        // Get the asset details
                                        $assetId = $media['sys']['id'];
                                        // Find the asset in the includes
                                        foreach ($projectsByCategory['other']['includes']['Asset'] as $asset) {
                                            if ($asset['sys']['id'] == $assetId) {
                                                $fileUrl = 'https:' . $asset['fields']['file']['url'];
                                                $imageUrl = $fileUrl . '?fm=webp&q=40&w=500';
                                                echo "<img src='$imageUrl' class='h-[65vw] lg:h-full lg:object-cover' loading='lazy' />";
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $projectIndex++; // Increment project index
            }
        }
        ?>
    </div>
</div>
<script src="/animation.js"></script>
</body>
</html>