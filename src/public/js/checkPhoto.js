function checkFileSize() {
    var fileInput = document.getElementById('photo');
    var fileSizeError = document.getElementById('fileSizeError');
    var maxFileSize = 2 * 1024 * 1024;

    if (fileInput.files.length > 0) {
        var fileSize = fileInput.files[0].size;

        if (fileSize > maxFileSize) {
            fileSizeError.textContent = "File size exceeds 2MB. Please choose a smaller file.";
            return false;
        } else {
            fileSizeError.textContent = "";
            return true;
        }
    }
    return true;
}

document.getElementById("form2").onsubmit = function () {
    return checkFileSize();
};