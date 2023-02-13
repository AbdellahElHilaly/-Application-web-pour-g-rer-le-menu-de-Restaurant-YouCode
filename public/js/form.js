const imageInput = document.querySelector("#image-admin-id");
const displayImage = document.querySelector("#display-image");

imageInput.addEventListener("change", function() {
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.addEventListener("load", function() {
            const uploadedImage = reader.result;
            displayImage.src = uploadedImage;
        });
        reader.readAsDataURL(this.files[0]);
    }
});

