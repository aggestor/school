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
function prettyString($data) {
    return $data.toString().toLowerCase().replace(/é/gi,'e').replace(/\s/gi,'-')
     
}
const personalFilter = $("#personalFilter");
personalFilter.on('change', (e) => {
    const t = decodeURI(prettyString(e.target.value))
    if (t == '0') {
       window.location.href = '/admin/personals'
    }
    else window.location.href = '/admin/personals/t/' + t
    
})
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
$("#showMenu").click(() => {
    $("#menuToShow").slideToggle();
    $("#menuToShow").css({
      background: "#fff",
      color: "#000000",
      position: "absolute",
      top: "64px",
      left: "0",
      width: "100%",
        height: "60%",
        display: "flex",
      flexDirection:'column'
    });
})
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
    captureImageAndLoad()
}
function switchCameraToIMGPicker(reverse = false) {
    if (reverse) {
        $("#camera").slideUp();
        $("#imaged").slideDown();
    } else {
        $("#camera").slideDown()
        $("#imaged").slideUp()
    }
}
 function dataURLtoFile(dataURL, filename) {
   let arr = dataURL.split(","),
     mime = arr[0].match(/:(.*?);/)[1],
     bstr = atob(arr[1]),
     n = bstr.length,
     u8arr = new Uint8Array(n);

   while (n--) {
     u8arr[n] = bstr.charCodeAt(n);
   }

   return new File([u8arr], filename, { type: mime });
}
 
function appendDataToInput(myFile) {
    const fileInput = document.querySelector("#userProfile");
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
}

async function getStream() {
    const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false })
    navigator.localStream = stream
    return stream
}

function captureImageAndLoad() {
    const video = document.getElementById('video')
    const canvas = document.getElementById('canvas')
    $("#capture").click(async () => {
      canvas
        .getContext("2d")
        .drawImage(video, 0, 0, canvas.width, canvas.height);
        let image = canvas.toDataURL("image/png");
        let file = dataURLtoFile(image, 'user.png')
        document.getElementById('imageContainer').src = image
        appendDataToInput(file)
        switchCameraToIMGPicker(true)
        
        navigator.localStream.getVideoTracks()
            .forEach((track) => {
                track.enabled = false;
                track.stop()
            });
    });

    $("#picHandle").click(async (e) => {
        switchCameraToIMGPicker()
        let stream = await getStream();
        video.srcObject = stream
    });
}
main()