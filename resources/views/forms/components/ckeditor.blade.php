@php
    $statePath = $getStatePath();
    $id = $getId();
@endphp

<div
    x-data="{
        state: @entangle($statePath).defer,
        editor: null,
    }"
    x-init="
        const el = $refs.editor;
        const init = () => {
            if (window.CKEDITOR_LOADED) {
                createEditor();
                return;
            }
            const s = document.createElement('script');
            s.src = 'https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js';
            s.onload = () => {
                window.CKEDITOR_LOADED = true;
                createEditor();
            };
            document.head.appendChild(s);
        };

        const createEditor = () => {
            ClassicEditor.create(el, {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'strikethrough',
                        '|',
                        'link',
                        'blockQuote',
                        'codeBlock',
                        '|',
                        'numberedList',
                        'bulletedList',
                        '|',
                        'alignment',
                        '|',
                        'fontColor',
                        'fontBackgroundColor',
                        'fontSize',
                        'fontFamily',
                        '|',
                        'horizontalLine',
                        'insertTable',
                        'undo',
                        'redo',
                        '|',
                        'uploadImage',
                    ],
                    shouldNotGroupWhenFull: true,
                },
                fontSize: {
                    options: [12, 14, 16, 18, 20, 24, 30, 36],
                },
                fontColor: {
                    colors: [
                        { color: '#e53935', label: 'Red' },
                        { color: '#333333', label: 'Dark gray' },
                        { color: '#808080', label: 'Gray' },
                    ],
                    columns: 5,
                },
                fontFamily: {
                    supportAllValues: true,
                },
                alignment: {
                    options: [ 'left', 'center', 'right', 'justify' ],
                },
                simpleUpload: {
                    uploadUrl: '{{ route('filament.ckeditor.upload') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                },
            }).then(editor => {
                editor.setData(state || '');
                editor.model.document.on('change:data', () => {
                    state = editor.getData();
                });
                $watch('state', value => {
                    if (value !== editor.getData()) {
                        editor.setData(value || '');
                    }
                });
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '280px', editor.editing.view.document.getRoot());
                });
                window.addEventListener('filament-ckeditor-insert-banner', event => {
                    if (!event.detail?.html) return;
                    editor.model.change( writer => {
                        const viewFragment = editor.data.processor.toView( event.detail.html );
                        const modelFragment = editor.data.toModel( viewFragment );
                        editor.model.insertContent( modelFragment, editor.model.document.selection );
                    });
                });
            }).catch(error => {
                console.error(error);
            });
        };

        init();
    "
    wire:ignore
>
    <textarea x-ref="editor" id="{{ $id }}" style="display:none;">{!! $getState() !!}</textarea>
</div>

