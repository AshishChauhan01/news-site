const fileInput     = document.getElementById("fileUpload");
const uploadBox     = document.getElementById("uploadBox");
const uploadContent = document.getElementById("uploadContent");
const imagePreview  = document.getElementById("imagePreview");
const previewImg    = document.getElementById("previewImg");
const chooseFile    = document.getElementById("chooseFile");
const removeImage   = document.getElementById("removeImage");


chooseFile?.addEventListener("click", () => {
  if (fileInput) fileInput.click();
});


fileInput?.addEventListener("change", function () {

 
  if (!this.files || this.files.length === 0) return;

  const file = this.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = function (e) {
    if (!e.target?.result) return;

    previewImg.src = e.target.result;
    uploadContent.style.display = "none";
    imagePreview.style.display = "block";
  };
  reader.readAsDataURL(file);
});


uploadBox?.addEventListener("dragover", e => {
  e.preventDefault();
  uploadBox.style.borderColor = "#6366f1";
});


uploadBox?.addEventListener("dragleave", () => {
  uploadBox.style.borderColor = "#cbd5e1";
});

uploadBox?.addEventListener("drop", e => {
  e.preventDefault();
  uploadBox.style.borderColor = "#cbd5e1";

  if (!e.dataTransfer || !e.dataTransfer.files || e.dataTransfer.files.length === 0) {
    return;
  }

  fileInput.files = e.dataTransfer.files;
  fileInput.dispatchEvent(new Event("change"));
});

removeImage?.addEventListener("click", () => {
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

if (editor && counter) {
  editor.addEventListener("input", () => {
    const text = editor.innerText.trim();
    const words = text ? text.split(/\s+/).length : 0;
    const chars = text.length;

    counter.innerText = `${words} words • ${chars} characters`;
  });
}


const textarea = document.getElementById("metaDescription");
const count = document.getElementById("metaCount");

if (textarea) {
  textarea.addEventListener("input", () => {
    count.textContent = textarea.value.length;
  });
}

const wrapper = document.getElementById("tagWrapper");
  if(wrapper){
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
}
  function addTag(text) {
    const tag = document.createElement("span");
    tag.className = "tag";
    tag.innerHTML = `${text} <span class="remove">×</span>`;

    tag.querySelector(".remove").addEventListener("click", () => {
      tag.remove();
    });

    wrapper.insertBefore(tag, input);
  }

if (wrapper) {
  wrapper.querySelectorAll(".remove").forEach(btn => {
    btn.addEventListener("click", function () {
      this.parentElement.remove();
    });
  });
}

const picker = document.getElementById('colorPicker');
const code   = document.getElementById('colorCode');


picker.addEventListener('input', function () {
    code.value = this.value.toUpperCase();
});

code.addEventListener('input', function () {
    if (/^#([0-9A-F]{3}){1,2}$/i.test(this.value)) {
        picker.value = this.value;
    }
});




document.addEventListener("DOMContentLoaded", () => {
  const emojiInput   = document.getElementById("emojiInput");
  const emojiValue   = document.getElementById("emojiValue");
  const pickerWrapper= document.getElementById("emojiPicker");
  const picker       = pickerWrapper.querySelector("emoji-picker");

  emojiInput.addEventListener("click", (e) => {
    e.stopPropagation();
    pickerWrapper.classList.remove("d-none");
  });

  pickerWrapper.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  picker.addEventListener("emoji-click", (e) => {
    const emoji = e.detail.unicode;

    emojiInput.value = emoji;   
    emojiValue.value = emoji;   

    pickerWrapper.classList.add("d-none");
  });

  document.addEventListener("click", () => {
    pickerWrapper.classList.add("d-none");
  });
});


document.addEventListener("DOMContentLoaded", () => {

  const catName         = document.getElementById("cat_name");
  const catSlug         = document.getElementById("cat-slug");
  const catDescription = document.getElementById("cat-description");
  const colorPicker    = document.getElementById("colorPicker");
  const colorCode = document.getElementById("colorCode");
  
  const emojiInput = document.getElementById("emojiInput");
  const emojiValue = document.getElementById("emojiValue");
  const emojiPicker = document.querySelector("emoji-picker");
  
  const previewName         = document.querySelector(".cat-preview-box .cat-name");
  const previewSlug         = document.querySelector(".cat-preview-box .cat-slug");
  const previewDescription  = document.querySelector(".cat-preview-box .cat-description");
  const previewIcon         = document.querySelector(".cat-preview-box .cat-icon");

  if (!previewName || !previewSlug || !previewDescription || !previewIcon) return;

  catName?.addEventListener("input", () => {
    previewName.textContent = catName.value || "Category Name";
  });

  catSlug?.addEventListener("input", () => {
    previewSlug.textContent = catSlug.value
      ? `/${catSlug.value}`
      : "/category-slug";
  });

  catDescription?.addEventListener("input", () => {
    previewDescription.textContent =
      catDescription.value || "Category description will appear here...";
  });

  colorPicker?.addEventListener("input", () => {
    const color = colorPicker.value;
    previewIcon.style.backgroundColor = color;
    if (colorCode) colorCode.value = color.toUpperCase();
  });

  
  emojiPicker?.addEventListener("emoji-click", (event) => {
    const emoji = event.detail.unicode;
    emojiInput.value = emoji;
    emojiValue.value = emoji;
    previewIcon.textContent = emoji;
  });


});
