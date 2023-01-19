<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Upload Multiple Image</title>

</head>

<body>
    <div class="container">
        <h3>Upload your image here</h3>
        <div class="drop-container">
            <form action="{{ route('drag.upload') }}" method="post" name="upload" enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                @csrf

                <strong id="alert" style="color: red;"></strong>
            </form>
        </div>
    </div>

    <div id="image-container">

    </div>
    <!-- Drag and Drop system -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"
        integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            uploadMultiple: true,
            renameFile: function(file) {
                let name = file.name;
                let newName = name.split(" ").join("-");
                return newName;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: false,
            timeout: 5000,
            // removedfile: function(file) {
            //     var name = file.upload.filename;
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //         },
            //         type: 'POST',
            //         url: '{{ url('image/delete') }}',
            //         data: {
            //             filename: name
            //         },
            //         success: function(data) {
            //             console.log("File has been successfully removed!!");
            //         },
            //         error: function(e) {
            //             console.log(e);
            //         }
            //     });
            //     var fileRef;
            //     return (fileRef = file.previewElement) != null ?
            //         fileRef.parentNode.removeChild(file.previewElement) : void 0;
            // },



            success: function(file, response) {
                let a = response.success;
                showImage(a);


            },
            error: function(file, response) {
                return false;
            }
        };
    </script>

    <script>
        function showImage(a) {
            const imgContainer = document.getElementById("image-container");

            const img = document.createElement("img");
            img.src = a;
            img.style.width = "200px";
            img.style.margin = "10px";
            imgContainer.appendChild(img);

            img.addEventListener("click", () => {
                alert(img.src);
            });
        }
    </script>


</body>

</html>
