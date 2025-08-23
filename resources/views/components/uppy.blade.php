<div
    x-cloak
    x-data
    x-init="
        uppy = Uppy.Core({
                autoProceed: true,
                allowMultipleUploads: true,
                debug: false,
                maxFileSize: 1*1024*1024,
                minNumberOfFiles: 1,
                maxNumberOfFiles: 3,
                allowedFileTypes: ['image/*', 'image/svg+xml'],
                onBeforeFileAdded: function(file) {
                    if (! ['image/jpeg', 'image/png', 'image/jpg', 'image/svg+xml'].includes(file.type)) {
                        // shows error message with toastr component
                        $dispatch('notice', { type: 'error', text: 'Image format invalid: jpg/png only'});
                        return false;
                    }
                }
            }).use(Uppy.Dashboard, {
                hideUploadButton: true,
                height: 320,
                width: '100%',
                inline: true,
                target: $refs.dropzone,
                replaceTargetContent: true,
                showProgressDetails: true,
                browserBackButtonClose: true,
                note: 'Images only, 2–3 files, up to 1 MB',
            }).use(Uppy.XHRUpload, {
                endpoint: '{{ $endpoint }}',
                formData: true,
                fieldName: 'file',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'Application/JSON'
                }
            });

        uppy.on('complete', (result) => {
            $dispatch('reload');

            setTimeout(() => {
                uppy.reset();
            }, 2500)
        })
    ">
    <div id="{{ $id ?? 'drag-drop-area' }}" x-ref="dropzone"></div>
</div>
