<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/frontend/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
</head>

<body>
    <div class="media-modal-container" id="modal-container">
        <button id="modal" class="media-modal">Add Modal</button>

    </div>

    <div class="main-media-overlay" id="overlay">
        <div class="main-media" id="main-media">
            <div class="media-top-section">
                <div>
                    <h4>MEDIA GALLERY</h4>
                </div>
                <div class="media-search-bar">
                    <input class="media-search-box" type="text" placeholder="Search here...">
                    <button type="submit" class="media-search-btn"><i class="bi bi-search"></i></button>
                </div>


                {{-- <div class="drag-media">
                    <form action="{{ route('image.upload.store') }}" method="post" enctype="multipart/form-data"
                        name="upload" id="dropzone" class="dropzone">
                        <i class="bi bi-cloud-arrow-up media-upload-btn "></i>
                        @csrf
                    </form>
                </div> --}}

                <div class="media-close" id="close">
                    <button class="media-close-btn"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>
            {{-- image show --}}
            <div class="media-image-section">

                <div class="media-img-list">

                    <div class="media-image-grid">

                        <div class="media-img-grid-item">

                        </div>

                    </div>

                    <div style="padding-top: 20px;">

                    </div>

                </div>

                <!-- Media Img Desc -->
                <div class="media-img-desc">
                    <div class="drag-media">
                        <form action="{{ route('image.upload.store') }}" method="post" enctype="multipart/form-data"
                            name="upload" id="dropzone" class="dropzone">
                            <i class="bi bi-cloud-arrow-up media-upload-btn "></i>
                            @csrf
                        </form>
                    </div>

                    <!-- Media Filename Desc -->
                    <div class="media-img-desc-item media-file-name" id="file-item">
                        <p>File Name:</p>
                        <span id="file-name" style="font-size: 12px;">xxxxxxxxx.png</span>
                    </div>
                    <div class="media-img-desc-item" style="display: flex;gap: 12px;">
                        <div><button class="media-copy-btn" id="copy-url"><i class="bi bi-clipboard-check"></i> Copy
                                URL</button>
                        </div>
                        <div style="margin-top: 10px;" id="copy"></div>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <script></script>

    <!-- Modal -->
    <script>
        const mainMedia = document.getElementById('main-media');
        const modal = document.getElementById('modal');
        const close = document.getElementById('close');
        const overlay = document.getElementById('overlay');
        const modalContainer = document.getElementById('modal-container');

        modal.addEventListener("click", () => {
            mainMedia.style.visibility = "visible";
            mainMedia.style.zIndex = 10;
            overlay.style.visibility = "visible";
            overlay.style.zIndex = 10;
        });

        close.addEventListener("click", () => {
            mainMedia.style.visibility = "hidden";
            mainMedia.style.zIndex = -10;
            overlay.style.visibility = "hidden";
            overlay.style.zIndex = -10;
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js"
        integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Configure Dropzone -->
    <script>
        Dropzone.options.dropzone = {
            maxFilesize: 12,
            renameFile: function(file) {
                let name = file.name;
                let newName = name.split(" ").join("-");
                return newName;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: false,
            timeout: 1000,
            success: function(file, response) {
                const source = response.success;
                // showImage(source);
                console.log(source);

                document.querySelector(".media-image-grid").innerHTML = "loading...";
                hidePreview();
                show();
            },
            error: function(file, response) {
                return false;
            }

        };
    </script>
    <script>
        function show() {
            const xhr = new XMLHttpRequest();

            xhr.onload = function() {
                let data = JSON.parse(this.response).data;
                document.querySelector(".media-image-grid").innerHTML = "";
                data.forEach(element => {
                    // console.log(element);


                    showImage(element.filename);

                });
            }

            xhr.open('GET', 'all/info');


            xhr.send();
        }

        show();

        function myImage(data) {

            const fileName = document.getElementById("file-name");
            fileName.innerHTML = data;
            const fileItem = document.getElementById("file-item");
            fileItem.style.display = "block";

            // copy url

            const copyURL = document.getElementById("copy-url");
            copyURL.style.display = "block";
            copyURL.addEventListener("click", function() {
                navigator.clipboard.writeText("http://127.0.0.1:8000/images/" + fileName.innerHTML);

                document.getElementById("copy").innerHTML = "Copied";
                const myTimeOut = setTimeout(() => {
                    document.getElementById("copy").innerHTML = "";
                }, 3000);
            });

        }

        function showImage(source) {
            const img = document.createElement("img");
            img.style.width = "128px";
            img.style.height = "85px";
            img.src = "./images/" + source;

            const div = document.createElement("div");
            div.classList.add("media-img-grid-item");

            const parent = document.querySelector(".media-image-grid");
            parent.appendChild(div);
            div.appendChild(img);

            // click image
            img.addEventListener("click", function() {
                const fileName = document.getElementById("file-name");
                fileName.innerHTML = source;

                const fileItem = document.getElementById("file-item");
                fileItem.style.display = "block";

                // copy url
                const copyURL = document.getElementById("copy-url");
                copyURL.style.display = "block";
                copyURL.addEventListener("click", function() {
                    navigator.clipboard.writeText("http://127.0.0.1:8000/images/" + fileName.innerHTML);

                    document.getElementById("copy").innerHTML = "Copied";
                    const myTimeOut = setTimeout(() => {
                        document.getElementById("copy").innerHTML = "";
                    }, 3000);
                });
            });
        }

        function hidePreview() {
            document.querySelector(".dz-preview").style.display = "none";
            document.querySelector(".dz-image").style.display = "none";
        }
    </script>

</body>

</html>
