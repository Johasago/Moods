<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="form">
                <form action="File_upload/uploadFile" method="post" enctype="multipart/form-data">
    <h3><strong>Select file to upload:</strong></h3>
    <input type="file" name="fileToUpload" id="file">
    <input type="hidden" name="MAX_FILE_SIZE" value=2000000>
    <p>*Only XML files allowed</p>
    <br><button type="submit" value="send">UPLOAD</button>
</form>
            </div>
        </div>
         <div class="col-sm-6">
            <div class="form">
                <form action="File_upload/uploadImages" method="post" enctype="multipart/form-data" id="uploadForm">
    <h3><strong>Select images to upload:</strong></h3>
    <input type="file" name="files[]" id="file" multiple="multiple" accept="image/*">
        <p>*Only jpeg files allowed</p>
    <br><button type="submit" value="send">UPLOAD</button>
</form>
                

<!-- display upload status -->
<div id="uploadStatus"></div>
            </div>
        </div>
    </div>
</div>

