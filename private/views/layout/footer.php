<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
<?php include("views/layout/shortcodes_modals.php"); ?>
<script>
const textarea = document.getElementById('content');
const insertImageButton = document.getElementById('insert-image-button'); 
const imageModal = document.getElementById('imageModal');
const imageUrlInput = document.getElementById('imageUrl');

insertImageButton.addEventListener('click', () => {
    const imageUrl = imageUrlInput.value;
    textarea.value += `[image url="${imageUrl}"]`;
    $('#imageModal').modal('hide');
});

imageModal.addEventListener('shown.bs.modal', () => {
    imageUrlInput.focus()
});

const insertGalleryButton = document.getElementById('insert-gallery-button');
const galleryModal = document.getElementById('galleryModal');
const url1Input = document.getElementById('url1');
const url2Input = document.getElementById('url2');
const url3Input = document.getElementById('url3');
const url4Input = document.getElementById('url4');

insertGalleryButton.addEventListener('click', () => {
    const url1 = url1Input.value;
    const url2 = url2Input.value;
    const url3 = url3Input.value;
    const url4 = url4Input.value;
    textarea.value += `[gallery url1="${url1}" url2="${url2}" url3="${url3}" url4="${url4}"]`;
    $('#galleryModal').modal('hide');
});

galleryModal.addEventListener('shown.bs.modal', () => {
    url1Input.focus()
});

</script>

