<?php
$title = 'Home';
include 'templates/header.php';
?>

<!-- START BODY -->

<div class="border-b bg-white/50">
  <div class="max-w-7xl mx-auto py-4 flex justify-between items-center">
    <a class="flex items-center gap-2 [&>*]:pointer-events-none" href="/home">
      <object type="image/svg+xml" data="assets/svg/brand-spotify.svg" class="size-7"></object>
      <h2 class="font-semibold text-lg">Spotify</h2>
    </a>
    <div class="flex gap-4 items-center">
      <a href="https://github.com/readans" class="[&>*]:pointer-events-none" target="_blank">
        <object type="image/svg+xml" data="assets/svg/github.svg" class="size-6"></object>
      </a>
      <a href="/logout" class="[&>*]:pointer-events-none">
        <object type="image/svg+xml" data="assets/svg/logout-2.svg" class="size-6"></object>
      </a>
    </div>
  </div>
</div>

<div class="mt-8 mb-10 max-w-7xl mx-auto">
  <h2 class="text-3xl font-semibold mb-6 hover:underline">Lanzamientos de Albumes</h2>
  <div class="flex flex-wrap">
    <?php foreach ($albums as $album) {
      $artists = implode(', ', array_column($album['artists'], 'name')); ?>
      <div class="p-2 hover:bg-black/10 group rounded-md w-[200px] flex flex-col gap-2 overflow-hidden [&>*]:cursor-pointer">
        <div class="relative card">
          <img class="max-w-full rounded-md" src="<?= $album['images'][0]['url'] ?>" alt="album">
          <button class="opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 absolute right-0 bottom-0 mb-2 mr-2 rounded-full size-12 bg-[#1db954] hover:bg-[#46ff86] hover:scale-110 transition-all duration-500 grid place-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-player-play">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
            </svg>
          </button>
        </div>
        <h4 class="font-medium"><?= $album['name'] ?></h4>
        <p class="text-nowrap w-full overflow-hidden text-ellipsis" title="<?= $artists ?>"><?= $album['release_date'] ?> • <?= $artists ?></p>
      </div>
    <?php } ?>
  </div>
</div>

<!-- END BODY -->

<?php include 'templates/footer.php'; ?>