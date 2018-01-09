import SimpleMDE from 'simplemde';
import mediaManager from './components/media-manager';

let editors = document.getElementsByClassName('markdown-editor');

if (editors.length) {
    new SimpleMDE({
        element: editors[0],
        spellChecker: true,
        autosave: {
            enabled: true,
            uniqueId: window.location,
        },
        toolbar: [
            "bold",
            "italic",
            "heading",
            "|",
            "code",
            "quote",
            "unordered-list",
            "ordered-list",
            "table",
            "|",
            "link",
            "image",
            {
                name: "file-manager",
                action: function openFileManager(editor){
                    // Currently only works in list-view
                    mediaManager({type: 'Images', prefix: '/laravel-filemanager'}, function(url, path) {
                        let pos = editor.codemirror.getCursor();
                        editor.codemirror.setSelection(pos, pos);
                        editor.codemirror.replaceSelection('![]('+url+')');
                    });
                },
                className: "fa fa-folder-open-o",
                title: "File Manager",
            },
            "|",
            "preview",
            "side-by-side",
            "fullscreen",
            "|",
            "guide"
        ]
    });
}

let flashes = document.getElementsByClassName('alert');

if (flashes.length) {
    setTimeout(function() {
        for(let i = 0; i < flashes.length; i++) {
            flashes[i].style.display = 'none';
        }
    }, 3000);
}
