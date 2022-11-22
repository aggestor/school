const registerContainer = document.querySelectorAll(".register-container");
const menus = document.querySelectorAll(".menu a")
/**
 * Gets and returns a HTML element simply
 * @param {HTMLElement} element 
 * @returns {HTMLElement}
 */
const _g = (element) => document.querySelector(element)
async function loadHash() {
    return window.location.hash
}
const docPicker = _g("#dockPicker")
if ($('#docPicker')) {
    $("#docPicker").on("click", () => $("#fileHolder").click())
} 

console.log("there we go")
let setHashContainer = async container => {
    const allowedRoutes = ['/identification/etudiant', '/identification/personnel']
    if (allowedRoutes.includes(window.location.pathname)) {
        console.log((await loadHash()))
        window.location.hash = container
        $(container).slideDown(500);
        $(container).siblings().slideUp(500);
        $(`a[href='${container}']`)
          .removeClass("text-sky-500").removeClass("bg-white")
          .addClass("bg-sky-500")
          .addClass("text-white");
        $(`a[href='${container}']`)
          .siblings()
          .removeClass("bg-sky-500")
          .addClass("text-sky-500").addClass("bg-white");
    }

}
$("#showEditForm").on("click", () => {
  $('#editForm').slideDown()
});
async function useMenus() {
    menus.forEach(menu => {
        menu.onclick = function () {
            const hash = menu.getAttribute("href")
            setHashContainer(hash)
        }
    })
}
async function setInitialContainer() {
    const hash = await loadHash()
    hash ? setHashContainer(hash)  : setHashContainer("#identity")
}
function pickImage() {
    const userProfile = _g("#userProfile"),
      cameraHandle = _g("#cameraHandle"),
        imageContainer = _g("#imageContainer");
    if (cameraHandle) cameraHandle.onclick = function () {
        console.log('click')
        userProfile.click()
        userProfile.onchange = e => {
            let $fileObject = e.target.files[0]
            imageContainer.src = URL.createObjectURL($fileObject)
            imageContainer.classList.add("border-2");
            imageContainer.classList.add("border-sky-500");
        }
    }
}


async function main() {
    setInitialContainer().then(() => {
        useMenus()
    })
    pickImage()
}

main()