
<div class="w-full bg-white shadow shadow-gray-200 h-16">
  <div class="w-11/12 mx-auto h-full flex justify-between items-center">
    <div class="text-sky-500 h-full w-4/12 flex items-center font-bold text-4xl">
        <span>UOR</span>
    </div>
    <div class="w-6/12 flex items-center font-semibold h-full text-gray-900 justify-around">
      <a href="/" class="hover:text-sky-500 duration-300 transition-colors">Acceuil</a>
      <a href="/apropos" class="hover:text-sky-500 duration-300 transition-colors">A propos</a>
      <a href="/contacts" class="hover:text-sky-500 duration-300 transition-colors">Contacts</a>
      <a href="/admin" class="hover:text-sky-500 duration-300 transition-colors">Administration</a>
      <?php if (isset($_SESSION['student']) OR isset($_SESSION['personal'])): ?>
        <a href="<?php if(isset($_SESSION['personal'])){ echo "/profile";}else if(isset($_SESSION['student'])){echo '/my-profile';}?>" class="hover:text-sky-500 duration-300 transition-colors">Profil</a>
        <a href="/logout" class="hover:text-sky-500 duration-300 transition-colors">
        Déconnexion
      </a>
      <?php else: ?>
      <a href="/login" class="bg-sky-500 text-white rounded p-1.5 hover:bg-sky-600 hover:ring-2 hover:ring-sky-200 duration-300 transition-colors">
        Connexion
      </a>
      <?php endif?>
    </div>
  </div>

</div>
