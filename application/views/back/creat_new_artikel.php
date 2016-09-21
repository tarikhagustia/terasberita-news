<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
<div class="">

  <div class="page-title">
    <div class="title_left">
      <h3>
        Create New Artikel
        <small>
          Page rendering in {elapsed_time}
        </small>
      </h3>
    </div>

  </div>

  <div class="clearfix"></div>

  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Design <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Foto</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
									  <!-- image cropping -->
							<div class="container cropper">
							  <div class="row">
								<div class="col-md-9">
								  <div class="img-container">
									<img id="image" src="assets/images/cropper.jpg" alt="Picture">
								  </div>
								</div>
								<div class="col-md-3">
								  <div class="docs-preview clearfix">
									<!--<div class="img-preview preview-lg"></div>-->
									<div class="img-preview preview-md"></div>
									<div class="img-preview preview-sm"></div>
									<div class="img-preview preview-xs"></div>
								  </div>

								  <div class="docs-data">
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataX">X</label>
									  <input type="text" class="form-control" id="dataX" placeholder="x">
									  <span class="input-group-addon">px</span>
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataY">Y</label>
									  <input type="text" class="form-control" id="dataY" placeholder="y">
									  <span class="input-group-addon">px</span>
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataWidth">Width</label>
									  <input type="text" class="form-control" id="dataWidth" placeholder="width">
									  <span class="input-group-addon">px</span>
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataHeight">Height</label>
									  <input type="text" class="form-control" id="dataHeight" placeholder="height">
									  <span class="input-group-addon">px</span>
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataRotate">Rotate</label>
									  <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
									  <span class="input-group-addon">deg</span>
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataScaleX">ScaleX</label>
									  <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
									</div>
									<div class="input-group input-group-sm">
									  <label class="input-group-addon" for="dataScaleY">ScaleY</label>
									  <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
									</div>
								  </div>
								</div>
							  </div>
							  <div class="row">
								<div class="col-md-9 docs-buttons">
								  <!-- <h3 class="page-header">Toolbar:</h3> -->
								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
										<span class="fa fa-arrows"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
										<span class="fa fa-crop"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
										<span class="fa fa-search-plus"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
										<span class="fa fa-search-minus"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, -10, 0)">
										<span class="fa fa-arrow-left"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 10, 0)">
										<span class="fa fa-arrow-right"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, -10)">
										<span class="fa fa-arrow-up"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, 10)">
										<span class="fa fa-arrow-down"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
										<span class="fa fa-rotate-left"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
										<span class="fa fa-rotate-right"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleX&quot;, -1)">
										<span class="fa fa-arrows-h"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleY&quot;, -1)">
										<span class="fa fa-arrows-v"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="crop" title="Crop">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;crop&quot;)">
										<span class="fa fa-check"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="clear" title="Clear">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)">
										<span class="fa fa-remove"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="disable" title="Disable">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;disable&quot;)">
										<span class="fa fa-lock"></span>
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="enable" title="Enable">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;enable&quot;)">
										<span class="fa fa-unlock"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group">
									<button type="button" class="btn btn-primary" data-method="reset" title="Reset">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)">
										<span class="fa fa-refresh"></span>
									  </span>
									</button>
									<label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
									  <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
									  <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
										<span class="fa fa-upload"></span>
									  </span>
									</label>
									<button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;destroy&quot;)">
										<span class="fa fa-power-off"></span>
									  </span>
									</button>
								  </div>

								  <div class="btn-group btn-group-crop">
									<button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
										Get Cropped Canvas
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 160, height: 90 })">
										160&times;90
									  </span>
									</button>
									<button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
									  <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 320, height: 180 })">
										320&times;180
									  </span>
									</button>
								  </div>

								  <!-- Show the cropped image in modal -->
								  <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
									<div class="modal-dialog">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										  <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
										</div>
										<div class="modal-body"></div>
										<div class="modal-footer">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Download</a>
										</div>
									  </div>
									</div>
								  </div><!-- /.modal -->

								  <button type="button" class="btn btn-primary" data-method="getData" data-option data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getData&quot;)">
									  Get Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="setData" data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setData&quot;, data)">
									  Set Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="getContainerData" data-option data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getContainerData&quot;)">
									  Get Container Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="getImageData" data-option data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getImageData&quot;)">
									  Get Image Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="getCanvasData" data-option data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCanvasData&quot;)">
									  Get Canvas Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="setCanvasData" data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCanvasData&quot;, data)">
									  Set Canvas Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="getCropBoxData" data-option data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCropBoxData&quot;)">
									  Get Crop Box Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="setCropBoxData" data-target="#putData">
									<span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCropBoxData&quot;, data)">
									  Set Crop Box Data
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="moveTo" data-option="0">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">
									  0,0
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="zoomTo" data-option="1">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
									  100%
									</span>
								  </button>
								  <button type="button" class="btn btn-primary" data-method="rotateTo" data-option="180">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">
									  180°
									</span>
								  </button>
								  <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value">
								</div><!-- /.docs-buttons -->

								<div class="col-md-3 docs-toggles">
								  <!-- <h3 class="page-header">Toggles:</h3> -->
								  <div class="btn-group btn-group-justified" data-toggle="buttons">
									<label class="btn btn-primary active">
									  <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
									  <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
										16:9
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
									  <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
										4:3
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
									  <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
										1:1
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
									  <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
										2:3
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
									  <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">
										Free
									  </span>
									</label>
								  </div>

								  <div class="btn-group btn-group-justified" data-toggle="buttons">
									<label class="btn btn-primary active">
									  <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>
									  <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0">
										VM0
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">
									  <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1">
										VM1
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
									  <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2">
										VM2
									  </span>
									</label>
									<label class="btn btn-primary">
									  <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
									  <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3">
										VM3
									  </span>
									</label>
								  </div>

								  <div class="dropdown dropup docs-options">
									<button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
									  Toggle Options
									  <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="toggleOptions" role="menu">
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="responsive" checked>
										  responsive
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="restore" checked>
										  restore
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="checkCrossOrigin" checked>
										  checkCrossOrigin
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="checkOrientation" checked>
										  checkOrientation
										</label>
									  </li>

									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="modal" checked>
										  modal
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="guides" checked>
										  guides
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="center" checked>
										  center
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="highlight" checked>
										  highlight
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="background" checked>
										  background
										</label>
									  </li>

									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="autoCrop" checked>
										  autoCrop
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="movable" checked>
										  movable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="rotatable" checked>
										  rotatable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="scalable" checked>
										  scalable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="zoomable" checked>
										  zoomable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="zoomOnTouch" checked>
										  zoomOnTouch
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="zoomOnWheel" checked>
										  zoomOnWheel
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="cropBoxMovable" checked>
										  cropBoxMovable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="cropBoxResizable" checked>
										  cropBoxResizable
										</label>
									  </li>
									  <li role="presentation">
										<label class="checkbox-inline">
										  <input type="checkbox" name="toggleDragModeOnDblclick" checked>
										  toggleDragModeOnDblclick
										</label>
									  </li>
									</ul>
								  </div><!-- /.dropdown -->

								  <a class="btn btn-default btn-block" data-toggle="tooltip" href="https://fengyuanchen.github.io/cropperjs" title="Cropper without jQuery">Cropper.js</a>

								</div><!-- /.docs-toggles -->
							  </div>
							</div>
							<!-- /image cropping -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">Judul Berita</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-2 col-sm-2 col-xs-12">Name Penulis</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                            <option>Option five</option>
                            <option>Option six</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Isi Berita </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
							<div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
							  <ul class="dropdown-menu">
							  </ul>
							</div>

							<div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
							  <ul class="dropdown-menu">
								<li>
								  <a data-edit="fontSize 5">
									<p style="font-size:17px">Huge</p>
								  </a>
								</li>
								<li>
								  <a data-edit="fontSize 3">
									<p style="font-size:14px">Normal</p>
								  </a>
								</li>
								<li>
								  <a data-edit="fontSize 1">
									<p style="font-size:11px">Small</p>
								  </a>
								</li>
							  </ul>
							</div>

							<div class="btn-group">
							  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
							  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
							  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
							  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
							</div>

							<div class="btn-group">
							  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
							  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
							  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
							  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
							</div>

							<div class="btn-group">
							  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
							  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
							  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
							  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
							</div>

							<div class="btn-group">
							  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
							  <div class="dropdown-menu input-append">
								<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
								<button class="btn" type="button">Add</button>
							  </div>
							  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
							</div>
							<div class="btn-group">
							  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
							  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
							</div>
						  </div>
						   <div contenteditable="true" class="editor-wrapper placeholderText" id="editor"></div>
							  <textarea name="descr" id="descr" style="display:none;"></textarea>
							  <br />
							  <div class="ln_solid"></div>
						</div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
<script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
	<!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->
	<!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->