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
                        'content_type' => 'category',
                        'fields.projectCategory[in]' => $categoryName,
                        'include' => 1
                    ]
                ]);

                $data = json_decode($response->getBody(), true);

                if ($categoryName === 'photography') {
                    echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
                    echo '<img src="assets/svgs/01_photography_title.svg" id="photography" class="w-4/6 lg:w-3/6" alt="photography_title">';
                    echo '</div>';
                    echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
                    echo '<img src="assets/svgs/01_photography_mobile.svg" id="photography" class="w-4/6" alt="photography_title">';
                    echo '</div>';
                } elseif ($categoryName === 'design') {
                    echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
                    echo '<img src="assets/svgs/02_design_title.svg" id="design" class="w-4/6 lg:w-3/6" alt="design_title">';
                    echo '</div>';
                    echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
                    echo '<img src="assets/svgs/02_design_mobile.svg" id="design" class="w-4/6" alt="design_title">';
                    echo '</div>';
                } elseif ($categoryName === 'other') {
                    echo '<div class="hidden lg:flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end">';
                    echo '<img src="assets/svgs/03_other_title.svg" id="other" class="w-4/6 lg:w-3/6" alt="other_title">';
                    echo '</div>';
                    echo '<div class="flex w-full p-2 lg:px-12 xl:px-24 lg:py-12 items-end lg:hidden">';
                    echo '<img src="assets/svgs/03_other_mobile.svg" id="other" class="w-4/6" alt="other_title">';
                    echo '</div>';
                }

                // Iterate through projects in each category
                foreach ($data['items'] as $project) {
                    if (isset($project['fields'])) {
                        $fields = $project['fields'];

                        $title = isset($fields['projectTitle']) ? $fields['projectTitle'] : 'Untitled';
                        $description = isset($fields['projectDescription']) ? $fields['projectDescription'] : 'No description available.';
                        $date = isset($fields['projectDate']) ? $fields['projectDate'] : 'No date provided';
                        $location = isset($fields['projectLocation']) ? $fields['projectLocation'] : '';

                        echo '<div class="p-0 lg:pl-12 xl:pl-24 mb-32 lg:flex lg:gap-5">';
                        echo '<div class="lg:w-4/12">';
                        echo "<h1 class='font-[Hanson] text-[10vw] sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl p-2'>$title</h1>";
                        echo '<div class="px-2 pb-2 text-xl font-[Times_New_Roman]">';
                        echo "<p class='mb-4'>$description</p>";
                        echo "<p class='mb-4'>$location</p>";
                        echo "<p class='mb-4'>$date</p>";
                        echo '</div>';
                        echo '</div>';

                        if (isset($fields['projectMedia']) && is_array($fields['projectMedia'])) {
                            echo '<a class="lg:h-[36rem] flex overflow-x-scroll lg:w-8/12">';
                            foreach ($fields['projectMedia'] as $image) {
                                if (isset($image['fields']['file']['url'])) {
                                    $filePath = $image['fields']['file']['url'];
                                    $imageUrl = 'https://images.ctfassets.net' . $filePath . '?fm=webp&q=40&w=500';
                                    echo "<img src='$imageUrl' class='h-[65vw] lg:h-full lg:object-cover' loading='lazy' />";
                                }
                            }
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Error fetching project data: ' . $e->getMessage();
        }
    ?>
    <script src="/animation.js"></script>
</body>
</html>
