    
<link href="<?php echo base_url()?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/js/slim-image/slim/slim.min.css" rel="stylesheet">
<div class="">

  <div class="page-title">
    <div class="title_left">
      <h3>
        Edite Artikel
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
                    <h2>Form Design <small>Edite</small></h2>
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
                   
                     
                      <?php echo form_open_multipart('backoffice/managenews', array('class' =>'form-horizontal form-label-left', 'id' => 'AwesomeForm'));?>
                      <?php foreach($data as $row) {  ?>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Foto</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <div class="slim"
                             data-label="Tarik gambar anda kesini"
                             accept="image/jpeg"
                             data-size="640,640"
                             data-ratio="1:1"
                             >
                            <img src="<?php echo base_url($row['news_thumb']) ?>" alt=""/>
                            <input type="file" name="slim[]" required/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jdl-berita">Judul Berita</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="jdl-berita" name="jdl-berita" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['news_title']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name-pen" class="control-label col-md-2 col-sm-2 col-xs-12">Name Penulis</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name-pen" class="form-control col-md-7 col-xs-12" type="text" name="name-pen" value="<?php echo $row['username']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name-pen" class="control-label col-md-2 col-sm-2 col-xs-12">Name Redaksi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name-pen" class="form-control col-md-7 col-xs-12" type="text" name="name-red" value="<?php echo $row['news_creator']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="select2_multiple form-control" multiple="multiple" name="select2[]" id='select2'>
                            <option value="">Choose option</option>
                            <option value = '1'>Teras Sukabumi</option>
                            <option value = '2'>Teras Nasional</option>
                            <option value = '3'>Teras Cianjur</option>
                            <option value = '4'>Teras News</option>
                            <option value = '5'>Teras Ekomomi</option>
                            <option value = '6'>Teras Sehat</option>
                          </select>
                          
                          <script type='text/javascript'>
                              $('#select2').val(<?php echo $data3 ?>);
                          </script>
                         
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
                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
              </div>
              <div class="btn-group">
                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
              </div>
              </div>
               <div contenteditable="true" class="editor-wrapper placeholderText" id="editor" value="<?php echo $row['news_desc']; ?>"></div>
                <!-- <input type="text" name="isi"/>  -->
               <?php echo form_hidden('isi'); ?>
                <input id="idnya" class="form-control col-md-7 col-xs-12" type="hidden" name="idnya" value="<?php echo $id; ?>">
                <!-- <textarea name="editor" id="editor" style="display:none;"></textarea> -->
                <!-- <textarea class="textarea" name="mytext" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea> -->
                <br />
                <!--<div class="ln_solid"></div> -->
            </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" name="tombol" id="tombol" value="Cancel" class="btn btn-primary col-md-3"/>
                          <input type="submit" name="tombol" id="tombol" value="Edit" class="btn btn-success col-md-3"/>
                          <input type="submit" name="tombol" id="tombol" value="Delet" class="btn btn-warning col-md-3"/>
                        </div>
                      </div>
                      <?php }  ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>

  
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url() ?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url() ?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url() ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url() ?>assets/vendors/starrr/dist/starrr.js"></script>
  <script src="<?php echo base_url() ?>assets/js/slim-image/slim/slim.kickstart.min.js"></script>
  
<script>
      $(document).ready(function() {

         $('button[name=ceks]').click(function() {
              console.log($('#editor').val());

            })

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
          $("#AwesomeForm").on("submit",function() {
              // alert('SUbmited');
              var data = $('#editor').html();
                // console.log(data);
                $('input[name=isi]').val(data);
          });
         $('button[name=ceks]').click(function() {
                var data = $('#editor').html();
                // console.log(data);
                $('input[name=isi]').val(data);

            })
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 6,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->