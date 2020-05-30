<?php
$header = "Share Icons";
include 'inc/header.php'; ?>
<?php include 'inc/checklogin.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <?php flashMessage(); ?>
        <div class="page-title">
            <div class="title_left">
                <h3>Share Icons</h3>
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
                        <h2>Share Icons</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addShareIcons();">Add icon</a>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>S.N</th>
                                <th>Share Icons</th>
                                <th>URL</th>
                                <th>Class</th>
                                <th>Preview</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <?php
                                $Share = new share();
                                $icons = $Share->getAllShare();
                                foreach ($icons as $key => $icon) {
                                ?>
                                    <tr>
                                        <td><?php echo ($key+1).'.'; ?></td>
                                        <td><?php echo $icon->icon_name; ?></td>
                                        <td><?php echo ($icon->url);?></td>
                                        <td><?php echo ($icon->class);?></td>
                                        <td><i class="<?php echo($icon->class) ?>"></i></td>
                                        <td class="text-center">
                                            <!-- data in HTML tags as attribute -->
                                            <!-- for passing unique id we wil pass this as reference -->
                                            <a class="btn btn-share" href="javascript:;" onclick="editShareIcons(this);" data-icon_share = '<?php echo(json_encode($icon)) ?>'><i class="fa fa-pencil-square-o"></i></a>
                                            <a class="btn btn-danger" href="./process/icon?id=<?php echo( $icon->id)?>&amp;act=<?php echo(substr(md5("Delete-Share Icons-".$icon->id.$_SESSION['token']),5,15)) ?>" ><i class="fa fa-trash"></i></a>
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
                                        <h4 class="modal-title" id="title">Add Share Icons</h4>
                                    </div>
                                    <form action="./process/share" method="post">

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="icon_name">Share Icons Name</label>
                                                <input type="text" id="icon_name" class="form-control" name="icon_name" placeholder="Share Icons Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="class">Share Icons Class</label>
                                                <input type="text" id="class" class="form-control" name="class" placeholder="Share Icons Class" >
                                            </div>
                                            <!-- <div><i class="<?php //echo 'fa'.$class ?>"></i></div> -->
                                            <div class="form-group">
                                                <label for="url">Share Icons URL</label>
                                                <input type="text" id="shareurl" class="form-control" name="url" placeholder="Icon redirection URL">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="hidden" id="id" name="id" class="id">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
    function addShareIcons() {
        $('#title').html('Add Share Icons');
        $('#id').removeAttr();
        showModal();
    }
    function editShareIcons(element){
        $('#id').val()
        var icon_share = $(element).data('icon_share'); //data from HTML to JS through tag attribute
        if(typeof(icon_share) != 'object'){
            icon_share = JSON.parse(icon_share);
        }        
        $('#title').html('Edit Share Icons');
        $('#icon_name').val(icon_share.icon_name);
        $('#id').val(icon_share.id);
        $('#class').val(icon_share.class);
        $('#shareurl').val(icon_share.url);
        showModal(icon_share.description);
    }

    function showModal(data = '') {
        $('.modal').modal('show');
    }
</script>