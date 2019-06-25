        <!-- page content -->
        <div class="right_col" role="main">
         
                          <p><?php echo $this->session->flashdata('statusMsg'); ?></p>

       
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Author-list</h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <a href="<?php echo base_url('');?>" class="btn btn-success pull-right glyphicon glyphicon-plus">Add Author</a>
                  <div class="x_content">
				  <div class="item form-group">

                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Author  </label>

                          <div class="col-md-4 col-sm-4 col-xs-12">

                             <select id="authordata" name="authordata">

                              <option value="">Choose Author..</option>

                              <?php for($i=0;$i<count($listAuthor);$i++) { ?>

                                <option value="<?php echo $listAuthor[$i]['id']?>"><?php echo $listAuthor[$i]['author']?></option>

                              <?php } ?>

							</select>

                        </div>
						 <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="search_author" class="form-control col-md-7 col-xs-12" name="search_author" placeholder="Search" type="text">
						</div>

                      </div></br>
                    <table id="datatable" class="table table-striped table-bordered datatable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th class="text-center">Title Name</th>
                          <th class="text-center">Descrption Name </th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
					  for($i=0;$i<count($listAuthor);$i++) { ?>
                        <tr>
                          <td ><?php echo $i+1; ?></td>
                          <td  ><?php echo $listAuthor[$i]['title']?></td>
                          <td  ><?php echo $listAuthor[$i]['description']?></td>
                         <td  ><?php echo $listAuthor[$i]['author']?></td>
                         
                          <td>
							<a href="<?php echo site_url('edit-module/'.$listAuthor[$i]['id'])?>" class="btn btn-info">View Image</a> 
                          </td>

                        </tr>

                        <?php } ?>
						</tbody>
					</table>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- /page content -->

<script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
<script>
$( "#authordata" ).change(function() {
	var author=$(this).val();
	$.ajax({
            type: "post",
            url: '<?php echo base_url('search_author/'); ?>'+author,
            data: {author: author, request_type: "author"},
            success: function (data) {
				response = jQuery.parseJSON(data);
				console.log(response.author);
				$("tbody").empty();
				$("tbody").append("<tr><td>1</td><td>"+response.title+"</td><td>"+response.description+"</td><td>"+response.author+"</td><td><a class='btn btn-info' href='edit-module/'"+response.id+">View Image</a></td></tr>");
				//alert(data);
                
            }
        });
});
$( "#search_author" ).keyup(function() {
	var dataval=$(this).val();
	$.ajax({
            type: "post",
            url: '<?php echo base_url('search_text/'); ?>'+dataval,
            data: {dataval: dataval, request_type: "search_text"},
            success: function (data) {
				response = jQuery.parseJSON(data);
				//console.log(response.author);
				$("tbody").empty();
				var len = response.length;
				var finaldata="";
				for (var i=0; i < len; i++) { 
				  finaldata += "<tr><td>1</td><td>"+response[i].title+"</td><td>"+response[i].description+"</td><td>"+response[i].author+"</td><td><a class='btn btn-info' href='edit-module/'"+response[i].id+">View Image</a></td></tr>";
				}
			//console.log(finaldata);	
			$("tbody").append(finaldata);
				//alert(data);
                
            }
        });
});

</script>
        

