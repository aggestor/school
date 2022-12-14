
<div class="w-full bg-white h-14 px-4 py-2 flex items-center justify-between">
  <div class="w-7/12 flex items-center justify-between">
    <span class="w-8 hidden h-8 md:grid place-items-center cursor-pointer hover:bg-slate-200 duration-500 transition-colors rounded-full">
      <span class="fas fa-align-left"></span>
    </span>
    <div class="text-sky-500 md:hidden pl-3 flex items-center font-bold text-2xl">
         <img src="/assets/images/logo.jpg" class="mr-2 h-12"/> <span>UOR</span>
    </div>
    <div class="focus-within:font-semibold text-gray-700 hidden  focus-within:text-indigo-500 w-[93%] bg-slate-200 group focus-within:border-indigo-500 focus-within:border-2 h-8 px-2 items-center md:flex rounded">
        <input id="search_bar" name="search_bar" type="email" placeholder="Rechercher ici..." class="bg-transparent placeholder:text-gray-900 focus:text-indigo-500 focus:outline-none ml-2 w-full"/>
    </div>
  </div>
  <div class="w-5/12 flex text-gray-700 justify-end">
    <a href="/admin/current" class="h-8 w-8 rounded-full overflow-hidden mx-0.5"><img src="/assets/images/u.png" class="w-full h-full object-cover" alt="Aggestor's image"></a>
    <a href="/admin/logout" class="w-8 mx-0.5  h-8 grid place-items-center cursor-pointer hover:bg-slate-200 duration-500 transition-colors rounded-full">
      <span class="fas fa-power-off"></span>
    </a>
    <span id="showNavAdmin" class="w-8 mx-0.5  h-8 grid place-items-center cursor-pointer hover:bg-slate-200 duration-500 transition-colors rounded-full">
      <span class="fas fa-bars"></span>
    </span>
  </div>

</div>
<div>
  <?php include VIEWS."includes/admin-mobile-menu.php"?>
</div>
