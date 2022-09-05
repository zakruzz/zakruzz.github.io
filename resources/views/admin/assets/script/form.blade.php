<script src="{{asset('admin-assets/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/js/scripts/forms/form-select2.js')}}"></script>

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#ckeditor' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>

<script type="text/javascript">
    $(document).on('submit', '#form-post', function(e) {
        e.preventDefault();

        $('#loader').css('display', 'block').animate({
            width:'90%'
        });

        let progressValue = 0;
        const progressBar = document.querySelector("#loader");

        progressBar.style.width = `${progressValue}%`;

        const timer = setInterval(() => {
            if (progressValue < 100) {
                progressValue += 10;
                progressBar.style.width = `${progressValue}%`;

            }
            if (progressValue === 100) {
                clearInterval(timer);
            }
        }, 1000);

        $.ajax({
            url: $("#form-post").attr('action'),
            method: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
        }).then((result) => {
            $('#loader').css('display', 'none');
            if (result.success) {
                Swal.fire({
                    type: 'success',
                    title: 'Sukses!',
                    text: result.message,
                }).then(function() {
                    location.href = result.url;
                });
            }else{
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: result.message,
                });
            }
        });
    });

    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageInp").change(function () {
            readURL(this);
        });
    });
</script>
