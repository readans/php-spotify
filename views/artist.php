<?php
$title = 'Artist';
include 'templates/header.php';
include 'templates/bar.php';

?>

<!-- START BODY -->

<div class="mt-8 mb-10 max-w-7xl mx-auto">
  <!-- <h2 class="text-3xl font-semibold mb-6 hover:underline">Resulta</h2> -->
  <div class="grid grid-cols-12 gap-2">
    <div class="col-span-4 ">
      <div class="bg-[#a7aaa727] rounded-md p-4 relative group">
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
    </div>
    <div class="col-span-8">
      <h3 class="text-2xl font-medium hover:underline">Canciones</h3>
      <ul>
        <?php foreach ($topTracks as $tt) {
          $artists = implode(', ', array_column($tt['artists'], 'name'));
        ?>
          <li class="flex items-center justify-between rounded-md hover:bg-[#a7aaa727] p-2 cursor-pointer [&>*]:cursor-pointer">
            <div class="flex items-center gap-2">
              <img src="<?= $tt['album']['images'][0]['url'] ?>" class="size-6 rounded-md" alt="">
              <div class="overflow-hidden">
                <h6><?= $tt['name'] ?></h6>
                <p class="text-nowrap w-full overflow-hidden text-ellipsis"><?= $artists ?></p>
              </div>
            </div>
            <label class="justify-self-end flex-shrink-0" for=""><?= $tt['duration_ms'] / 100000 ?></label>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

<!-- END BODY -->

<?php include 'templates/footer.php'; ?>