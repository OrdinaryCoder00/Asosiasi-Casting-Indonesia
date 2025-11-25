<style>
    .form-container {
        padding: 5rem;
        width: 100%;
    }

    .form-control-custom {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: none;
        border-radius: 4px;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        border-bottom: 2px solid #dee2e6;
        font-size: 20px
    }

    .form-right {
        padding-right: 1rem;
    }

    .form-left {
        padding-left: 1rem;
    }

    .form-control-custom:focus {
        border-bottom: 2px solid #6c757d;
        box-shadow: none;
        background: transparent;
        outline: none;
    }

    .form-control-custom::placeholder {
        color: #adb5bd;
        font-size: 18px;
    }

    .input-wrapper {
        position: relative;
        margin-bottom: 25px;
    }

    .input-wrapper::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #6c757d, #495057);
        transition: width 0.3s ease;
    }

    .input-wrapper:focus-within::after {
        width: 100%;
    }

    .upload-area {
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
        background: #f8f9fa;
        margin-bottom: 20px;
        min-height: 330px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .upload-area:hover {
        border-color: #6c757d;
        background: #e9ecef;
        transform: translateY(-2px);
    }

    .upload-area.dragover {
        border-color: #495057;
        background: #dee2e6;
        transform: scale(1.02);
    }

    .upload-icon {
        font-size: 48px;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .preview-container {
        margin-top: 15px;
        position: relative;
    }

    .preview-image {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 10px;
        object-fit: contain;
    }

    .preview-video {
        max-width: 100%;
        border-radius: 8px;
        margin-top: 10px;
    }

    .remove-file {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        font-size: 18px;
        /* line-height: 1; */
        transition: all 0.3s;
        z-index: 10;
    }

    .remove-file:hover {
        background: #bb2d3b;
        transform: rotate(90deg);
    }

    .file-info {
        margin-top: 10px;
        padding: 10px;
        background: #e9ecef;
        border-radius: 5px;
        font-size: 14px;
    }


    .section-title {
        color: #212529;
        margin-bottom: 30px;
        padding-bottom: 10px;
        font-weight: 600;
    }

    .form-check-input:checked {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .form-check-input:focus {
        border-color: #6c757d;
        box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25);
    }

    .btn-choose {
        border: 1px solid #9e9e9e;
        color: #9e9e9e;
        border-radius: 12px;
        transition: all 0.3s ease;
        background-color: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 400
    }

    .btn-choose:hover {
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
    }

    .page-title {
        color: #212529;
        text-align: start;
        margin-bottom: 4rem;
        font-weight: 700;
    }

    .btn-submit {
        background-color: #ee0000;
        color: #fff;
        border: none;
        padding: 0.65rem 1.5rem;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-submit:hover {
        box-shadow: 0 5px 15px rgba(238, 0, 0, 0.4);
        background-color: #dc0000;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .form-container {
            padding-inline: 3rem;
            padding-block: 3rem;
        }

        .submit-row {
            margin-top: 20px;
        }

        .btn-choose {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .form-container {
            padding-inline: 2rem;
            padding-block: 2rem;
        }

        .page-title {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 1.2rem;
        }

        .upload-area {
            padding: 20px;
        }

        .upload-icon {
            font-size: 36px;
        }

        .form-right {
            padding-right: 0rem;
        }

        .form-left {
            padding-left: 0rem;
        }
    }

    @media (max-width: 576px) {
        .form-container {
            padding-inline: 1.8rem;
            padding-block: 2rem;
        }

        .row>div[class*="col-"] {
            padding-left: 10px;
            padding-right: 10px;
        }

        .input-wrapper {
            margin-bottom: 20px;
        }
    }
</style>

<x-layout.layout>
    <div class="bg-white">
        <div class="form-container">
            <div class="">
                <h2 class="page-title pl-lg-4">CASTING SUBMISSION</h2>
            </div>

            <form id="castingForm ">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-right" style="">
                            <h4 class="section-title">Personal Information</h4>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="fullname"
                                    placeholder="Full Name *" required>
                            </div>
                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="dob"
                                    placeholder="Date of Birth *" onfocus="(this.type='date')"
                                    onblur="if(!this.value)this.type='text'" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="gender"
                                    placeholder="Gender * (Laki-laki/Perempuan)" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                        <input type="number" class="form-control-custom" id="height"
                                            placeholder="Height (cm) *" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-wrapper">
                                        <input type="number" class="form-control-custom" id="weight"
                                            placeholder="Weight (kg) *" required>
                                    </div>
                                </div>
                            </div>

                            <div class="input-wrapper">
                                <input type="tel" class="form-control-custom" id="phone"
                                    placeholder="Phone Number *" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="email" class="form-control-custom" id="email"
                                    placeholder="Email Address *" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="city"
                                    placeholder="City/Domicile *" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="url" class="form-control-custom" id="portfolio"
                                    placeholder="Instagram or Portfolio Link (Optional)">
                            </div>

                            <h4 class="section-title mt-5">Acting / Casting Information</h4>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="projects"
                                    placeholder="Previous Projects (Optional - Sebutkan proyek-proyek sebelumnya)">
                            </div>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="skills"
                                    placeholder="Skills * (ex: singing, dancing, martial arts)" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="languages"
                                    placeholder="Language(s) Spoken * (ex: Indonesian, English)" required>
                            </div>

                            <div class="input-wrapper">
                                <input type="text" class="form-control-custom" id="category"
                                    placeholder="Talent Category * (Actor/Model/Extra/Voice Actor/Other)" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-left">
                            <h4 class="section-title mt-lg-0 mt-4">Upload Media</h4>

                            <div class="mb-4">
                                <h6 class="fw-bold mb-3" style="color: slategray">Composite Photo (JPG/PNG) *</h6>
                                <div class="upload-area" id="photoUploadArea">
                                    <div class="upload-icon">
                                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 32px;"></i>
                                    </div>
                                    <div class="d-flex flex-column mb-1">
                                        <span class="">Choose a file or drag & drop it here.</span>
                                        <span class="text-muted small">Composite Photo, PDF (max 2MB)</span>
                                    </div>
                                    <button type="button" class="btn-choose">Browse Files</button>
                                    <input type="file" id="photoInput" accept="image/jpeg,image/png" hidden>
                                </div>
                                <div id="photoPreview" class="preview-container" style="display:none;">
                                    <button type="button" class="remove-file" onclick="removePhoto()">×</button>
                                    <img id="photoImg" class="preview-image" alt="Preview">
                                    <div id="photoInfo" class="file-info"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold mb-3" style="color: slategray">Video Casting (MP4) *</h6>
                                <div class="upload-area" id="videoUploadArea">
                                    <div class="upload-icon">
                                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 32px;"></i>
                                    </div>
                                    <div class="d-flex flex-column mb-1">
                                        <span class="">Choose a file or drag & drop it here.</span>
                                        <span class="text-muted small">Video Casting, MP4 (max 5MB)</span>
                                    </div>
                                    <button type="button" class="btn-choose">Browse Files</button>
                                    <input type="file" id="videoInput" accept="video/mp4" hidden>
                                </div>
                                <div id="videoPreview" class="preview-container" style="display:none;">
                                    <button type="button" class="remove-file" onclick="removeVideo()">×</button>
                                    <video id="videoPlayer" class="preview-video" controls></video>
                                    <div id="videoInfo" class="file-info"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="confirmInfo" required>
                                    <label class="form-check-label" for="confirmInfo">
                                        I confirm that all information provided is true.
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="confirmPermission" required>
                                    <label class="form-check-label" for="confirmPermission">
                                        I give permission for ACI to store and use my data for casting purposes.
                                    </label>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn-submit py-2 px-3">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const photoUploadArea = document.getElementById('photoUploadArea');
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const photoImg = document.getElementById('photoImg');
        const photoInfo = document.getElementById('photoInfo');

        photoUploadArea.addEventListener('click', () => photoInput.click());

        photoUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            photoUploadArea.classList.add('dragover');
        });

        photoUploadArea.addEventListener('dragleave', () => {
            photoUploadArea.classList.remove('dragover');
        });

        photoUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            photoUploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handlePhotoUpload(files[0]);
            }
        });

        photoInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handlePhotoUpload(e.target.files[0]);
            }
        });

        function handlePhotoUpload(file) {
            if (!file.type.match('image/jpeg') && !file.type.match('image/png')) {
                alert('Hanya file JPG atau PNG yang diperbolehkan!');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file maksimal 5MB!');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                photoImg.src = e.target.result;
                photoUploadArea.style.display = 'none';
                photoPreview.style.display = 'block';
                photoInfo.innerHTML =
                    `<strong>${file.name}</strong><br>Size: ${(file.size / 1024 / 1024).toFixed(2)} MB`;
            };
            reader.readAsDataURL(file);
        }

        function removePhoto() {
            photoInput.value = '';
            photoUploadArea.style.display = 'block';
            photoPreview.style.display = 'none';
            photoImg.src = '';
        }

        const videoUploadArea = document.getElementById('videoUploadArea');
        const videoInput = document.getElementById('videoInput');
        const videoPreview = document.getElementById('videoPreview');
        const videoPlayer = document.getElementById('videoPlayer');
        const videoInfo = document.getElementById('videoInfo');

        videoUploadArea.addEventListener('click', () => videoInput.click());

        videoUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            videoUploadArea.classList.add('dragover');
        });

        videoUploadArea.addEventListener('dragleave', () => {
            videoUploadArea.classList.remove('dragover');
        });

        videoUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            videoUploadArea.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleVideoUpload(files[0]);
            }
        });

        videoInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleVideoUpload(e.target.files[0]);
            }
        });

        function handleVideoUpload(file) {
            if (!file.type.match('video/mp4')) {
                alert('Hanya file MP4 yang diperbolehkan!');
                return;
            }

            if (file.size > 50 * 1024 * 1024) {
                alert('Ukuran file maksimal 50MB!');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                videoPlayer.src = e.target.result;
                videoUploadArea.style.display = 'none';
                videoPreview.style.display = 'block';
                videoInfo.innerHTML =
                    `<strong>${file.name}</strong><br>Size: ${(file.size / 1024 / 1024).toFixed(2)} MB`;
            };
            reader.readAsDataURL(file);
        }

        function removeVideo() {
            videoInput.value = '';
            videoUploadArea.style.display = 'block';
            videoPreview.style.display = 'none';
            videoPlayer.src = '';
        }

        document.getElementById('castingForm').addEventListener('submit', (e) => {
            e.preventDefault();

            if (!photoInput.files.length) {
                alert('Silakan upload foto composite!');
                return;
            }

            if (!videoInput.files.length) {
                alert('Silakan upload video casting!');
                return;
            }

            alert('Form berhasil disubmit! Data Anda akan kami proses.');
        });
    </script>
</x-layout.layout>
