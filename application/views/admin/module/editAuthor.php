        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <?php
              if(isset($message) && $message) {  
                echo '<div class="alert alert-danger alert-dismissible fade in exit-btn" role="alert" style="margin-top:6%; width:50%">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button> Module Name alerady exits...</div>';
              }?>
              <div class="title_left">
                <h3>Author</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">

                    <form class="form-horizontal form-label-left form_validation" novalidate action="<?php echo base_url('update-module/'.$editAuthor[0]['id'])?>" method="post" enctype="multipart/form-data">
                      <span class="section">Edit Author</span>

					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						   <input id="namea" class="form-control col-md-7 col-xs-12" name="title_namea" placeholder="Title" required="required" type="text" readonly value="<?php echo $editAuthor[0]['title']?>">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="title_name" placeholder="Title" required="required" type="hidden" value="<?php echo $editAuthor[0]['title']?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Author">Author <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Author" class="form-control col-md-7 col-xs-12" name="author_name" placeholder="Author name" required="required" type="text" value="<?php echo $editAuthor[0]['author']?>">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="author_desc" class="form-control col-md-7 col-xs-12" name="author_desc" placeholder="Author Description..." type="text" value="<?php echo $editAuthor[0]['description'];?>">
                        </div>
                      </div>
                      
                      
                     <div class="item form-group" id="imgdata">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">View Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$img=explode(",",ltrim($editAuthor[0]['image']));
							foreach($img as $value){
							  echo '<img src="'.base_url().'assets/image/'.$editAuthor[0]['title']."/".$value.'" height="100" width=100 style=" width: 50%; height: 100%; margin-bottom: 10%;">';
							//echo '<a href="'.site_url('delete-image/'.$editAuthor[0]['id'].'/'.$editAuthor[0]['image']).'">Edit</a></br></br>';
							
							}
							echo '<input type="button" id="edit"  onclick="imgupl();" class="btn btn-success" value="Edit">';
							?>
                         </div>
                      </div>
					  <div class="item form-group" id="imgupload" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Upload Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="files[]" multiple="multiple" id="file" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	<script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
        <script>
		function imgupl(){
			$("#imgupload").css("display","block");
			$("#imgdata").css("display","none");
		}
		
		</script>