<style>
  .bscallout {
    background-color: var(--bs-info-bg-subtle);
    padding: 10px 10px 10px 20px;
    margin: 0;
    border-left: var(--bs-info) 4px solid;
    width: 99%;
  }
</style>
<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="imageModal">imageModal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="bscallout form-text mb-3 mt-3">Si vous uploader vos images via FTP, déposez-les dans le dossier /public/uploads/</div>
        <form>
          <div class="form-group">
            <label for="imageUrl">Image URL</label>
            <input type="text" class="form-control" id="imageUrl" placeholder="Enter image URL">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="insert-image-button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="galleryModalLabel">Ajouter une gallerie de photos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="bscallout form-text mb-3 mt-3">Si vous uploader vos images via FTP, déposez-les dans le dossier /public/uploads/</div>
          <div class="form-group mb-3">
            <label for="url1">Image URL 1</label>
            <input type="text" class="form-control" id="url1" placeholder="Enter image URL">
          </div>
          <div class="form-group mb-3">
            <label for="url2">Image URL 2</label>
            <input type="text" class="form-control" id="url2" placeholder="Enter image URL">
          </div>
          <div class="form-group mb-3">
            <label for="url3">Image URL 3</label>
            <input type="text" class="form-control" id="url3" placeholder="Enter image URL">
          </div>
          <div class="form-group mb-3">
            <label for="url4">Image URL 4</label>
            <input type="text" class="form-control" id="url4" placeholder="Enter image URL">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="insert-gallery-button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- shortCodeModal -->
<div class="modal fade" id="shortCodeModal" tabindex="-1" role="dialog" aria-labelledby="shortCodeModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Liste des shortcodes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="content-text-modal">
          <p>Ajouter une image<br>
            <code>[image url="path/to/image.jpg"]</code>
          </p>
          <p>Ajouter une gallerie d'image <br>
            <code>[gallery url1="path/to/image.jpg" url2="path/to/image.jpg" url3="path/to/image.jpg" url4="path/to/image.jpg"]</code>
          </p>
          <p>Ajouter une légende<br>
            <code>[caption text="caption goes here"]</code>
          </p>
          <p> Ajouter une video youtube<br>
            <code>[youtube id="hf4ji48276h"]</code>
          </p>
          <p>Ajouter une citation<br>
            <code>[blockquote text="type your text here."]</code>
          </p>
          <a href="http://rewind.radio/posts.php?id=5"> Un exemple de page avec les shortcodes en action</a>
        </div>
      </div>
    </div>
  </div>
</div>