<div class="border-b bg-white/50">
  <div class="max-w-7xl mx-auto py-4 flex justify-between items-center">
    <a class="flex items-center gap-2 [&>*]:pointer-events-none" href="/home">
      <object type="image/svg+xml" data="assets/svg/brand-spotify.svg" class="size-7"></object>
      <h2 class="font-semibold text-lg">Spotify</h2>
    </a>
    <div class="flex gap-4 items-center">
      <form action="/artist" method="get">
        <div class="relative">
          <input name="id" class="py-2 pl-5 pr-10 rounded-full outline-none bg-[#bcdfc8cb] text-sm border border-neutral-950 focus:border-[#1DB954] peer transition-all" type="text">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search absolute right-0 top-1/2 -translate-y-1/2 mr-4 pointer-events-none text-black peer-focus:text-[#1DB954]">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
            <path d="M21 21l-6 -6" />
          </svg>
        </div>
      </form>
      <a href="https://github.com/readans" class="[&>*]:pointer-events-none" target="_blank">
        <object type="image/svg+xml" data="assets/svg/github.svg" class="size-6"></object>
      </a>
      <a href="/logout" class="[&>*]:pointer-events-none">
        <object type="image/svg+xml" data="assets/svg/logout-2.svg" class="size-6"></object>
      </a>
    </div>
  </div>
</div>