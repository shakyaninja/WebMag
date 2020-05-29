<?php
$header = "Ads";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>
<?php
$action = "Add";
if ($_GET) {
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $ad_id = (int) $_GET['id'];
    if ($ad_id) {
      $act = substr(md5("Edit-Ad-" . $ad_id . $_SESSION['token']), 3, 15);
      if ($act == $_GET['act']) {
        $Ads = new ads();
        $ad_info = $Ads->getAdsbyId($ad_id);
        if ($ad_info) {
          $ad_info = $ad_info[0];
          $action = "Edit";
        }
      }
    }
  }
}
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <?php flashMessage(); ?>
    <div class="page-title">
      <div class="title_left">
        <h3>Ads</h3>
      </div>

      <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ads</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="javascript:;" class="btn btn-primary" onclick="addAds();">Add ad</a>
            </ul>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <th>S.N</th>
                <th>Ads</th>
                <th>URL</th>
                <th>Type</th>
                <th>Image</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php
                $Ads = new ads();
                $ads = $Ads->getAllAds();
                foreach ($ads as $key => $ad) {
                ?>
                  <tr>
                    <td><?php echo ($key + 1) . '.'; ?></td>
                    <td><?php echo $ad->vendor_name; ?></td>
                    <td><?php echo ($ad->url); ?></td>
                    <td><?php echo ($ad->adType); ?></td>
                    <?php
                    if (isset($ad->image) && !empty($ad->image) && file_exists(UPLOAD_PATH . "ads/" . $ad->image)) {
                      $thumbnail = UPLOAD_URL . 'ads/' . $ad->image;
                    } else {
                      $thumbnail = UPLOAD_URL . 'noimg.png';
                    }
                    ?>
                    <td><img src="<?php echo ($thumbnail) ?>" alt="" style="width: 200px;height: auto;"></td>
                    <td class="text-center">
                      <!-- data in HTML tags as attribute -->
                      <!-- for passing unique id we wil pass this as reference -->
                      <a class="btn btn-info" href="javascript:;" onclick="editAds(this);" data-ad_info='<?php echo (json_encode($ad)) ?>'><i class="fa fa-pencil-square-o"></i></a>
                      <a class="btn btn-danger" href="./process/ads?id=<?php echo ($ad->id) ?>&amp;act=<?php echo (substr(md5("Delete-Ads-" . $ad->id . $_SESSION['token']), 5, 15)) ?>" onclick="return confirm('Are you sure you want to delete this Ad?');"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title">Add Ads</h4>
                  </div>
                  <form action="./process/ads" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                      <div class="form-group">
                        <label for="vendor_name">Ads Name</label>
                        <input type="text" id="vendor_name" class="form-control" name="vendor_name" placeholder="Ads Name">
                      </div>
                      <div class="form-group">
                        <label for="adType">Ads Type</label>
                        <select class="form-control" name="adType">
                          <option value="" selected="selected" disabled="disabled">--SELECT AD TYPE--</option>
                          <option value="widead">Wide Ad</option>
                          <option value="simplead">Simple Ad</option>
                        </select>
                      </div>
                      <!-- <div><i adType="<?php //echo 'fa'.$adType 
                                            ?>"></i></div> -->
                      <div class="form-group">
                        <label for="url">Ads URL</label>
                        <input type="text" id="adInfourl" class="form-control" name="url" placeholder="Ad's redirection URL">
                      </div>
                      <div class="form-group ">
                        <label for="image">Ads Image</label>
                        <input type="file" name="image" id="image" accept="image/*">
                      </div>
                      <?php
                      if (isset($ad_info->image) && !empty($ad_info->image) && file_exists(UPLOAD_PATH . "ads/" . $ad_info->image)) {
                        $thumbnail = UPLOAD_URL . 'ads/' . $ad_info->image;
                      } else {
                        $thumbnail = UPLOAD_URL . 'noimg.png';
                      }
                      ?>
                      <div class="form-group ">
                        <img src="<?php echo ($thumbnail) ?>" id="thumbnail" style="width: 200px;height: auto;">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="hidden" name="old_img" id="old_img" value="<?php echo (isset($ad_info->image) && !empty($ad_info->image)) ? $ad_info->image : "" ?>">
                      <input type="hidden" name="id" id="id" value="<?php echo (isset($ad_info->id) && !empty($ad_info->id)) ? $ad_info->id : "" ?>">
                      <button type="submit" class="btn btn-success"><?php echo $action . ' Ads' ?> </button>
                    </div>
                  </form>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'inc/footer.php'; ?>
<script src="./assets/js/datatable.js"></script>
<script type="text/javascript">
  function addAds() {
    $('#title').html('Add Ads');
    $('#id').removeAttr();
    showModal();
  }

  function editAds(element) {
    $('#id').val()
    var ad_info = $(element).data('ad_info'); //data from HTML to JS through tag attribute
    if (typeof(ad_info) != 'object') {
      ad_info = JSON.parse(ad_info);
    }
    $('#title').html('Edit Ads');
    $('#vendor_name').val(ad_info.vendor_name);
    $('#id').val(ad_info.id);
    $('#adType').val(ad_info.adType);
    $('#adInfourl').val(ad_info.url);
    showModal();
  }

  function showModal(data = '') {
    $('.modal').modal('show');
  }

  document.getElementById("image").onchange = function() {
    var reader = new FileReader();

    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("thumbnail").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  };
</script>