       <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
       <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
       <link rel="stylesheet" href="../dist/css/adminlte.min.css">
       <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
       <link rel="stylesheet" href="../plugins/codemirror/codemirror.css">
       <link rel="stylesheet" href="../plugins/codemirror/theme/monokai.css">
       <link rel="stylesheet" href="../plugins/simplemde/simplemde.min.css">

       <script src="../plugins/jquery/jquery.min.js"></script>
       <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
       <script src="../dist/js/adminlte.js"></script>
       <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
       <script src="../plugins/raphael/raphael.min.js"></script>
       <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
       <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
       <script src="../plugins/chart.js/Chart.min.js"></script>
       <script src="../dist/js/demo.js"></script>
       <script src="../dist/js/pages/dashboard2.js"></script>
       <script src="../plugins/summernote/summernote-bs4.min.js"></script>
       <script src="../plugins/codemirror/codemirror.js"></script>
       <script src="../plugins/codemirror/mode/css/css.js"></script>
       <script src="../plugins/codemirror/mode/xml/xml.js"></script>
       <script src="../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
       <script src="../dist/js/demo.js"></script>

       <script>
$(function() {
  // Summernote
  $('#summernote').summernote()

  // CodeMirror
  CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    mode: "htmlmixed",
    theme: "monokai"
  });
})
       </script>