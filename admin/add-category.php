<?php include('header.php'); ?>
<label>Category Icon (Emoji)</label>
<select id="catIcon" name="icon">
    <option value="🏷️">🏷️ Tag</option>
    <option value="💻">💻 Laptop</option>
    <option value="💪">💪 Fitness</option>
    <option value="🧰">🧰 Tools</option>
    <option value="🔍">🔍 Search</option>
    <option value="💼">💼 Job</option>
    <option value="👗">👗 Fashion</option>
    <option value="🎬">🎬 Movies</option>
    <option value="⚽">⚽ Sports</option>
</select>

<a href="#"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    Open Modal
</a>

<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>