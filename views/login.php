<?php
$title = 'Login';
include 'templates/header.php';

$URL_PARAMS = http_build_query([
  'response_type' => 'code',
  'client_id' => getenv('CLIENT_ID'),
  'redirect_uri' => getenv('REDIRECT_URI'),
]);

$URL_AUTHORIZE = 'https://accounts.spotify.com/authorize?' . $URL_PARAMS;

?>

<!-- START BODY -->

<div class="border-b fixed top-0 left-0 w-full bg-white/50">
  <div class="max-w-7xl mx-auto py-4 flex justify-between items-center">
    <div class="flex items-center gap-2 [&>*]:cursor-default">
      <object type="image/svg+xml" data="assets/svg/brand-spotify.svg" class="size-7"></object>
      <h2 class="font-semibold text-lg">Spotify</h2>
    </div>
    <a href="https://github.com/readans" class="[&>*]:pointer-events-none" target="_blank">
      <object type="image/svg+xml" data="assets/svg/github.svg" class="size-6"></object>
    </a>
  </div>
</div>

<div class="h-screen grid place-items-center">
  <a class="bg-[#1DB954] hover:bg-[#1db954c7] text-white py-3 px-8 shadow-xl rounded-full font-medium" href="<?= $URL_AUTHORIZE ?>" id="link">
    <label for="" class="text-lg cursor-pointer">Login</label>
  </a>
</div>


<!-- END BODY -->

<?php include 'templates/footer.php'; ?>