

<div id="tab_images_uploader_container" class=" margin-bottom-10">
  

<?php $attr = array('class' => 'form-inline','id' => 'item_images-form'); echo form_open_multipart('index.php/admin/items/images',$attr);?>
   <div class="form-group">
      <input class="form-control"  type="file" name="itemImages[]" multiple>
       <input type="hidden"  value="<?=$item['id']?>" name="id"> 
   </div>
   <button type="submit" class="btn green">Upload</button>
</form>

</div>
<?php if(!empty($item_images)){ ?>

<table class="table table-bordered table-hover">
   <thead>
      <tr role="row" class="heading">
         <th width="8%">
            Image
         </th>
         <th width="10%">
            Banner Image
         </th>
         <th width="10%">
            Action
         </th>
      </tr>
   </thead>
   <tbody>
   <?php foreach($item_images as $image) : ?>
      <tr id="row_<?=$image['id']?>">
        <td><img src="<?=base_url().'uploads/images/'.$image['image_url']?>" width="25%"></td>


        <td><input type="radio" name="radio" class="baseimage" data-id="<?=$image['id']?>" data-item="<?=$item['id']?>" <?php if($image['banner_image']) echo 'checked="checked"'; ?>> </td>


        <td> <a  data-id="<?=$image['id']?>" href="<?=base_url();?>index.php/admins/items/delimage/<?=$image['id']?>"  class="btn btn-sm red delimage" onclick="return confirm('Are your sure delete?');"><i class="fa fa-trash"></i>Delete</a></td>
      </tr>
      <?php endforeach; ?>
   </tbody>
</table>

<?php } ?>
<script type="text/javascript">
// This is our actual script
$(document).ready(function(){
    $('a.delimage').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: this.href,
            method: 'GET',
            success: function (data) {
               $("tr#row_"+id).fadeOut('slow');
            }
        });
    });


    $('input[type=radio][name=radio]').change(function() {
        var image = $(this).data('id');
        var item = $(this).data('item');
        $.ajax({
            url: '<?=base_url();?>index.php/admins/items/baseimage',
            method: 'POST',
            data:{image: image,item: item},
            success: function (data) {
              
            }
        });
    });

});
</script>
