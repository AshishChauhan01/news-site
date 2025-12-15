
const fileInput = document.getElementById("fileUpload");
const uploadBox = document.getElementById("uploadBox");
const uploadContent = document.getElementById("uploadContent");
const imagePreview = document.getElementById("imagePreview");
const previewImg = document.getElementById("previewImg");
const chooseFile = document.getElementById("chooseFile");
const removeImage = document.getElementById("removeImage");

chooseFile.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = function (e) {
    previewImg.src = e.target.result;
    uploadContent.style.display = "none";
    imagePreview.style.display = "block";
  };
  reader.readAsDataURL(file);
});

// Drag & Drop
uploadBox.addEventListener("dragover", e => {
  e.preventDefault();
  uploadBox.style.borderColor = "#6366f1";
});

uploadBox.addEventListener("dragleave", () => {
  uploadBox.style.borderColor = "#cbd5e1";
});

uploadBox.addEventListener("drop", e => {
  e.preventDefault();
  uploadBox.style.borderColor = "#cbd5e1";
  fileInput.files = e.dataTransfer.files;
  fileInput.dispatchEvent(new Event("change"));
});

// Remove Image
removeImage.addEventListener("click", () => {
  fileInput.value = "";
  previewImg.src = "";
  imagePreview.style.display = "none";
  uploadContent.style.display = "flex";
});

