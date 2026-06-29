<?php
/*
Template Name: H Testing Coohom Template
*/

get_header();

?>

    <script src="//qhmodel-viewer-oss.coohom.com/release/0.0.220/sdk-ui.min.js"></script>
    <style>
      html, body {
        margin: 0;
        padding: 0;
      }

#app {
        position: relative;
        width: 100vw;
        height: 100vh;
        background-color: #f5f5f5;
      }
      </style>
      <div id="app">

  </div>

    <script>
      const viewer = new koolViewer.ViewerUISDK({   // Create a viewer instance
		mount: document.getElementById('app'),    // Associate canvas
  		modelId: '3FO4EWH945F0',                  // Set model parameters
  		useCoohomCDN: true,                       // Use coohom CDN 
  		locale: 'en_US'
            });

    </script>

<?php

// get_footer();
