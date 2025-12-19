
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

const wrapper = document.getElementById("tagWrapper");
  const input = wrapper.querySelector("input");

  input.addEventListener("keydown", function (e) {
    if ((e.key === "Enter" || e.key === ",") && input.value.trim() !== "") {
      e.preventDefault();

    
      const value = input.value.replace(/,+$/, "").trim();

      if (value !== "") {
        addTag(value);
      }

      input.value = "";
    }
  });

  function addTag(text) {
    const tag = document.createElement("span");
    tag.className = "tag";
    tag.innerHTML = `${text} <span class="remove">×</span>`;

    tag.querySelector(".remove").addEventListener("click", () => {
      tag.remove();
    });

    wrapper.insertBefore(tag, input);
  }

  wrapper.querySelectorAll(".remove").forEach(btn => {
    btn.addEventListener("click", function () {
      this.parentElement.remove();
    });
  });


document.addEventListener("DOMContentLoaded", () => {
  const emojiInput = document.getElementById("emojiInput");
  const pickerWrapper = document.getElementById("emojiPicker");
  const picker = pickerWrapper.querySelector("emoji-picker");

  // open picker
  emojiInput.addEventListener("click", (e) => {
    e.stopPropagation(); // 🔥 STOP CLOSE
    pickerWrapper.classList.remove("d-none");
  });

  // prevent closing when clicking inside picker
  pickerWrapper.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  // select emoji
  picker.addEventListener("emoji-click", (e) => {
    emojiInput.value = e.detail.unicode;
    pickerWrapper.classList.add("d-none");
  });

  // close on outside click
  document.addEventListener("click", () => {
    pickerWrapper.classList.add("d-none");
  });
});

