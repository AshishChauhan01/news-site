
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


const editor = document.getElementById("editor");
const counter = document.getElementById("counter");

document.querySelectorAll(".editor-tools button").forEach(btn => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();
    const action = btn.dataset.action;

    if (action === "bold") document.execCommand("bold");
    if (action === "italic") document.execCommand("italic");
    if (action === "ul") document.execCommand("insertUnorderedList");
    if (action === "link") {
      const url = prompt("Enter URL");
      if (url) document.execCommand("createLink", false, url);
    }
  });
});

editor.addEventListener("input", () => {
  const text = editor.innerText.trim();
  const words = text ? text.split(/\s+/).length : 0;
  const chars = text.length;

  counter.innerText = `${words} words • ${chars} characters`;
});


const textarea = document.getElementById("metaDescription");
const count = document.getElementById("metaCount");

textarea.addEventListener("input", () => {
  count.textContent = textarea.value.length;
});

