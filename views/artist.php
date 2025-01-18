<?php
$title = 'Artist';
include 'templates/header.php';
include 'templates/bar.php';

?>

<!-- START BODY -->

<div class="mt-8 mb-10 max-w-7xl mx-auto">
  <div class="grid grid-cols-12 gap-2">
    <div class="col-span-4 bg-[rgba(23,63,37,0.1)] rounded-md p-4 relative group">
      <img class="size-[150px] rounded-full" src="<?= $artist['images'][0]['url'] ?>" alt="">
      <h1 class="text-3xl font-semibold mt-3"><?= $artist['name'] ?></h1>
      <p>Artista</p>
      <a class="opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 absolute right-0 bottom-0 mb-5 mr-5 rounded-full size-12 bg-[#1db954] hover:bg-[#46ff86] hover:scale-110 transition-all duration-500 grid place-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-player-play">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
        </svg>
      </a>
    </div>
    <div class="col-span-8">
      <h3 class="text-2xl font-medium hover:underline">Canciones</h3>
      <ul>
        <?php foreach (array_slice($topTracks, 0, 4) as $tt) {
          $artists = implode(', ', array_column($tt['artists'], 'name'));
          $seconds = $tt['duration_ms'] / 1000;
          $minutes = floor($seconds / 60);
          $seconds = floor($seconds) % 60;
        ?>
          <li class="flex items-center justify-between rounded-md hover:bg-[#a7aaa727] p-2 cursor-pointer [&>*]:cursor-pointer">
            <div class="flex items-center gap-2">
              <img src="<?= $tt['album']['images'][0]['url'] ?>" class="size-6 rounded-md" alt="">
              <div class="overflow-hidden">
                <h6><?= $tt['name'] ?></h6>
                <p class="text-nowrap w-full overflow-hidden text-ellipsis"><?= $artists ?></p>
              </div>
            </div>
            <label class="justify-self-end flex-shrink-0" for=""><?= $minutes ?>:<?= $seconds ?></label>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>

  <h2 class="text-3xl font-semibold mt-10 mb-6 hover:underline">Albums</h2>

  <div class="grid grid-cols-[repeat(auto-fit,minmax(0,200px))] justify-center gap-2">
    <?php foreach ($albums['items'] as $album) {
      $artists = implode(', ', array_column($album['artists'], 'name'));
    ?>
      <div class="p-2 hover:bg-black/10 group rounded-md w-[200px] flex flex-col gap-2 overflow-hidden [&>*]:cursor-pointer">
        <div class="relative">
          <img class="max-w-full rounded-md" src="<?= $album['images'][0]['url'] ?>" alt="album">
          <a class="opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 absolute right-0 bottom-0 mb-2 mr-2 rounded-full size-12 bg-[#1db954] hover:bg-[#46ff86] hover:scale-110 transition-all duration-500 grid place-items-center" href="/album?id=<?= $album['id'] ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-player-play">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
            </svg>
          </a>
        </div>
        <h4 class="font-medium"><?= $album['name'] ?></h4>
        <p class="text-nowrap w-full overflow-hidden text-ellipsis" title=""><?= $album['release_date'] ?> • <?= $artists ?></p>
      </div>
    <?php } ?>
  </div>

</div>

<!-- END BODY -->

<?php include 'templates/footer.php'; ?>