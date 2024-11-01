<?php
require __DIR__ . '/../vendor/autoload.php'; // Autoload Guzzle and Dotenv using Composer

use GuzzleHttp\Client;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../public', 'apiKeys.env');
$dotenv->load();

$space_id = $_ENV['CONTENTFUL_SPACE_ID'];
$access_token = $_ENV['CONTENTFUL_ACCESS_TOKEN'];

$client = new Client([
    'base_uri' => 'https://cdn.contentful.com',
]);

$categories = ['photography', 'design', 'other'];

try {
    foreach ($categories as $categoryName) {
        // Fetch projects for each category
        $response = $client->request('GET', "/spaces/$space_id/environments/master/entries", [
            'query' => [
                'access_token' => $access_token,
                'content_type' => 'category', // Note: Ensure this matches your content type ID
                'fields.projectCategory[in]' => $categoryName, // Correct filter syntax for field values in Contentful
                'include' => 1
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if ($categoryName === 'photography') {
            echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
            echo '<img src="/assets/svgs/01_photography_title.svg" id="photography" class="w-4/6 lg:w-3/6" alt="photography_title">';
            echo '</div>';
            echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
            echo '<img src="/assets/svgs/01_photography_mobile.svg" id="photography" class="w-4/6" alt="photography_title">';
            echo '</div>';
        } elseif ($categoryName === 'design') {
            echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
            echo '<img src="/assets/svgs/02_design_title.svg" id="design" class="w-4/6 lg:w-3/6" alt="design_title">';
            echo '</div>';
            echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
            echo '<img src="/assets/svgs/02_design_mobile.svg" id="design" class="w-4/6" alt="design_title">';
            echo '</div>';
        } elseif ($categoryName === 'other') {
            echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
            echo '<img src="/assets/svgs/03_other_title.svg" id="other" class="w-4/6 lg:w-3/6" alt="other_title">';
            echo '</div>';
            echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
            echo '<img src="/assets/svgs/03_other_mobile.svg" id="other" class="w-4/6" alt="other_title">';
            echo '</div>';
        }

        // Iterate through projects in each category
        foreach ($data['items'] as $project) {
            $title = $project['fields']['projectTitle'];
            $description = $project['fields']['projectDescription'];
            $date = $project['fields']['projectDate'];
            $location = isset($project['fields']['projectLocation']) ? $project['fields']['projectLocation'] : '';
            $images = $project['fields']['projectMedia'];

            echo '<div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">';
            echo '<div class="lg:w-4/12">';
            echo "<h1 class='font-['Hanson'] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2'>$title</h1>";
            echo '<div class="px-2 pb-2 text-xl font-[Times_New_Roman]">';
            echo "<p class='mb-4'>$description</p>";
            echo "<p class='mb-4'>$location</p>";
            echo "<p class='mb-4'>$date</p>";
            echo '</div>';
            echo '</div>';
            echo '<div class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">';
            foreach ($images as $image) {
                $filePath = $image['fields']['file']['url']; // This contains the path to the image
                $imageUrl = 'https://images.ctfassets.net' . $filePath . '?fm=webp&q=40&w=500';
                echo "<img src='$imageUrl' class='h-[65vw] lg:h-full lg:object-cover ' loading='lazy' />";
            }
            echo '</div>';
            echo '</div>';
        }
    }
} catch (Exception $e) {
    echo 'Error fetching project data: ' . $e->getMessage();
}
?>