<style>
    .form-container {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-control-custom,
    .form-select,
    textarea.form-control-custom {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: var(--bs-body-color);
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: var(--bs-body-bg);
        background-clip: padding-box;
        border: none;
        border-radius: var(--bs-border-radius);
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        border-bottom: 2px solid #dee2e6;
    }

    .form-control-custom:focus,
    .form-select:focus,
    textarea.form-control-custom:focus {
        border-bottom: 2px solid #0d6efd;
        box-shadow: none;
        background: transparent;
        outline: none;
    }

    .form-control-custom::placeholder,
    .form-select::placeholder {
        color: #adb5bd;
        font-size: 14px;
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
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        transition: width 0.3s ease;
    }

    .input-wrapper:focus-within::after {
        width: 100%;
    }

    textarea.form-control-custom {
        resize: vertical;
        min-height: 80px;
    }

    .upload-area {
        border: 2px dashed #dee2e6;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
        background: #f8f9fa;
        margin-bottom: 20px;
    }

    .upload-area:hover {
        border-color: #0d6efd;
        background: #e7f1ff;
        transform: translateY(-2px);
    }

    .upload-area.dragover {
        border-color: #0d6efd;
        background: #cfe2ff;
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
        line-height: 1;
        transition: all 0.3s;
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
        color: #0d6efd;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 2px solid #0d6efd;
        font-weight: 600;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .form-check-input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #b90e0e, #ee0000);
        border: none;
        transition: all 0.3s ease;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
    }
</style>
<x-layout.layout>
<div style="background-color: #f8f9fa;" class="container-fluid">
    <div class="form-container">
        <h2 class="text-center mb-4">Form Pendaftaran Casting</h2>

        <form id="castingForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Personal Info -->
                <div class="col-lg-7">
                    <h4 class="section-title">Personal Information</h4>
                    <div class="input-wrapper"><input type="text" name="fullname" class="form-control-custom" placeholder="Full Name *" required></div>
                    <div class="input-wrapper"><input type="date" name="dob" class="form-control-custom" required></div>
                    <div class="input-wrapper">
                        <select name="gender" class="form-select" required>
                            <option value="">Gender *</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><div class="input-wrapper"><input type="number" name="height" class="form-control-custom" placeholder="Height (cm) *" required></div></div>
                        <div class="col-md-6"><div class="input-wrapper"><input type="number" name="weight" class="form-control-custom" placeholder="Weight (kg) *" required></div></div>
                    </div>
                    <div class="input-wrapper"><input type="tel" name="phone" class="form-control-custom" placeholder="Phone Number *" required></div>
                    <div class="input-wrapper"><input type="email" name="email" class="form-control-custom" placeholder="Email Address *" required></div>
                    <div class="input-wrapper"><input type="text" name="city" class="form-control-custom" placeholder="City/Domicile *" required></div>
                    <div class="input-wrapper"><input type="url" name="portfolio_link" class="form-control-custom" placeholder="Instagram or Portfolio Link (Optional)"></div>

                    <h4 class="section-title mt-4">Acting / Casting Information</h4>
                    <div class="input-wrapper"><textarea name="projects" class="form-control-custom" rows="3" placeholder="Previous Projects (Optional)"></textarea></div>
                    <div class="input-wrapper"><input type="text" name="skills" class="form-control-custom" placeholder="Skills *" required></div>
                    <div class="input-wrapper"><input type="text" name="languages" class="form-control-custom" placeholder="Language(s) Spoken *" required></div>
                    <div class="input-wrapper">
                        <select name="category" class="form-select" required>
                            <option value="">Talent Category *</option>
                            <option value="actor">Actor</option>
                            <option value="model">Model</option>
                            <option value="extra">Extra</option>
                            <option value="voice-actor">Voice Actor</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Upload Media -->
                <div class="col-lg-5">
                    <h4 class="section-title">Upload Media</h4>
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">📷 Composite Photo (JPG/PNG) *</h6>
                        <div class="upload-area" id="photoUploadArea">
                            <div class="upload-icon">📷</div>
                            <p class="mb-2">Drag & Drop foto di sini</p>
                            <p class="text-muted small">atau</p>
                            <button type="button" class="btn btn-primary btn-sm">Pilih Foto</button>
                            <input type="file" name="photo" id="photoInput" accept="image/jpeg,image/png" hidden required>
                        </div>
                        <div id="photoPreview" class="preview-container" style="display:none;">
                            <button type="button" class="remove-file" onclick="removePhoto()">×</button>
                            <img id="photoImg" class="preview-image" alt="Preview">
                            <div id="photoInfo" class="file-info"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h6 class="fw-bold mb-3">🎥 Video Casting (MP4) *</h6>
                        <div class="upload-area" id="videoUploadArea">
                            <div class="upload-icon">🎥</div>
                            <p class="mb-2">Drag & Drop video di sini</p>
                            <p class="text-muted small">atau</p>
                            <button type="button" class="btn btn-primary btn-sm">Pilih Video</button>
                            <input type="file" name="video" id="videoInput" accept="video/mp4" hidden required>
                        </div>
                        <div id="videoPreview" class="preview-container" style="display:none;">
                            <button type="button" class="remove-file" onclick="removeVideo()">×</button>
                            <video id="videoPlayer" class="preview-video" controls></video>
                            <div id="videoInfo" class="file-info"></div>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="confirmInfo" required>
                        <label class="form-check-label">I confirm that all information provided is true.</label>
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="confirmPermission" required>
                        <label class="form-check-label">I give permission for ACI to store and use my data for casting purposes.</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3">Submit Application</button>
                </div>
            </div>
        </form>
    </div>
</div>
</x-layout.layout>

<script>
const photoUploadArea = document.getElementById('photoUploadArea');
const photoInput = document.getElementById('photoInput');
const photoPreview = document.getElementById('photoPreview');
const photoImg = document.getElementById('photoImg');
const photoInfo = document.getElementById('photoInfo');

photoUploadArea.addEventListener('click', () => photoInput.click());
photoUploadArea.addEventListener('dragover', e => { e.preventDefault(); photoUploadArea.classList.add('dragover'); });
photoUploadArea.addEventListener('dragleave', () => photoUploadArea.classList.remove('dragover'));
photoUploadArea.addEventListener('drop', e => {
    e.preventDefault();
    photoUploadArea.classList.remove('dragover');
    if(e.dataTransfer.files.length) handlePhotoUpload(e.dataTransfer.files[0]);
});
photoInput.addEventListener('change', e => { if(e.target.files.length) handlePhotoUpload(e.target.files[0]); });

function handlePhotoUpload(file){
    if(!file.type.match('image/jpeg') && !file.type.match('image/png')) return alert('Hanya JPG/PNG!');
    if(file.size > 5*1024*1024) return alert('Maks 5MB!');
    const reader = new FileReader();
    reader.onload = e => {
        photoImg.src = e.target.result;
        photoUploadArea.style.display='none';
        photoPreview.style.display='block';
        photoInfo.innerHTML = `<strong>${file.name}</strong><br>Size: ${(file.size/1024/1024).toFixed(2)} MB`;
    }
    reader.readAsDataURL(file);
}
function removePhoto(){ photoInput.value=''; photoUploadArea.style.display='block'; photoPreview.style.display='none'; photoImg.src=''; }

const videoUploadArea = document.getElementById('videoUploadArea');
const videoInput = document.getElementById('videoInput');
const videoPreview = document.getElementById('videoPreview');
const videoPlayer = document.getElementById('videoPlayer');
const videoInfo = document.getElementById('videoInfo');

videoUploadArea.addEventListener('click', () => videoInput.click());
videoUploadArea.addEventListener('dragover', e => { e.preventDefault(); videoUploadArea.classList.add('dragover'); });
videoUploadArea.addEventListener('dragleave', () => videoUploadArea.classList.remove('dragover'));
videoUploadArea.addEventListener('drop', e => {
    e.preventDefault();
    videoUploadArea.classList.remove('dragover');
    if(e.dataTransfer.files.length) handleVideoUpload(e.dataTransfer.files[0]);
});
videoInput.addEventListener('change', e => { if(e.target.files.length) handleVideoUpload(e.target.files[0]); });

function handleVideoUpload(file){
    if(!file.type.match('video/mp4')) return alert('Hanya MP4!');
    if(file.size > 50*1024*1024) return alert('Maks 50MB!');
    const reader = new FileReader();
    reader.onload = e => {
        videoPlayer.src = e.target.result;
        videoUploadArea.style.display='none';
        videoPreview.style.display='block';
        videoInfo.innerHTML = `<strong>${file.name}</strong><br>Size: ${(file.size/1024/1024).toFixed(2)} MB`;
    }
    reader.readAsDataURL(file);
}
function removeVideo(){ videoInput.value=''; videoUploadArea.style.display='block'; videoPreview.style.display='none'; videoPlayer.src=''; }

document.getElementById('castingForm').addEventListener('submit', async e => {
    e.preventDefault();
    const form = e.target;

    const formData = new FormData(form);

    try {
        const res = await fetch("{{ route('casting.submit') }}", {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
            body: formData
        });
        const result = await res.json();

        if(result.success){
            alert(result.message);
            form.reset();
            removePhoto();
            removeVideo();
        } else {
            alert('Gagal submit: ' + (result.message || 'Unknown error'));
        }
    } catch(err){
        console.error(err);
        alert('Terjadi kesalahan server.');
    }
});
</script>