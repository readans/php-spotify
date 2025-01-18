<?php
$title = 'Album';
include 'templates/header.php';
include 'templates/bar.php';

$artists = implode(', ', array_column($album['artists'], 'name'));

?>

<!-- START BODY -->

<div class="mt-8 mb-10 max-w-7xl mx-auto">
  <div class="flex gap-4 py-6">
    <img src="<?= $album['images'][0]['url'] ?>" class="w-3/12 rounded-md" alt="">
    <div class="self-end">
      <h6>Álbum</h6>
      <h2 class="text-7xl font-bold"><?= $album['name'] ?></h2>
      <p><?= $artists ?> • <?= $album['release_date'] ?> • <?= $album['total_tracks'] ?> canciones</p>
    </div>
  </div>

  <div class="">
    <div class="flex gap-4 py-6">
      <a class="rounded-full size-14 bg-[#1db954] hover:bg-[#46ff86] hover:scale-110 transition-all duration-500 grid place-items-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-player-play">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
        </svg>
      </a>
    </div>

    <ul>
      <?php foreach ($album['tracks']['items'] as $tt) {
        $artists = implode(', ', array_column($tt['artists'], 'name'));
        $seconds = $tt['duration_ms'] / 1000;
        $minutes = floor($seconds / 60);
        $seconds = floor($seconds) % 60;
      ?>
        <li class="flex items-center justify-between rounded-md hover:bg-[#a7aaa727] p-2 cursor-pointer [&>*]:cursor-pointer">
          <div class="flex items-center gap-2">
            <img class="size-6 rounded-md" alt="">
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

<!-- END BODY -->

<?php include 'templates/footer.php'; ?>