        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
              <p><?php echo $this->session->flashdata('statusMsg'); ?></p>

              <div class="title_left">
                <h3>Author</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <a href="<?php echo base_url('list-author');?>" class="btn btn-success pull-right glyphicon glyphicon-plus">List Author</a>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left form_validation" action="<?php echo base_url('add-save-author')?>" method="post" enctype="multipart/form-data">
                      <span class="section">Add Author</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="title_name" placeholder="Title name" required type="text">
                        </div>
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Author">Author <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Author" class="form-control col-md-7 col-xs-12" name="author_name" placeholder="Author name" required type="text">
                        </div>
                      </div>
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Description" class="form-control col-md-7 col-xs-12" name="author_desc" placeholder="Author Description..."></textarea>
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Upload Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="files[]" multiple="multiple" id="file" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              </div>

            </div>

          </div>

        </div>