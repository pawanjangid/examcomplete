  <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.1.0.js"></script>
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url(); ?>/editor/tinymce.min.js"></script>
  <script type="text/javascript">
           
            tinyMCE.init({
              selector:'textarea',
              theme : "modern",
              plugins: ['advlist autolink lists link image jbimages eqneditor charmap print preview hr anchor pagebreak tiny_mce_wiris',
              'searchreplace wordcount visualblocks visualchars code fullscreen',
              'insertdatetime media nonbreaking save table contextmenu directionality',
              'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'],
              toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
              toolbar2: 'link image |  jbimages | eqneditor',
              toolbar3: 'tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry tiny_mce_wiris_CAS | print preview media | forecolor backcolor emoticons | codesample help',
              image_advtab: true,

            });

            
        </script>

        <script type="text/x-mathjax-config">MathJax.Hub.Config({
		  config: ["MMLorHTML.js"],
		  jax: ["input/TeX","input/MathML","output/HTML-CSS","output/NativeMML"],
		  extensions: ["tex2jax.js","mml2jax.js","MathMenu.js","MathZoom.js"],
		  TeX: {
		    extensions: ["AMSmath.js","AMSsymbols.js","noErrors.js","noUndefined.js"]
		  }
		});</script>