function previewImage() {
    const image = document.querySelector("#photoProfil");
    const imgWrapper = document.querySelector(".photoProfileWraper");

    imgWrapper.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgWrapper.src = oFREvent.target.result;
    };
}

