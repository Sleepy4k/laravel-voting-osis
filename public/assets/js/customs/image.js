function ShowImageCandidate() {
    const image = document.querySelector('.logo-candidate');
    const imgPreview = document.querySelector('.show-image-candidate');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}

function ShowImageApplication() {
    const image = document.querySelector('.logo-application');
    const imgPreview = document.querySelector('.show-image-application');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}