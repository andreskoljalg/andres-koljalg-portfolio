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
    <div id="menu" class="fixed h-screen w-screen justify-center items-center translate-x-full flex flex-col text-3xl font-['Times_New_Roman'] lg:hidden bg-white duration-700 ease-in-out">
        <a href="javascript:delay('/about.html')">About</a>
        <p class="w-fit">&#8226</p>
        <a href="javascript:delay('/api/projects.php')">Projects</a>
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
    <div class="hidden lg:flex px-12 h-[10vh] items-center w-fit">
        <a href="javascript:delay('/index0.html')"><h1 class="font-['Hanson'] text-3xl">BACK</h1></a>  
    </div>
    <div class="translate-y-[100vh] duration-700 delay-300 ease-in-out lg:translate-y-0 lg:h-[90vh] flex items-center min-h-[550px]" id="slide">
        <div class="flex flex-col lg:flex-row lg:pl-24 py-20 items-center">
            <div class="flex flex-col px-12 justify-center items-center mb-8">
                <h1 class="font-['Hanson'] text-4xl lg:text-5xl">JOURNAL</h1>
                <p class="font-['Times_New_Roman'] text-md text-xl">Moments from my everyday life.</p>
            </div>
            <div class="flex h-[30rem] overflow-x-scroll">
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

                    try {
                        // Fetch entries from Contentful
                        $response = $client->request('GET', "/spaces/$space_id/environments/master/entries", [
                            'query' => [
                                'access_token' => $access_token,
                                'content_type' => 'journalEntry',
                                'include' => 1 // Include linked assets (images)
                            ]
                        ]);

                        $data = json_decode($response->getBody(), true);

                        foreach ($data['items'] as $item) {
                            if (isset($item['fields']['journalImage'])) {
                                foreach ($item['fields']['journalImage'] as $image) {
                                    $imageId = $image['sys']['id'];
                                    $asset = array_filter($data['includes']['Asset'], function ($asset) use ($imageId) {
                                        return $asset['sys']['id'] === $imageId;
                                    });
                                    $asset = reset($asset);

                                    if ($asset && isset($asset['fields']['file']['url'])) {
                                        // Correctly construct the image URL using the base and asset information
                                        $fileUrl = str_replace('downloads.ctfassets.net', 'images.ctfassets.net', $asset['fields']['file']['url']);
                                        $imageUrl = "https:" . $fileUrl . "?fm=webp&q=50&w=800";
                                        
                                        echo "<img src='$imageUrl' class='h-full' loading='lazy' />";
                                    }
                                }
                            }
                        }
                    } catch (Exception $e) {
                        echo 'Error fetching journal images: ' . $e->getMessage();
                    }
                    ?>
            </div>
        </div>
    </div>
    <script src="/animation.js"></script>
</body>
</html>
