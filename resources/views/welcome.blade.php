<!DOCTYPE html>
{{-- <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/frontend/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


    <title>Document</title>
</head>

<body>
    <div class="modal-container" id="modal-container">
        <button id="modal" class="modal">Add Modal</button>

        <input type="text"
            style="width: 50%; height: 30px; background-color: white; border: 1px solid black; border-radius: 5px; display: block; "
            placeholder="Your name">
        <br>
        <input type="text"
            style="width: 50%; height: 30px; background-color: white; border: 1px solid black; border-radius: 5px; display: block; "
            placeholder="Your name">


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
                <div class="drag-media"><button class="media-upload-btn"><i class="bi bi-cloud-arrow-up"></i></button>
                </div>
                <div class="media-close" id="close">
                    <button class="media-close-btn"><i class="bi bi-x-lg"></i></button>
                </div>
            </div>

            <div class="meida-image-section">

                <div class="media-img-list">

                    <div class="media-image-grid">
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85">
                        </div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>
                        <div class="media-img-grid-item"><img src="{{ asset('/images/Oppo.png') }}" alt=""
                                width="128" height="85"></div>

                    </div>

                    <div style="padding-top: 20px;">
                        here is pagination
                    </div>

                </div>

                <div class="media-img-desc">
                    <div class="media-img-desc-item">
                        <div>File Name:</div>
                        <div>xxxxxxxxx.png</div>
                    </div>
                    <div class="media-img-desc-item" style="display: flex;gap: 12px;">
                        <div><button class="media-copy-btn"><i class="bi bi-clipboard-check"></i> Copy URL</button>
                        </div>
                        <div style="margin-top: 10px;">Copied</div>
                    </div>
                    <div class="media-img-desc-item">
                        <div><button class="media-delete-btn"><i class="bi bi-trash"></i> Delete IMG</button></div>
                    </div>
                </div>

            </div>
        </div>
    </div>


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
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <div style="margin:auto; text-align: center">
        <h3>welcome to Dropzone</h3>
    </div>
</body>

</html>
