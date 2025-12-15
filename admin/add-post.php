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
                                    <label class="form-label">Featured Image</label>
                                    <div class="upload-box" id="uploadBox">
                                        <input type="file" id="fileUpload" accept="image/*" hidden>
                                        <div class="upload-content" id="uploadContent">
                                            <svg class="upload-icon" viewBox="0 0 24 24">
                                                <path d="M12 16V4M12 4L7 9M12 4l5 5" />
                                                <path d="M4 16v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2" />
                                            </svg>
                                            <p class="upload-text">Click to upload or drag and drop</p>
                                            <span class="upload-hint">PNG, JPG, GIF up to 10MB</span>
                                            <button type="button" class="blue-btn" id="chooseFile">
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
                            <div class="input-field-box mt-4">
                                <div class="editor-card">
                                    <div class="editor-header">
                                        <label class="form-label">Post Content</label>
                                        <div class="editor-tools">
                                            <button data-action="bold"><b>B</b></button>
                                            <button data-action="italic"><i>I</i></button>
                                            <button data-action="ul">• • •</button>
                                            <button data-action="link">🔗</button>
                                            <button data-action="align">≡</button>
                                        </div>
                                    </div>

                                    <div class="editor-body"
                                        contenteditable="true"
                                        id="editor"
                                        placeholder="Write your content here...">
                                    </div>

                                    <div class="editor-footer">
                                        <span id="counter">0 words • 0 characters</span>
                                        <span class="hint">Markdown supported</span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-field-box mt-4">
                                <div class="seo-fields">
                                    <h2 class="common-subtitle left-border">SEO Settings</h2>
                                    <div>
                                        <label class="form-label">
                                            Meta Description
                                        </label>
                                        <textarea id="metaDescription"
                                            maxlength="160"
                                            placeholder="Brief description for search engines.."
                                            class="form-control"
                                            rows="3">
                                        </textarea>
                                        <p><span id="metaCount">0</span>/160 characters</p>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Url Slug</label>
                                        <input type="text" placeholder="your-post-url-slug" name="post_slug" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-container">
                            <div class="input-field-box">
                                <div class="publish-fields">
                                    <h2 class="common-subtitle left-border">Publish</h2>
                                    <div>
                                        <label class="form-label">Status</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Draft</option>
                                            <option value="" selected>Published</option>
                                            <option value="">Scheduled</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Visibility</label>
                                        <select name="" id="" class="form-select">
                                            <option value="">Public</option>
                                            <option value="">Private</option>
                                            <option value="">Password Protected</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Publish Date</label>
                                        <input type="date" name="" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="input-field-box mt-4">
                                <div class="publish-fields">
                                    <h2 class="common-subtitle left-border">Category</h2>
                                    <div>
                                        <select name="" id="" class="form-select">
                                            <option value="">Select a category</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="input-field-box mt-4">
                                <div class="publish-fields">
                                    <h2 class="common-subtitle left-border">Tags</h2>
                                    <input type="text" placeholder="Type and press Enter to add tags.." class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>