const registerContainer = document.querySelectorAll(".register-container");
const menus = document.querySelectorAll(".menu a")
/**
 * Gets and returns a HTML element simply
 * @param {HTMLElement} element 
 * @returns {HTMLElement}
 */
const _g = (element) => document.querySelector(element)

let setHashContainer = container => {
    window.location.hash = container
    $(container).slideDown(500);
    $(container).siblings().slideUp(500);
    $(`a[href='${container}']`)
    .addClass("bg-sky-500")
    .addClass("text-white")
    .removeClass("text-sky-500");
    $(`a[href='${container}']`)
      .siblings()
      .removeClass("bg-sky-500")
      .addClass("text-sky-500");

}
async function useMenus() {
    menus.forEach(menu => {
        menu.onclick = function () {
            const hash = menu.getAttribute("href")
            setHashContainer(hash)
        }
    })
}
async function setInitialContainer() {
    const hash = window.location.hash
    hash ? setHashContainer(hash)  : setHashContainer("#identity")
}
function pickImage() {
    const userProfile = _g("#userProfile"),
      cameraHandle = _g("#cameraHandle"),
        imageContainer = _g("#imageContainer");
    if (cameraHandle) cameraHandle.onclick = function () {
        userProfile.click()
        userProfile.onchange = e => {
            let $fileObject = e.target.files[0]
            imageContainer.src = URL.createObjectURL($fileObject)
            imageContainer.classList.add("border-2");
            imageContainer.classList.add("border-sky-500");
        }
    }
}
function setupRegistrationDocument() {
    const draggableZone = _g("#draggableZone"),
      handleDocumentInput = _g("#handleDocumentInput"),
        documentInput = _g("#documentInput");
    if(handleDocumentInput)handleDocumentInput.onclick = () => documentInput.click()
    if(documentInput) documentInput.onchange = function () {
        
    }
    if (draggableZone) {
        draggableZone.addEventListener("dragenter", function (e) {
            draggableZone.classList.add("border-2")
            draggableZone.classList.add("border-sky-500");
        })
        draggableZone.addEventListener("dragover", function (e) {
            draggableZone.classList.add("border-sky-500");
            draggableZone.classList.add("border-2")
        })
        draggableZone.addEventListener("dragleave", function (e) {
            draggableZone.classList.remove("border-sky-500");
            draggableZone.classList.remove("border-2")
        })
        draggableZone.addEventListener("drop", function (e) {
            console.log(e)
        })
    } 
    
}


async function main() {
    setInitialContainer().then(() => {
        useMenus()
    })
    pickImage()
    setupRegistrationDocument()
}

main()