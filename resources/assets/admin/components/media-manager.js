export default function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';


    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
};
