<footer class="w-full justify-between pt-6 flex border-t border-gray-300 flex-col bg-gray-300">
  <nav class="w-11/12 mx-auto text-gray-700 flex md:flex-row flex-col justify-around lg:h-60">
    <div class="lg:w-3/12 w-full flex flex-col ">
      <a href="/contacts" class="font-semibold hover:text-blue-600 text-2xl mt-2">Nos contacts</a>
      <span class="font-semibold">fomibunia@gmail.com</span>
      <span class="font-semibold">P.O BOX 134 PAIDHA/UGANDA</span>
      <span class="font-semibold">+243 998 777 049  </span>
      <span class="font-semibold">+243 998 777 049  </span>
    </div>
    <ul class="lg:w-9/12 w-full flex md:flex-row flex-col justify-between">
      <li>
        <span class="text-gray-800 text-xl mb-4 font-semibold">Resources</span>
        <ul class="mt-4">
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#humianes">Humaines </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#foret">Matérielles </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#elec">Institutionnelles </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#elec">Financières </a></li>
        </ul>
      </li>
      <li>
        <span class="text-gray-800  text-xl mb-4 font-semibold">A propos</span>
        <ul class="mt-4">
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/a-propos#nous">Qui sommes nous ?</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/contacts">Nos Contacts</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/a-propos#address">Addresse</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/projets">Projets</a></li>
        </ul>
      </li>
      <li>
        <span class="text-gray-800 text-xl mb-4 font-semibold">Autres</span>
        <ul class="mt-4">
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#humianes">Réseautage </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#hydro">Partenariat </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#foret">Réalisation  </a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/resources#elec">Organisation  </a></li>
        </ul>
      </li>
      <li>
        <span class="text-gray-800 text-xl mb-4 font-semibold">Actualités</span>
        <ul class="mt-4">
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/admin/blog/write">Offres d'emploie</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/blog">Bibliothèque</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/blog">Toutes les actualités</a></li>
          <li><a class="my-2 font-semibold hover:text-blue-600" href="/admin">Poster une actualité</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="my-2 md:w-11/12 mx-auto flex flex-col items-center border-t border-gray-400">
    <span class="md:text-lg text-gray-600">&copy; FOMI asbl, Tous droits réservés  <?= date("Y") ?></span>
    <div class="flex">
    <label for="lang">Langue :</label>
    <select data-current-lang ="<?= $_SESSION['lang']?>" class="rounded outline-none ml-2" name="lang" id="lang">
      <option value="fr">Français</option>
      <option value="en">English</option>
    </select>
    </div>
  </div>
</footer>