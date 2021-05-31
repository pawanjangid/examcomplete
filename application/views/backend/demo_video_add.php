<div class="row">
	<div class="col-md-8">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('Add_New_Video');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open(base_url() . 'index.php?admin/videos/create/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Title');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
					</div>
					

					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                        
						<div class="col-sm-5">
							<select name="class_id" class="form-control" data-validate="required" id="class_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_class_subject(this.value);">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                     </option>
                                <?php
								endforeach;
							  ?>
                          </select>
						</div> 
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Course');?></label>
                        
						<div class="col-sm-5">
							<select name="course_id" class="form-control" data-validate="required" id="course_selector_holder" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									 onchange="return get_topic(this.value);">
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                          </select>
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Topic');?></label>
                        
						<div class="col-sm-5">
							<select name="topic_id" class="form-control" data-validate="required" id="topic_selector_holder" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									>
                              <option value=""><?php echo get_phrase('select');?></option>
                              
                          </select>
						</div> 
					</div>

					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Description');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css" style="height: 100px;" name="description" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Video');?></label>
                        
						<div class="col-sm-5">
							<input type="file" name="file_name" class="form-control" data-label="<i class='glyphicon glyphicon-file'></i> Browse" 
                               data-validate="required" data-message-required="<?php echo get_phrase('required'); ?>"/>
						</div> 
					</div>
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('Add_Video');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>


</div>

<script type="text/javascript">



	function get_class_subject(class_id) {
    	var column = '<option value="00">Select</option>';

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_class_subject/' + class_id ,
            success: function(response)
            {
            	response = column+response;
                jQuery('#course_selector_holder').html(response);
            }
        });

    }
    function get_topic(course_id) {
    	var column = '<option value="00">Select</option>';
    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_topic/' + course_id ,
            success: function(response)
            {	response = column+response;
                jQuery('#topic_selector_holder').html(response);
            }
        });

    }

</script>
<script type="text/javascript">

	function checkphone(num) {
		var len = num.length;
		if (len != "10") {
			alert("Please Enter valid number Only 10 digit's Thanks.");
		}
	}
</script>