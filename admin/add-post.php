<?php include "header.php"; ?>
<section class="add-post-page section-padding min-height">
    <div class="container">
        <div class="page-title">
            <h2 class="common-title">Create New Post</h2>
            <p>Share your story with the world. Fill in the details below to publish your post.</p>
        </div>
    </div>
    <div class="add-post-form">

        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-md-8">
                        <div class="left-container">
                            <div class="input-field-box">
                                <label for="post_title" class="form-label">Post Title</label>
                                <input type="text" name="post_title" id="post_title" placeholder="Enter your post title.." class="form-control">
                            </div>
                            <div class="input-field-box mt-4">
                                <div class="upload-card">
                                    <label class="upload-label">Featured Image</label>

                                    <div class="upload-box" id="uploadBox">
                                        <input type="file" id="fileUpload" accept="image/*" hidden>

                                        <!-- Upload Content -->
                                        <div class="upload-content" id="uploadContent">
                                            <svg class="upload-icon" viewBox="0 0 24 24">
                                                <path d="M12 16V4M12 4L7 9M12 4l5 5" />
                                                <path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2" />
                                            </svg>

                                            <p class="upload-text">Click to upload or drag and drop</p>
                                            <span class="upload-hint">PNG, JPG, GIF up to 10MB</span>

                                            <button type="button" class="upload-btn" id="chooseFile">
                                                Choose File
                                            </button>
                                        </div>

                                        <!-- Preview -->
                                        <div class="image-preview" id="imagePreview">
                                            <img id="previewImg" alt="Preview">
                                            <button type="button" class="remove-btn" id="removeImage">Remove</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-container"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include "footer.php"; ?>